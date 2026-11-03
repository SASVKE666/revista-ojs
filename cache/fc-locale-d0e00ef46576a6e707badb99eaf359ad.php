<?php return array (
  'plugins.generic.usageStats.settings.logging' => 'Opciones de registro de acceso',
  'plugins.generic.usageStats.settings.createLogFiles' => 'Crear archivos de registro',
  'plugins.generic.usageStats.settings.createLogFiles.description' => 'Al activar esta opción, el módulo creará archivos de registro de acceso dentro del directorio de archivos. Estos archivos deben usarse para extraer datos de estadísticas de uso. Si no desea crear más archivos de registro de acceso  puede dejar esta opción deshabilitada y usar sus propios archivos de registro de acceso del servidor.',
  'plugins.generic.usageStats.settings.logParseRegex' => 'Analizar expresiones regulares de los archivos de registro',
  'plugins.generic.usageStats.settings.logParseRegex.description' => 'La expresión regular utilizada por defecto puede analizar archivos de registro acceso apache en formato combinado, así como los archivos de registro del módulo. Si sus archivos de registro de acceso están en un formato diferente, deberá introducir una expresión regular capaz de analizarlos y proporcionar los valores esperados. Consulte UsageStatsLoader::_getDataFromLogEntry() para obtener más información.',
  'plugins.generic.usageStats.settings.saved' => 'Configuración del módulo de estadísticas de uso guardada',
  'plugins.generic.usageStats.usageStatsLoaderName' => 'Tarea de carga de archivo de estadísticas de uso',
  'plugins.generic.usageStats.openFileFailed' => 'El archivo {$file} no pudo abrirse y fue rechazado.',
  'plugins.generic.usageStats.invalidLogEntry' => 'El número de línea {$lineNumber} del archivo {$file} no es una entrada de registro válida y el archivo fue rechazado.',
  'plugins.generic.usageStats.removeUrlError' => 'El número de línea {$lineNumber} del archivo {$file} contiene una URL que el sistema no puede eliminar de la URL base.',
  'plugins.generic.usageStats.loadDataError' => 'No se pueden cargar los datos extraídos del archivo {$file}. El archivo se trasladó de nuevo a la fase.',
  'plugins.generic.usageStats.pluginNotEnabled' => 'El módulo de estadísticas de uso está deshabilitado. No se procesó ningún archivo de registro.',
  'plugins.generic.usageStats.displayName' => 'Estadísticas de uso',
  'plugins.generic.usageStats.description' => 'Presentar estadísticas de uso de objetos de datos. Puede utilizar archivos de registro de acceso del servidor para extraer las estadísticas.',
  'plugins.reports.usageStats.report.displayName' => 'Informe de estadísticas de uso de PKP',
  'plugins.reports.usageStats.report.description' => 'Informe de estadísticas de uso por defecto de PKP (compatibles con COUNTER)',
  'plugins.reports.usageStats.metricType' => 'PKP/COUNTER',
  'plugins.reports.usageStats.metricType.full' => 'Estadísticas de PKP (compatibles con COUNTER)',
  'plugins.generic.usageStats.settings.dataPrivacyOption' => 'Opciones de privacidad de datos',
  'plugins.generic.usageStats.settings.dataPrivacyOption.excludesCity' => 'La activación de la privacidad de datos excluye "Ciudad" como una estadística opcional.',
  'plugins.generic.usageStats.settings.dataPrivacyOption.excludesRegion' => 'La activación de la privacidad de datos excluye "Región" como una estadística opcional.',
  'plugins.generic.usageStats.settings.dataPrivacyCheckbox' => 'Respetar la privacidad de datos',
  'plugins.generic.usageStats.settings.optionalColumns' => 'Información estadística opcional',
  'plugins.generic.usageStats.settings.optionalColumns.description' => 'Activar o desactivar la recolección de la siguiente información opcional. Esto influirá en los posibles informes estadísticos que obtenga y también tendrá impacto en el tamaño de la base de datos. NO HAGA CAMBIOS a menos que sepa lo que está haciendo.',
  'plugins.generic.usageStats.settings.optionalColumns.cityRequiresRegion' => 'La columna opcional "Ciudad" requiere la columna opcional "Región".',
  'plugins.generic.usageStats.settings.archives' => 'Archivos',
  'plugins.generic.usageStats.settings.compressArchives.description' => 'Active esta opción para comprimir archivos de registro almacenados mediante la herramienta gzip (tendrá que configurar los ajustes de gzip en config.inc.php). Si tiene un sitio con un tráfico muy elevado puede ser buena idea activarla para ahorrar un espacio en disco extra.',
  'plugins.generic.usageStats.settings.compressArchives' => 'Comprimir archivos',
  'plugins.generic.usageStats.settings.statsDisplayOptions' => 'Opciones de visualización de estadísticas',
  'plugins.generic.usageStats.settings.statsDisplayOptions.contextWide' => 'Estos ajustes solo se aplicarán a las estadísticas de uso en {$contextName}.',
  'plugins.generic.usageStats.settings.statsDisplayOptions.display' => 'Mostrar el gráfico de estadísticas de envío para lectura',
  'plugins.generic.usageStats.settings.statsDisplayOptions.chartType' => 'Elija el tipo de gráfico para mostrar las estadísticas de descarga',
  'plugins.generic.usageStats.settings.statsDisplayOptions.chartType.bar' => 'Barra',
  'plugins.generic.usageStats.settings.statsDisplayOptions.chartType.line' => 'Línea',
  'plugins.generic.usageStats.settings.statsDisplayOptions.datasetMaxCount' => 'Defina el número máximo de datos que se presentan al mismo tiempo para un punto específico del eje X. Entre 3 y 5 está bien, un valor mayor podría generar gráficos díficiles de comprender.',
  'plugins.generic.usageStats.processingPathNotEmpty' => 'El directorio {$directory} no está vacío. Esto podría señalar un proceso erróneo previo o un proceso ejecutándose simultáneamente. Este archivo se reprocesará automáticamente si también está usando  scheduledTasksAutoStage.xml, en caso contrario deberá mover manualmente cualquier archivo huérfano del directorio de proceso al directorio principal.',
  'plugins.generic.usageStats.optout.displayName' => 'Información de privacidad de las estadísticas de uso',
  'plugins.generic.usageStats.optout.description' => 'Información de privacidad de las estadísticas de uso',
  'plugins.generic.usageStats.optout.title' => 'Información de las estadísticas de uso',
  'plugins.generic.usageStats.optout.shortDesc' => 'Registramos estadísticas de uso anónimas. Consulte la <a href="{$privacyInfo}">información de privacidad</a> para obtener más detalles.',
  'plugins.generic.usageStats.optin' => 'Incluirse',
  'plugins.generic.usageStats.optout' => 'Excluirse',
  'plugins.generic.usageStats.statsSum' => 'Sumar todas las descargas de archivos',
  'plugins.generic.usageStats.noStats' => 'Los datos de descargas todavía no están disponibles.',
  'plugins.generic.usageStats.monthInitials' => 'Ene Feb Mar Abr May Jun Jul Ago Sep Oct Nov Dic',
  'plugins.generic.usageStats.downloads' => 'Descargas',
  'plugins.generic.usageStats.optout.done' => '
		<p>Ha inhabilitado correctamente la recopilación de estadísticas de uso. Mientras vea este mensaje, no se recopilarán estadísticas de su uso de este sitio. Haga clic en el botón de abajo para revertir su decisión.</p>',
  'plugins.generic.usageStats.optout.cookie' => '
		<p>Si lo desea puede excluirse del proceso de recopilación de datos. Haciendo clic en el botón excluirse que hay a continuación puede decidir activamente no participar en el análisis estadístico. Al hacerlo se creará una <em>cookie</em> en el sistema para recordar su decisión. Si los ajustes de privacidad de su navegador hacen que las cookies se eliminen automáticamente, deberá volver a seleccionar la opción de excluirse la próxima vez que acceda al sitio web. Esta cookie solo es válida para este navegador. Si utiliza otros navegadores  deberá repetir este proceso. Esta cookie no almacena ningún tipo de información personal y es válida durante un año desde el último acceso.</p>
		<p>Tenga en cuenta que los registros generales del servidor no quedan afectados por la decisión de excluirse del proceso de evaluación detallada. Consulte nuestra <a href="{$privacyStatementUrl}">declaración de privacidad</a> general.</p>',
  'plugins.generic.usageStats.settings.dataPrivacyOption.saltFilepath' => 'Ruta de archivo para anonimizar el "salt"',
  'plugins.generic.usageStats.settings.dataPrivacyOption.saltFilepath.invalid' => 'El archivo "salt" no es editable.',
  'plugins.generic.usageStats.settings.dataPrivacyOption.description' => 'Active esta opción para usar una versión del módulo que respete las legislaciones de privacidad, es decir, que registre las direcciones IP con función hash, que informe a los usuarios/as acerca del seguimiento y que les proporcione una opción de desistimiento. Nota: cuando use esta opción no podrá utilizar las características geográficas del módulo.',
  'plugins.generic.usageStats.settings.dataPrivacyOption.requiresSalt' => 'La activación de la privacidad de datos requiere un archivo "salt".',
  'plugins.generic.usageStats.settings.dataPrivacyOption.requirements' => 'Para asegurar la privacidad de los datos debe especificar un archivo que el usuario/a web pueda leer y editar y que contenga un valor "salt" generado aleatoriamente. NO se debe hacer copia de seguridad del archivo para garantizar la protección de privacidad. El archivo "salt" se genera aleatoriamente utilizando la función mcrypt_create_iv, que requiere PHP mcrypt; la función openssl_random_pseudo_bytes, que requiere PHP openssl; el archivo /dev/urandom, que solo funciona en sistemas *nix; o la función mt_rand, que no es criptográficamente segura. Por lo tanto, si utiliza un servidor Windows asegúrese de que tiene instalado PHP mcrypt o activado openssl para conseguir la generación de un archivo "salt" criptográficamente seguro.',
  'plugins.generic.usageStats.optout.description.long.omp' => '
		<h3>Información de privacidad general</h3>
		<p>Consulte nuestra <a href="{$privacyStatementUrl}">declaración de privacidad general</a>.</p>
		<h3>Estadísticas de uso</h3>
		<p>Para poder analizar el uso e impacto de nuestras publicaciones, recopilamos y registramos el acceso a la página de inicio, a las categorías, a las series, a los libros y a los archivos. En este proceso todos los datos son anonimizados. No se registra ninguna información personal. Las direcciones IP son anonimizadas mediante encriptación (utilizando <em>SHA 256</em>) en combinación con un <em>salt de 64 caracteres de seguridad</em> que <em>se generan aleatoriamente y se anulan cada día</em> automáticamente. Por lo tanto, las direcciones IP no pueden ser reconstruidas.</p>
		<p>Se recopila la siguiente información junto con las direcciones IP anonimizadas:</p>
		<ul>
		<li>Tipo de acceso (p. ej. administrador/a)</li>
		<li>Hora de la solicitud</li>
		<li>URL solicitada</li>
		<li>Código de estado HTTP</li>
		<li>Navegador</li>
		</ul>
		<p>Los datos recopilados solo se utilizan con fines de evaluación. Ninguna dirección IP es mapeada hacia la ID de usuario/a. Es técnicamente imposible rastrear un conjunto de datos específico hasta una dirección IP específica.</p>',
  'plugins.generic.usageStats.settings.statsDisplayOptions.siteWide.omp' => 'Cada editorial puede anular estos ajustes desde la página de módulos de la editorial.',
  'plugins.generic.usageStats.optout.description.long.ojs2' => '
		<h3>Información de privacidad general</h3>
		<p>Consulte nuestra <a href="{$privacyStatementUrl}">declaración de privacidad general</a>.</p>
		<h3>Estadísticas de uso</h3>
		<p>Para poder analizar el uso e impacto de su revista y de los artículos publicados, recopilamos y registramos el acceso a la página de inicio de la revista, a los números publicados, a los artículos, a las galeradas y a los archivos complementarios. En este proceso todos los datos son anonimizados. No se registra ninguna información personal. Las direcciones IP son anonimizadas mediante encriptación (utilizando <em>SHA 256</em>) en combinación con un <em>salt de 64 caracteres de seguridad</em> que <em>se generan aleatoriamente y se anulan cada día</em> automáticamente. Por lo tanto, las direcciones IP no pueden ser reconstruidas.</p>
		<p>Se recopila la siguiente información junto con las direcciones IP anonimizadas:</p>
		<ul>
		<li>Tipo de acceso (p. ej. administrador/a)</li>
		<li>Hora de la solicitud</li>
		<li>URL solicitada</li>
		<li>Código de estado HTTP</li>
		<li>Navegador</li>
		</ul>
		<p>Los datos recopilados solo se utilizan con fines de evaluación. Ninguna dirección IP es mapeada hacia la ID de usuario/a. Es técnicamente imposible rastrear un conjunto de datos específico hasta una dirección IP específica.</p>',
  'plugins.generic.usageStats.settings.statsDisplayOptions.siteWide.ojs2' => 'Cada revista puede anular estos ajustes desde la página de módulos de la revista.',
);