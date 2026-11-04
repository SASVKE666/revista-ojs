{**
 * plugins/themes/pardalisTheme/templates/frontend/components/header.tpl
 *
 * @brief Encabezado del tema PARDALIS (estilo Laborex).
 *
 * Basado en lib/pkp/templates/frontend/components/header.tpl. Se conservan
 * las clases que usa el JavaScript del tema Default (menú móvil) y se agrega
 * una franja superior con logo, datos de contacto y botón de envío.
 *
 * Además, en la portada de una revista NO se abre el contenedor estrecho
 * (pkp_structure_content) para que las secciones usen todo el ancho.
 * El pie de página (footer.tpl) cierra en consecuencia.
 *}
{strip}
	{assign var="showingLogo" value=true}
	{if !$displayPageHeaderLogo}
		{assign var="showingLogo" value=false}
	{/if}
{/strip}
<!DOCTYPE html>
<html lang="{$currentLocale|replace:"_":"-"}" xml:lang="{$currentLocale|replace:"_":"-"}">
<!-- PardalisTheme {$pardalisDiag|default:"v1.3"|escape} -->
{if !$pageTitleTranslated}{capture assign="pageTitleTranslated"}{translate key=$pageTitle}{/capture}{/if}
{include file="frontend/components/headerHead.tpl"}
<body class="pkp_page_{$requestedPage|escape|default:"index"} pkp_op_{$requestedOp|escape|default:"index"}{if $showingLogo} has_site_logo{/if}{if $currentContext && (!$requestedPage || $requestedPage === 'index') && (!$requestedOp || $requestedOp === 'index')} pardalis_home{/if}" dir="{$currentLocaleLangDir|escape|default:"ltr"}">

	<div class="pkp_structure_page">

		{* Header *}
		<header class="pkp_structure_head" id="headerNavigationContainer" role="banner">
			{* Skip to content nav links *}
			{include file="frontend/components/skipLinks.tpl"}

			<div class="pkp_head_wrapper">

				{* Franja superior: logo + contacto + botón de envío *}
				<div class="pkp_site_name_wrapper pardalis_topbar">
					<button class="pkp_site_nav_toggle">
						<span>Open Menu</span>
					</button>
					{if !$requestedPage || $requestedPage === 'index'}
						<h1 class="pkp_screen_reader">
							{if $currentContext}
								{$displayPageHeaderTitle|escape}
							{else}
								{$siteTitle|escape}
							{/if}
						</h1>
					{/if}
					<div class="pkp_site_name">
					{capture assign="homeUrl"}
						{url page="index" router=$smarty.const.ROUTE_PAGE}
					{/capture}
					{if $displayPageHeaderLogo}
						<a href="{$homeUrl}" class="is_img">
							<img src="{$publicFilesDir}/{$displayPageHeaderLogo.uploadName|escape:"url"}" width="{$displayPageHeaderLogo.width|escape}" height="{$displayPageHeaderLogo.height|escape}" {if $displayPageHeaderLogo.altText != ''}alt="{$displayPageHeaderLogo.altText|escape}"{/if} />
						</a>
					{elseif $displayPageHeaderTitle}
						<a href="{$homeUrl}" class="is_text">
							<span class="pardalis_logo_icon fa fa-flask" aria-hidden="true"></span>
							<span class="pardalis_logo_text">{$displayPageHeaderTitle|escape}</span>
						</a>
					{else}
						<a href="{$homeUrl}" class="is_img">
							<img src="{$baseUrl}/templates/images/structure/logo.png" alt="{$applicationName|escape}" title="{$applicationName|escape}" width="180" height="90" />
						</a>
					{/if}
					</div>

					{if $currentContext}
						<div class="pardalis_topinfo">
							{if $currentContext->getData('contactEmail')}
								<span class="pardalis_topinfo_item">
									<span class="fa fa-envelope-o" aria-hidden="true"></span>
									<a href="mailto:{$currentContext->getData('contactEmail')|escape}">{$currentContext->getData('contactEmail')|escape}</a>
								</span>
							{/if}
							{if $currentContext->getLocalizedData('contactAffiliation')}
								<span class="pardalis_topinfo_item">
									<span class="fa fa-map-marker" aria-hidden="true"></span>
									{$currentContext->getLocalizedData('contactAffiliation')|strip_tags|escape}
								</span>
							{/if}
							<a href="{url page="submission"}" class="pardalis_btn pardalis_btn_primary pardalis_btn_sm">
								{translate key="author.submit"}
							</a>
						</div>
					{/if}
				</div>

				{capture assign="primaryMenu"}
					{load_menu name="primary" id="navigationPrimary" ulClass="pkp_navigation_primary"}
				{/capture}

				<nav class="pkp_site_nav_menu" aria-label="{translate|escape key="common.navigation.site"}">
					<a id="siteNav"></a>
					<div class="pkp_navigation_primary_row">
						<div class="pkp_navigation_primary_wrapper">
							{* Primary navigation menu for current application *}
							{$primaryMenu}

							{* Search form *}
							{if $currentContext && $requestedPage !== 'search'}
								<div class="pkp_navigation_search_wrapper">
									<a href="{url page="search"}" class="pkp_search pkp_search_desktop">
										<span class="fa fa-search" aria-hidden="true"></span>
										<span class="pardalis_search_label">{translate key="common.search"}</span>
									</a>
								</div>
							{/if}
						</div>
					</div>
					<div class="pkp_navigation_user_wrapper" id="navigationUserWrapper">
						{load_menu name="user" id="navigationUser" ulClass="pkp_navigation_user" liClass="profile"}
					</div>
				</nav>
			</div><!-- .pkp_head_wrapper -->
		</header><!-- .pkp_structure_head -->

		{* Wrapper for page content and sidebars.
		   En la portada de la revista no se abre: las secciones van a todo el ancho. *}
		{if $isFullWidth}
			{assign var=hasSidebar value=0}
		{/if}
		{if !($currentContext && (!$requestedPage || $requestedPage === 'index') && (!$requestedOp || $requestedOp === 'index'))}
		<div class="pkp_structure_content{if $hasSidebar} has_sidebar{/if}">
			<div class="pkp_structure_main" role="main">
				<a id="pkp_content_main"></a>
		{else}
		<div class="pardalis_home_main" role="main">
			<a id="pkp_content_main"></a>
		{/if}
