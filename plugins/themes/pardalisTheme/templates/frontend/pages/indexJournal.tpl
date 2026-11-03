{**
 * plugins/themes/pardalisTheme/templates/frontend/pages/indexJournal.tpl
 *
 * @brief Portada de la revista (estilo Laborex adaptado a revista científica).
 *
 * Basado en templates/frontend/pages/indexJournal.tpl. Conserva todo lo que
 * ya mostraba OJS (anuncios, número actual, contenido adicional, hooks) y
 * agrega: hero, accesos para la comunidad científica, sobre la revista,
 * estadísticas y artículos recientes.
 *
 * Variables que llegan desde PardalisThemePlugin::loadHomeData():
 * @uses $pardalisStats array  articles / issues / sections
 * @uses $pardalisSections array  Títulos de secciones de la revista
 * @uses $pardalisRecent array  Últimos artículos publicados
 * @uses $pardalisLead string  Descripción corta (texto plano) para el hero
 *
 * Los textos fijos de las tarjetas están en español y se pueden editar
 * directamente aquí abajo.
 *}
{include file="frontend/components/header.tpl" pageTitleTranslated=$currentJournal->getLocalizedName()}

<div class="page_index_journal">

	{call_hook name="Templates::Index::journal"}

	{* ============================================================
	   1) HERO
	   ============================================================ *}
	<section class="pardalis_hero">
		<div class="pardalis_hero_bg"{if $homepageImage} style="background-image: url('{$publicFilesDir}/{$homepageImage.uploadName|escape:"url"}');"{/if}></div>
		<div class="pardalis_container">
			<div class="pardalis_hero_card">
				<div class="pardalis_hero_text">
					<span class="pardalis_eyebrow">Publicación científica</span>
					<h2 class="pardalis_hero_title">{$currentContext->getLocalizedName()|escape}</h2>
					{if $currentContext->getData('onlineIssn') || $currentContext->getData('printIssn')}
						<p class="pardalis_hero_issn">
							{if $currentContext->getData('printIssn')}ISSN {$currentContext->getData('printIssn')|escape}{/if}
							{if $currentContext->getData('printIssn') && $currentContext->getData('onlineIssn')} &nbsp;|&nbsp; {/if}
							{if $currentContext->getData('onlineIssn')}e-ISSN {$currentContext->getData('onlineIssn')|escape}{/if}
						</p>
					{/if}
					{if $pardalisLead}
						<p class="pardalis_hero_lead">{$pardalisLead|escape}</p>
					{/if}
					<div class="pardalis_hero_actions">
						<a href="{url page="submission"}" class="pardalis_btn pardalis_btn_primary">{translate key="author.submit"}</a>
						{if $issue}
							<a href="{url page="issue" op="current"}" class="pardalis_btn pardalis_btn_outline">{translate key="journal.currentIssue"}</a>
						{else}
							<a href="{url page="issue" op="archive"}" class="pardalis_btn pardalis_btn_outline">{translate key="journal.viewAllIssues"}</a>
						{/if}
					</div>
				</div>

				<div class="pardalis_hero_visual">
					{if $issue && $issue->getLocalizedCoverImageUrl()}
						<a href="{url page="issue" op="current"}" class="pardalis_cover">
							<img src="{$issue->getLocalizedCoverImageUrl()|escape}" alt="{$issue->getIssueIdentification()|strip_tags|escape}">
						</a>
					{else}
						<div class="pardalis_cover pardalis_cover_placeholder" aria-hidden="true">
							<span class="fa fa-flask"></span>
							<strong>{if $currentContext->getLocalizedAcronym()}{$currentContext->getLocalizedAcronym()|escape}{else}{$currentContext->getLocalizedName()|escape}{/if}</strong>
							{if $issue}<small>{$issue->getIssueIdentification()|strip_tags|escape}</small>{/if}
						</div>
					{/if}
				</div>
			</div>
		</div>
	</section>

	{* ============================================================
	   2) ACCESOS PARA LA COMUNIDAD CIENTÍFICA (tarjetas)
	   ============================================================ *}
	<section class="pardalis_section pardalis_section_mint">
		<div class="pardalis_container">
			<div class="pardalis_section_head">
				<span class="pardalis_label">Comunidad científica</span>
				<h2 class="pardalis_section_title">Todo lo que necesita para publicar y consultar investigación</h2>
			</div>
			<div class="pardalis_cards">
				<article class="pardalis_card">
					<span class="pardalis_card_icon fa fa-paper-plane" aria-hidden="true"></span>
					<h3>Envío de manuscritos</h3>
					<p>Envíe su manuscrito en línea y dé seguimiento a cada etapa del proceso editorial.</p>
					<a href="{url page="submission"}" class="pardalis_btn pardalis_btn_soft">Enviar</a>
				</article>
				<article class="pardalis_card">
					<span class="pardalis_card_icon fa fa-file-text-o" aria-hidden="true"></span>
					<h3>Directrices para autores</h3>
					<p>Consulte los requisitos de formato y las normas de presentación antes de enviar.</p>
					<a href="{url page="about" op="submissions"}" class="pardalis_btn pardalis_btn_soft">{translate key="common.readMore"}</a>
				</article>
				<article class="pardalis_card">
					<span class="pardalis_card_icon fa fa-balance-scale" aria-hidden="true"></span>
					<h3>Políticas editoriales</h3>
					<p>Conozca el proceso de revisión, la ética de la publicación y las políticas de la revista.</p>
					<a href="{url page="about" op="editorialPolicies"}" class="pardalis_btn pardalis_btn_soft">{translate key="common.readMore"}</a>
				</article>
				<article class="pardalis_card">
					<span class="pardalis_card_icon fa fa-archive" aria-hidden="true"></span>
					<h3>Archivo de números</h3>
					<p>Explore todos los números publicados y consulte los artículos en texto completo.</p>
					<a href="{url page="issue" op="archive"}" class="pardalis_btn pardalis_btn_soft">{translate key="common.readMore"}</a>
				</article>
			</div>
		</div>
	</section>

	{* ============================================================
	   3) SOBRE LA REVISTA
	   ============================================================ *}
	<section class="pardalis_section">
		<div class="pardalis_container pardalis_about">
			<div class="pardalis_about_visual" aria-hidden="true">
				<div class="pardalis_about_art">
					<span class="fa fa-book"></span>
				</div>
				{if $pardalisStats}
					<div class="pardalis_badge">
						<strong>{$pardalisStats.articles|escape}</strong>
						<span>artículos<br>publicados</span>
					</div>
				{/if}
			</div>
			<div class="pardalis_about_text">
				<span class="pardalis_label">{translate key="about.aboutContext"}</span>
				<h2 class="pardalis_section_title pardalis_left">{$currentContext->getLocalizedName()|escape}</h2>
				{if $currentContext->getLocalizedData('description')}
					<div class="pardalis_about_desc">{$currentContext->getLocalizedData('description')|strip_unsafe_html}</div>
				{/if}
				{if $pardalisSections|@count}
					<ul class="pardalis_chips">
						{foreach from=$pardalisSections item=sectionTitle}
							<li>{$sectionTitle|escape}</li>
						{/foreach}
					</ul>
				{/if}
				<a href="{url page="about"}" class="pardalis_btn pardalis_btn_primary">{translate key="about.aboutContext"}</a>
			</div>
		</div>
	</section>

	{* ============================================================
	   4) ESTADÍSTICAS
	   ============================================================ *}
	{if $pardalisStats && ($pardalisStats.articles || $pardalisStats.issues || $pardalisStats.sections)}
		<section class="pardalis_stats">
			<div class="pardalis_container pardalis_stats_inner">
				<div class="pardalis_stat">
					<strong>{$pardalisStats.articles|escape}</strong>
					<span>Artículos publicados</span>
					<i></i>
				</div>
				<div class="pardalis_stat">
					<strong>{$pardalisStats.issues|escape}</strong>
					<span>Números publicados</span>
					<i></i>
				</div>
				<div class="pardalis_stat">
					<strong>{$pardalisStats.sections|escape}</strong>
					<span>Secciones de la revista</span>
					<i></i>
				</div>
			</div>
		</section>
	{/if}

	{* ============================================================
	   5) ARTÍCULOS RECIENTES
	   ============================================================ *}
	{if $pardalisRecent|@count}
		<section class="pardalis_section pardalis_section_mint">
			<div class="pardalis_container">
				<div class="pardalis_section_head">
					<span class="pardalis_label">Últimas publicaciones</span>
					<h2 class="pardalis_section_title">Artículos recientes</h2>
				</div>
				<div class="pardalis_articles">
					{foreach from=$pardalisRecent item=art}
						<article class="pardalis_article">
							<a href="{$art.url|escape}" class="pardalis_article_img{if !$art.cover} pardalis_article_img_empty{/if}"{if $art.cover} style="background-image: url('{$art.cover|escape}');"{/if} tabindex="-1" aria-hidden="true">
								{if !$art.cover}<span class="fa fa-file-text-o"></span>{/if}
								{if $art.day}
									<span class="pardalis_date"><b>{$art.day|escape}</b>{$art.month|escape}</span>
								{/if}
							</a>
							<div class="pardalis_article_body">
								{if $art.section}<span class="pardalis_tag">{$art.section|escape}</span>{/if}
								<h3><a href="{$art.url|escape}">{$art.title|strip_unsafe_html}</a></h3>
								{if $art.authors}<p class="pardalis_article_authors"><span class="fa fa-user-o" aria-hidden="true"></span> {$art.authors|escape}</p>{/if}
								<a href="{$art.url|escape}" class="pardalis_btn pardalis_btn_soft pardalis_btn_sm">{translate key="common.readMore"}</a>
							</div>
						</article>
					{/foreach}
				</div>
			</div>
		</section>
	{/if}

	{* ============================================================
	   6) CONTENIDO QUE OJS YA MOSTRABA (anuncios, número actual, extra)
	   ============================================================ *}
	<div class="pardalis_container pardalis_native">

		{* Announcements *}
		{if $numAnnouncementsHomepage && $announcements|@count}
			<section class="cmp_announcements highlight_first">
				<a id="homepageAnnouncements"></a>
				<h2>
					{translate key="announcement.announcements"}
				</h2>
				{foreach name=announcements from=$announcements item=announcement}
					{if $smarty.foreach.announcements.iteration > $numAnnouncementsHomepage}
						{break}
					{/if}
					{if $smarty.foreach.announcements.iteration == 1}
						{include file="frontend/objects/announcement_summary.tpl" heading="h3"}
						<div class="more">
					{else}
						<article class="obj_announcement_summary">
							<h4>
								<a href="{url router=$smarty.const.ROUTE_PAGE page="announcement" op="view" path=$announcement->getId()}">
									{$announcement->getLocalizedTitle()|escape}
								</a>
							</h4>
							<div class="date">
								{$announcement->getDatePosted()|date_format:$dateFormatShort}
							</div>
						</article>
					{/if}
				{/foreach}
				</div><!-- .more -->
			</section>
		{/if}

		{* Latest issue *}
		{if $issue}
			<section class="current_issue">
				<a id="homepageIssue"></a>
				<h2>
					{translate key="journal.currentIssue"}
				</h2>
				<div class="current_issue_title">
					{$issue->getIssueIdentification()|strip_unsafe_html}
				</div>
				{include file="frontend/objects/issue_toc.tpl" heading="h3"}
				<a href="{url router=$smarty.const.ROUTE_PAGE page="issue" op="archive"}" class="read_more">
					{translate key="journal.viewAllIssues"}
				</a>
			</section>
		{/if}

		{* Additional Homepage Content *}
		{if $additionalHomeContent}
			<div class="additional_content">
				{$additionalHomeContent}
			</div>
		{/if}
	</div>

	{* ============================================================
	   7) LLAMADO A ENVIAR
	   ============================================================ *}
	<section class="pardalis_cta">
		<div class="pardalis_container pardalis_cta_inner">
			<div>
				<h2>¿Tiene una investigación lista para publicar?</h2>
				<p>Envíe su manuscrito a {$currentContext->getLocalizedName()|escape} o escríbanos si tiene dudas sobre el proceso.</p>
			</div>
			<div class="pardalis_cta_actions">
				<a href="{url page="submission"}" class="pardalis_btn pardalis_btn_white">{translate key="author.submit"}</a>
				<a href="{url page="about" op="contact"}" class="pardalis_btn pardalis_btn_ghost">{translate key="about.contact"}</a>
			</div>
		</div>
	</section>

</div><!-- .page_index_journal -->

{include file="frontend/components/footer.tpl"}
