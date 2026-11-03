{**
 * plugins/themes/pardalisTheme/templates/frontend/pages/search.tpl
 *
 * @brief Página de búsqueda del tema PARDALIS.
 *
 * Basado en templates/frontend/pages/search.tpl. Se conservan los mismos
 * nombres de campos (query, authors, dateFrom*, dateTo*), el iterador de
 * resultados, la paginación y los hooks para que todo siga funcionando con
 * el buscador de OJS. Cambia solo la presentación:
 *  - barra de búsqueda grande con lupa
 *  - filtros avanzados plegables (se abren solos si hay filtros activos)
 *  - contador de resultados visible
 *  - pantalla inicial con consejos de búsqueda (en vez de "No hay resultados")
 *  - mensaje útil cuando una búsqueda no devuelve nada
 *
 * @uses $query Value of the primary search query
 * @uses $authors Value of the authors search filter
 * @uses $dateFrom Value of the date from search filter (published after).
 * @uses $dateTo Value of the date to search filter (published before).
 * @uses $yearStart Earliest year that can be used in from/to filters
 * @uses $yearEnd Latest year that can be used in from/to filters
 *}
{include file="frontend/components/header.tpl" pageTitle="common.search"}

{if !$heading}
	{assign var="heading" value="h2"}
{/if}

