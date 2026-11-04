<?php
/**
 * @file plugins/themes/pardalisTheme/PardalisThemePlugin.inc.php
 *
 * @class PardalisThemePlugin
 * @ingroup plugins_themes_pardalisTheme
 *
 * @brief Tema hijo ("child theme") del tema Default de OJS 3.3.
 *
 * No modifica ningún archivo del núcleo de OJS ni del tema Default:
 * hereda de él (setParent), sobrescribe unas pocas plantillas
 * (encabezado, portada y pie de página) y agrega sus propios estilos.
 * Para volver al diseño original basta con activar el tema "Default".
 *
 * Estilo visual basado en la plantilla de referencia "Laborex"
 * (turquesa + azul marino, clínico/científico), adaptado a una
 * revista de publicación científica.
 */

import('lib.pkp.classes.plugins.ThemePlugin');

class PardalisThemePlugin extends ThemePlugin {

	/**
	 * Inicializa el tema. Solo se ejecuta cuando este tema está activo.
	 * @return null
	 */
	public function init() {
		// 0) OJS guarda el CSS compilado por NOMBRE y solo revisa que el archivo exista,
		//    así que un CSS viejo (de otro tema o de una versión anterior de este) se
		//    seguiría sirviendo. Si los archivos del tema cambiaron, se limpia solo.
		$this->_refreshCachesIfThemeChanged();

		// La clave "author.submit" (Nuevo envío) está en un componente de idioma que
		// OJS no carga en la portada; sin esto se vería "##author.submit##".
		AppLocale::requireComponents(LOCALE_COMPONENT_APP_AUTHOR);

		// 1) Heredamos del tema Default de OJS.
		//    Si el tema Default está deshabilitado en esta revista, OJS no lo carga y este
		//    tema se quedaría sin estilos base, sin íconos y sin menús (los menús "primary"
		//    y "user" los declara el Default). En ese caso se carga a mano.
		if (!PluginRegistry::getPlugin('themes', 'defaultthemeplugin')) {
			PluginRegistry::loadPlugin('themes', 'default');
		}
		$this->setParent('defaultthemeplugin');
		if (!isset($this->parent)) {
			error_log('PardalisTheme: no se pudo cargar el tema padre "default"; la página se verá sin estilos base ni menús.');
		}

		// 2) Tipografías: Poppins (títulos) e Inter (texto).
		$this->addStyle(
			'pardalisFonts',
			'//fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap',
			array('baseUrl' => '')
		);

		// 3) Hoja de estilos propia (hoja independiente: nunca rompe el tema padre).
		//    El nombre incluye una huella de los archivos del tema: OJS cachea el CSS por nombre,
		//    así que cuando el tema cambia el nombre cambia y nunca se sirve un CSS viejo.
		$this->addStyle('pardalisCustom' . substr($this->_getThemeStamp(), 0, 8), 'styles/custom.less');

		// 4) Datos dinámicos para la portada (estadísticas y artículos recientes).
		HookRegistry::register('TemplateManager::display', array($this, 'loadHomeData'));
	}

	/**
	 * Vacía la caché de CSS y de plantillas cuando cambian los archivos del tema
	 * (o la primera vez que se activa). Guarda una huella en cache/pardalis-theme.stamp.
	 * Es seguro: ante cualquier error solo lo registra y la página sigue.
	 */
	private function _getThemeStamp() {
		$files = glob($this->_getBaseDir('styles') . DIRECTORY_SEPARATOR . '*.less');
		if (!is_array($files)) $files = array();
		$files[] = $this->_getBaseDir('version.xml');
		$files[] = __FILE__;

		$stamp = '';
		foreach ($files as $file) {
			if (is_file($file)) $stamp .= basename($file) . filemtime($file) . filesize($file);
		}
		return md5($stamp);
	}

	private function _refreshCachesIfThemeChanged() {
		try {
			$stamp = $this->_getThemeStamp();

			$stampFile = CacheManager::getFileCachePath() . DIRECTORY_SEPARATOR . 'pardalis-theme.stamp';
			if (is_readable($stampFile) && trim((string) file_get_contents($stampFile)) === $stamp) return;

			$templateMgr = TemplateManager::getManager(Application::get()->getRequest());
			$templateMgr->clearCssCache();
			$templateMgr->clearTemplateCache();
			file_put_contents($stampFile, $stamp);
		} catch (Throwable $e) {
			error_log('PardalisTheme: no se pudo refrescar la caché: ' . $e->getMessage());
		}
	}

