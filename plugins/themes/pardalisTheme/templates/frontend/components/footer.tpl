{**
 * plugins/themes/pardalisTheme/templates/frontend/components/footer.tpl
 *
 * @brief Pie de página del tema PARDALIS (estilo Laborex).
 *
 * Basado en lib/pkp/templates/frontend/components/footer.tpl. Debe cerrar
 * los mismos contenedores que abre header.tpl: en la portada de la revista
 * no hay pkp_structure_content / pkp_structure_main ni barra lateral.
 *}
{if !($currentContext && (!$requestedPage || $requestedPage === 'index') && (!$requestedOp || $requestedOp === 'index'))}

	</div><!-- pkp_structure_main -->

	{* Sidebars *}
	{if empty($isFullWidth)}
		{capture assign="sidebarCode"}{call_hook name="Templates::Common::Sidebar"}{/capture}
		{if $sidebarCode}
			<div class="pkp_structure_sidebar left" role="complementary" aria-label="{translate|escape key="common.navigation.sidebar"}">
				{$sidebarCode}
			</div><!-- pkp_sidebar.left -->
		{/if}
	{/if}
</div><!-- pkp_structure_content -->

{else}

</div><!-- pardalis_home_main -->

{/if}

<div class="pkp_structure_footer_wrapper" role="contentinfo">
	<a id="pkp_content_footer"></a>

	<div class="pkp_structure_footer">

		{if $currentContext}
			<div class="pardalis_footer_cols">
				<div class="pardalis_footer_col pardalis_footer_about">
					<div class="pardalis_footer_title">{$currentContext->getLocalizedName()|escape}</div>
					{if $currentContext->getData('onlineIssn') || $currentContext->getData('printIssn')}
						<p class="pardalis_footer_issn">
							{if $currentContext->getData('printIssn')}ISSN: {$currentContext->getData('printIssn')|escape}{/if}
							{if $currentContext->getData('printIssn') && $currentContext->getData('onlineIssn')} · {/if}
							{if $currentContext->getData('onlineIssn')}e-ISSN: {$currentContext->getData('onlineIssn')|escape}{/if}
						</p>
					{/if}
					{if $currentContext->getLocalizedData('contactAffiliation')}
						<p>{$currentContext->getLocalizedData('contactAffiliation')|strip_tags|escape}</p>
					{/if}
				</div>
				<div class="pardalis_footer_col">
					<div class="pardalis_footer_title">{translate key="about.aboutContext"}</div>
					<ul>
						<li><a href="{url page="about"}">{translate key="about.aboutContext"}</a></li>
						<li><a href="{url page="about" op="editorialTeam"}">{translate key="about.editorialTeam"}</a></li>
						<li><a href="{url page="about" op="submissions"}">{translate key="about.submissions"}</a></li>
						<li><a href="{url page="about" op="contact"}">{translate key="about.contact"}</a></li>
					</ul>
				</div>
				<div class="pardalis_footer_col">
					<div class="pardalis_footer_title">{translate key="navigation.archives"}</div>
					<ul>
						<li><a href="{url page="issue" op="current"}">{translate key="journal.currentIssue"}</a></li>
						<li><a href="{url page="issue" op="archive"}">{translate key="journal.viewAllIssues"}</a></li>
						<li><a href="{url page="search"}">{translate key="common.search"}</a></li>
					</ul>
				</div>
			</div>
		{/if}

		{if $pageFooter}
			<div class="pkp_footer_content">
				{$pageFooter}
			</div>
		{/if}

		<div class="pkp_brand_footer" role="complementary">
			<a href="{url page="about" op="aboutThisPublishingSystem"}">
				<img alt="{translate key="about.aboutThisPublishingSystem"}" src="{$baseUrl}/{$brandImage}">
			</a>
		</div>
	</div>
</div><!-- pkp_structure_footer_wrapper -->

</div><!-- pkp_structure_page -->

{load_script context="frontend"}

{call_hook name="Templates::Common::Footer::PageFooter"}
</body>
</html>