<div class="page page_search pardalis_search">

	{include file="frontend/components/breadcrumbs.tpl" currentTitleKey="common.search"}

	{capture name="searchFormUrl"}{url escape=false}{/capture}
	{assign var=formUrlParameters value=[]}{* Prevent Smarty warning *}
	{$smarty.capture.searchFormUrl|parse_url:$smarty.const.PHP_URL_QUERY|default:""|parse_str:$formUrlParameters}

	{* ¿Hay algo buscado? (texto, autor o fechas) *}
	{assign var="pardalisHasSearch" value=false}
	{if $query || $authors || $dateFrom || $dateTo}
		{assign var="pardalisHasSearch" value=true}
	{/if}

	<section class="pardalis_search_hero">
		<span class="pardalis_label">{translate key="common.search"}</span>
		<h1>Encuentre artículos científicos</h1>
		<p class="pardalis_search_sub">Busque por título, resumen, autor o palabra clave en todos los números publicados.</p>

		<form class="cmp_form pardalis_search_form" method="get" action="{$smarty.capture.searchFormUrl|strtok:"?"|escape}">
			{foreach from=$formUrlParameters key=paramKey item=paramValue}
				<input type="hidden" name="{$paramKey|escape}" value="{$paramValue|escape}"/>
			{/foreach}

			<div class="search_input pardalis_search_bar">
				<span class="fa fa-search" aria-hidden="true"></span>
				{* Repeat the label text just so that screen readers have a clear
				   label/input relationship *}
				<label class="pkp_screen_reader" for="query">
					{translate key="search.searchFor"}
				</label>
				{block name=searchQuery}
					<input type="text" id="query" name="query" value="{$query|escape}" class="query" placeholder="Título, autor o palabra clave…" autocomplete="off"{if !$pardalisHasSearch} autofocus{/if}>
				{/block}
				<button class="submit" type="submit">{translate key="common.search"}</button>
			</div>

			<details class="pardalis_filters"{if $authors || $dateFrom || $dateTo} open{/if}>
				<summary>
					<span class="fa fa-sliders" aria-hidden="true"></span>
					{translate key="search.advancedFilters"}
				</summary>
				<fieldset class="search_advanced">
					<legend class="pkp_screen_reader">
						{translate key="search.advancedFilters"}
					</legend>
					<div class="date_range">
						<div class="from">
							{capture assign="dateFromLegend"}{translate key="search.dateFrom"}{/capture}
							{html_select_date_a11y legend=$dateFromLegend prefix="dateFrom" time=$dateFrom start_year=$yearStart end_year=$yearEnd}
						</div>
						<div class="to">
							{capture assign="dateFromTo"}{translate key="search.dateTo"}{/capture}
							{html_select_date_a11y legend=$dateFromTo prefix="dateTo" time=$dateTo start_year=$yearStart end_year=$yearEnd}
						</div>
					</div>
					<div class="author">
						<label class="label" for="authors">
							{translate key="search.author"}
						</label>
						{block name=searchAuthors}
							<input type="text" id="authors" name="authors" value="{$authors|escape}">
						{/block}
					</div>
					{call_hook name="Templates::Search::SearchResults::AdditionalFilters"}
				</fieldset>
			</details>
		</form>
	</section>

	{call_hook name="Templates::Search::SearchResults::PreResults"}

	{if $pardalisHasSearch}

		<h2 class="pkp_screen_reader">{translate key="search.searchResults"}</h2>

		{if !$results->wasEmpty()}
			{* Contador de resultados *}
			<p class="pardalis_search_count" role="status">
				<span class="fa fa-file-text-o" aria-hidden="true"></span>
				{if $results->count > 1}
					{translate key="search.searchResults.foundPlural" count=$results->count}
				{else}
					{translate key="search.searchResults.foundSingle"}
				{/if}
				{if $query}<em>&laquo;{$query|escape}&raquo;</em>{/if}
			</p>
		{/if}

		{* Search results, finally! *}
		<ul class="search_results pardalis_results">
			{iterate from=results item=result}
				<li>
					{include file="frontend/objects/article_summary.tpl" article=$result.publishedSubmission journal=$result.journal showDatePublished=true hideGalleys=true heading="h3"}
				</li>
			{/iterate}
		</ul>

		{* No results found *}
		{if $results->wasEmpty()}
			<div class="pardalis_empty" role="status">
				{if $error}
					{include file="frontend/components/notification.tpl" type="error" message=$error|escape}
				{else}
					<span class="pardalis_empty_icon fa fa-search" aria-hidden="true"></span>
					<h3>{translate key="search.noResults"}</h3>
					<p>No encontramos artículos que coincidan con su búsqueda. Pruebe lo siguiente:</p>
					<ul>
						<li>Revise la ortografía o use menos palabras.</li>
						<li>Quite los filtros de autor o de fechas.</li>
						<li>Pruebe con sinónimos o palabras más generales.</li>
					</ul>
					<a href="{url page="issue" op="archive"}" class="pardalis_btn pardalis_btn_soft">{translate key="journal.viewAllIssues"}</a>
				{/if}
			</div>

		{* Results pagination *}
		{else}
			<div class="cmp_pagination">
				{page_info iterator=$results}
				{page_links anchor="results" iterator=$results name="search" query=$query searchJournal=$searchJournal authors=$authors dateFromMonth=$dateFromMonth dateFromDay=$dateFromDay dateFromYear=$dateFromYear dateToMonth=$dateToMonth dateToDay=$dateToDay dateToYear=$dateToYear}
			</div>
		{/if}

	{else}

		{* Pantalla inicial: consejos de búsqueda *}
		<div class="pardalis_tips">
			<div class="pardalis_tip">
				<span class="pardalis_card_icon fa fa-quote-right" aria-hidden="true"></span>
				<h3>Frase exacta</h3>
				<p>Escriba la frase entre comillas, por ejemplo <code>"derecho informático"</code>.</p>
			</div>
			<div class="pardalis_tip">
				<span class="pardalis_card_icon fa fa-minus-circle" aria-hidden="true"></span>
				<h3>Excluir términos</h3>
				<p>Ponga un guion antes de una palabra para descartarla, por ejemplo <code>seguridad -redes</code>.</p>
			</div>
			<div class="pardalis_tip">
				<span class="pardalis_card_icon fa fa-sliders" aria-hidden="true"></span>
				<h3>Filtre con precisión</h3>
				<p>Abra los filtros avanzados para limitar por autor o por rango de fechas de publicación.</p>
			</div>
		</div>
		<p class="pardalis_search_browse">
			¿Prefiere explorar? <a href="{url page="issue" op="archive"}">{translate key="journal.viewAllIssues"}</a>
		</p>

	{/if}

	{* Search Syntax Instructions *}
	{block name=searchSyntaxInstructions}{/block}
</div><!-- .page -->

{include file="frontend/components/footer.tpl"}