	/**
	 * Asigna a la plantilla de la portada las estadísticas de la revista,
	 * las secciones y los artículos publicados más recientes.
	 * Todo va dentro de try/catch: si algo fallara, la portada se sigue
	 * mostrando (solo sin esos bloques) en lugar de romperse.
	 *
	 * @param $hookName string TemplateManager::display
	 * @param $args array [TemplateManager, template, output]
	 * @return boolean false para que OJS siga mostrando la plantilla normalmente
	 */
	public function loadHomeData($hookName, $args) {
		$templateMgr = $args[0];
		$template = $args[1];

		// Diagnóstico: se imprime como comentario HTML en el encabezado (Ctrl+U y buscar "PardalisTheme").
		$templateMgr->assign('pardalisDiag', 'v1.3 · tema padre: ' . (isset($this->parent) ? 'cargado' : 'NO CARGADO'));

		if ($template !== 'frontend/pages/indexJournal.tpl') return false;

		$request = Application::get()->getRequest();
		$context = $request->getContext();
		if (!$context) return false;
		$contextId = $context->getId();

		$stats = array('articles' => 0, 'issues' => 0, 'sections' => 0);
		$sectionTitles = array();
		$recent = array();

		// Texto corto del hero: descripción de la revista sin HTML, con las
		// entidades (&nbsp;, &aacute;...) ya convertidas y recortada a ~230 caracteres.
		$lead = trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags((string) $context->getLocalizedData('description')), ENT_QUOTES, 'UTF-8')));
		if (function_exists('mb_strlen') && mb_strlen($lead, 'UTF-8') > 230) {
			$lead = rtrim(mb_substr($lead, 0, 230, 'UTF-8')) . '…';
		}

		try {
			import('classes.submission.Submission');
			$submissionService = Services::get('submission');

			// Artículos publicados
			$stats['articles'] = (int) $submissionService->getMax(array(
				'contextId' => $contextId,
				'status' => STATUS_PUBLISHED,
			));

			// Números publicados
			$issueDao = DAORegistry::getDAO('IssueDAO');
			$stats['issues'] = count($issueDao->getPublishedIssues($contextId)->toArray());

			// Secciones (áreas) de la revista
			$sectionDao = DAORegistry::getDAO('SectionDAO');
			$sections = $sectionDao->getByContextId($contextId)->toArray();
			$stats['sections'] = count($sections);
			$sectionsById = array();
			foreach ($sections as $section) {
				$sectionsById[$section->getId()] = $section->getLocalizedTitle();
				if (count($sectionTitles) < 8 && !$section->getHideTitle()) {
					$sectionTitles[] = $section->getLocalizedTitle();
				}
			}

			// Últimos 3 artículos publicados
			$months = $this->_getMonthNames();
			$dispatcher = $request->getDispatcher();
			$submissions = $submissionService->getMany(array(
				'contextId' => $contextId,
				'status' => STATUS_PUBLISHED,
				'orderBy' => 'datePublished',
				'orderDirection' => 'DESC',
				'count' => 3,
			));
			foreach ($submissions as $submission) {
				$publication = $submission->getCurrentPublication();
				if (!$publication) continue;

				$authorNames = array();
				foreach ((array) $publication->getData('authors') as $author) {
					$authorNames[] = $author->getFullName();
				}

				$timestamp = strtotime((string) $publication->getData('datePublished'));
				$sectionId = $publication->getData('sectionId');

				$recent[] = array(
					'title' => $publication->getLocalizedTitle(),
					'url' => $dispatcher->url($request, ROUTE_PAGE, null, 'article', 'view', array($submission->getBestId())),
					'authors' => implode(', ', $authorNames),
					'day' => $timestamp ? date('d', $timestamp) : '',
					'month' => $timestamp ? $months[(int) date('n', $timestamp) - 1] : '',
					'year' => $timestamp ? date('Y', $timestamp) : '',
					'section' => isset($sectionsById[$sectionId]) ? $sectionsById[$sectionId] : '',
					'cover' => $publication->getLocalizedCoverImageUrl($contextId),
				);
			}
		} catch (Throwable $e) {
			// Silencioso a propósito: la portada se muestra sin estos bloques.
			error_log('PardalisTheme: no se pudieron cargar los datos de la portada: ' . $e->getMessage());
		}

		$templateMgr->assign(array(
			'pardalisStats' => $stats,
			'pardalisSections' => $sectionTitles,
			'pardalisRecent' => $recent,
			'pardalisLead' => $lead,
		));

		return false;
	}

	/**
	 * Abreviaturas de los meses según el idioma activo.
	 * @return array
	 */
	private function _getMonthNames() {
		if (strpos((string) AppLocale::getLocale(), 'es') === 0) {
			return array('ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC');
		}
		return array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
	}

	/**
	 * Nombre visible en Ajustes del sitio > Apariencia
	 * @return string
	 */
	function getDisplayName() {
		return 'PARDALIS (estilo Laborex)';
	}

	/**
	 * Descripción visible en Ajustes del sitio > Extensiones (Plugins)
	 * @return string
	 */
	function getDescription() {
		return 'Tema hijo del tema Default de OJS con estilo de plataforma científica moderna (turquesa y azul marino), basado en la plantilla Laborex y adaptado a la revista PARDALIS de la UAN.';
	}
}
