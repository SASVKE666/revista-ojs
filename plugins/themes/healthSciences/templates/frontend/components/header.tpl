{** * templates/frontend/components/header.tpl * * Copyright (c) 2014-2020 Simon Fraser University * Copyright (c) 2003-2020 John Willinsky * Distributed under the GNU GPL v2. For full terms see the 
file docs/COPYING. * * @brief Common frontend site header. *} {* Determine whether a logo or title string is being displayed *} 
{assign var="showingLogo" value=true} 
{if !$displayPageHeaderLogo} 
{assign var="showingLogo" value=false} 
{/if} 
{capture assign="homeUrl"} 
{url page="index" router=$smarty.const.ROUTE_PAGE} 
{/capture} 
{* Logo or site title. Only use <h1> heading on the homepage. 
Otherwise that should go to the page title. *} 
{if $requestedOp == 'index'} 
{assign var="siteNameTag" value="h1"} 
{else} 
{assign var="siteNameTag" value="div"} 
{/if} 
{* Determine whether to show a logo of site title *} 
{capture assign="brand"}
{strip} 
{if $displayPageHeaderLogo} <img src="{$publicFilesDir}/{$displayPageHeaderLogo.uploadName|escape:"url"}" 
{if $displayPageHeaderLogo.altText != ''}alt="{$displayPageHeaderLogo.altText|escape}" {else}alt="{translate key="common.pageHeaderLogo.altText"}"{/if} class="img-fluid"> 
{elseif $displayPageHeaderTitle} <span 
class="navbar-logo-text">{$displayPageHeaderTitle|escape}</span> 
{else} <img src="{$baseUrl}/templates/images/structure/logo.png" alt="{$applicationName|escape}" class="img-fluid"> 
{/if} 
{/strip}
{/capture} <!DOCTYPE html> <html lang="{$currentLocale|replace:"_":"-"}" xml:lang="{$currentLocale|replace:"_":"-"}">
{if !$pageTitleTranslated}
{capture assign="pageTitleTranslated"}{translate key=$pageTitle}
{/capture}
{/if}
	{include file="frontend/components/headerHead.tpl"}
	<body dir="{$currentLocaleLangDir|escape|default:"ltr"}">
	{* Header *}
	<header class="main-header">
	
	
	<div class="container">
		<{$siteNameTag} class="sr-only">{$pageTitleTranslated|escape}</{$siteNameTag}>
		<div class="navbar-logo">
			<div class="logos">
				<div class="zone_logoUni">
					<a target="_blank" href="https://www.uan.edu.mx/">
					<img alt="Imagotipo de la revista Bio Ciencias de la Universidad de Nayarit" src="{$baseUrl}/public/journals/1/logo_UnivNayarit.png">
					</a>
				</div>
				<div class="logorev_issn">
					<div class="logo-rev">
						<a href="{$baseUrl}/index.php/BIOCIENCIAS/index">
						<img src="{$baseUrl}/public/journals/1/pageHeaderLogoImage_es_ES.png" alt="Logo Revista Bio ciencias de la Universidad Autónoma de Nayarit" class="img-fluid">
						</a>
					</div>
				</div>

				<div class="zone_others">
					<div class="zone_issn"><p><a target="_blank" href="https://portal.issn.org/resource/ISSN/2007-3380">ISSN: 2007-3380</a></p></div></div>
				</div>


		</div>
		{* Main navigation *}
		{* Repeat the userNav for positioning on large screens *}
		{load_menu name="user" id="userNav" ulClass="navbar-nav" liClass="nav-item"}
		{* Language switcher *}
		{include file="frontend/components/languageSwitcher.tpl" id="languageLargeNav"}	</div>
	
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- LOGO A LA IZQUIERDA -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{$baseUrl}">
        <img src="{$baseUrl}/public/journals/1/logo_UnivNayarit.png" alt="Logo UAN">
        <img src="{$baseUrl}/public/journals/1/pageHeaderLogoImage_es_ES.png" alt="Pardalis">
      </a>
    </div>

    <!-- MENÚ PRINCIPAL (INICIO, NÚMERO ACTUAL, ETC) -->
    <div class="collapse navbar-collapse" id="nav-menu">
      <ul class="nav navbar-nav">
        {load_menu name="primary" id="primaryNav" ulClass="pkp_nav_list"}
      </ul>

      <!-- MENÚ DE USUARIO A LA DERECHA (ENTRAR/REGISTRARSE) -->
      <ul class="nav navbar-nav navbar-right">
        {load_menu name="user" id="userNav" ulClass="pkp_nav_list"}
      </ul>
    </div>
  </div>
</nav>
		
	
	</header>
