<?php
/* Smarty version 4.3.1, created on 2026-11-04 04:51:23
  from 'app:frontendpagessearch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6aeab9cb00ba13_14376026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '756a7119cb48731a8fd45c250b45f4bcca2d6b01' => 
    array (
      0 => 'app:frontendpagessearch.tpl',
      1 => 1793767289,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/header.tpl' => 1,
    'app:frontend/components/breadcrumbs.tpl' => 1,
    'app:frontend/objects/article_summary.tpl' => 1,
    'app:frontend/components/notification.tpl' => 1,
    'app:frontend/components/footer.tpl' => 1,
  ),
),false)) {
function content_6aeab9cb00ba13_14376026 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->_subTemplateRender("app:frontend/components/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>"common.search"), 0, false);
?>

<?php if (!$_smarty_tpl->tpl_vars['heading']->value) {?>
	<?php $_smarty_tpl->_assignInScope('heading', "h2");
}?>

<div class="page page_search pardalis_search">

	<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('currentTitleKey'=>"common.search"), 0, false);
?>

	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "searchFormUrl", null, null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
	<?php $_smarty_tpl->_assignInScope('formUrlParameters', array());?>	<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parse_str' ][ 0 ], array( (($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parse_url' ][ 0 ], array( $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'searchFormUrl'),(defined('PHP_URL_QUERY') ? constant('PHP_URL_QUERY') : null) )) ?? null)===null||$tmp==='' ? '' ?? null : $tmp),$_smarty_tpl->tpl_vars['formUrlParameters']->value ));?>


		<?php $_smarty_tpl->_assignInScope('pardalisHasSearch', false);?>
	<?php if ($_smarty_tpl->tpl_vars['query']->value || $_smarty_tpl->tpl_vars['authors']->value || $_smarty_tpl->tpl_vars['dateFrom']->value || $_smarty_tpl->tpl_vars['dateTo']->value) {?>
		<?php $_smarty_tpl->_assignInScope('pardalisHasSearch', true);?>
	<?php }?>

	<section class="pardalis_search_hero">
		<span class="pardalis_label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.search"),$_smarty_tpl ) );?>
</span>
		<h1>Encuentre artículos científicos</h1>
		<p class="pardalis_search_sub">Busque por título, resumen, autor o palabra clave en todos los números publicados.</p>

		<form class="cmp_form pardalis_search_form" method="get" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strtok' ][ 0 ], array( $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'searchFormUrl'),"?" )) ));?>
">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['formUrlParameters']->value, 'paramValue', false, 'paramKey');
$_smarty_tpl->tpl_vars['paramValue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['paramKey']->value => $_smarty_tpl->tpl_vars['paramValue']->value) {
$_smarty_tpl->tpl_vars['paramValue']->do_else = false;
?>
				<input type="hidden" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paramKey']->value ));?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['paramValue']->value ));?>
"/>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			<div class="search_input pardalis_search_bar">
				<span class="fa fa-search" aria-hidden="true"></span>
								<label class="pkp_screen_reader" for="query">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.searchFor"),$_smarty_tpl ) );?>

				</label>
				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15936863896aeab9caf2ec06_81188095', 'searchQuery');
?>

				<button class="submit" type="submit"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.search"),$_smarty_tpl ) );?>
</button>
			</div>

			<details class="pardalis_filters"<?php if ($_smarty_tpl->tpl_vars['authors']->value || $_smarty_tpl->tpl_vars['dateFrom']->value || $_smarty_tpl->tpl_vars['dateTo']->value) {?> open<?php }?>>
				<summary>
					<span class="fa fa-sliders" aria-hidden="true"></span>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.advancedFilters"),$_smarty_tpl ) );?>

				</summary>
				<fieldset class="search_advanced">
					<legend class="pkp_screen_reader">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.advancedFilters"),$_smarty_tpl ) );?>

					</legend>
					<div class="date_range">
						<div class="from">
							<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "dateFromLegend", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.dateFrom"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_select_date_a11y'][0], array( array('legend'=>$_smarty_tpl->tpl_vars['dateFromLegend']->value,'prefix'=>"dateFrom",'time'=>$_smarty_tpl->tpl_vars['dateFrom']->value,'start_year'=>$_smarty_tpl->tpl_vars['yearStart']->value,'end_year'=>$_smarty_tpl->tpl_vars['yearEnd']->value),$_smarty_tpl ) );?>

						</div>
						<div class="to">
							<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "dateFromTo", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.dateTo"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_select_date_a11y'][0], array( array('legend'=>$_smarty_tpl->tpl_vars['dateFromTo']->value,'prefix'=>"dateTo",'time'=>$_smarty_tpl->tpl_vars['dateTo']->value,'start_year'=>$_smarty_tpl->tpl_vars['yearStart']->value,'end_year'=>$_smarty_tpl->tpl_vars['yearEnd']->value),$_smarty_tpl ) );?>

						</div>
					</div>
					<div class="author">
						<label class="label" for="authors">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.author"),$_smarty_tpl ) );?>

						</label>
						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21040249536aeab9caf36607_21434780', 'searchAuthors');
?>

					</div>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Search::SearchResults::AdditionalFilters"),$_smarty_tpl ) );?>

				</fieldset>
			</details>
		</form>
	</section>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Search::SearchResults::PreResults"),$_smarty_tpl ) );?>


	<?php if ($_smarty_tpl->tpl_vars['pardalisHasSearch']->value) {?>

		<h2 class="pkp_screen_reader"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.searchResults"),$_smarty_tpl ) );?>
</h2>

		<?php if (!$_smarty_tpl->tpl_vars['results']->value->wasEmpty()) {?>
						<p class="pardalis_search_count" role="status">
				<span class="fa fa-file-text-o" aria-hidden="true"></span>
				<?php if ($_smarty_tpl->tpl_vars['results']->value->count > 1) {?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.searchResults.foundPlural",'count'=>$_smarty_tpl->tpl_vars['results']->value->count),$_smarty_tpl ) );?>

				<?php } else { ?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.searchResults.foundSingle"),$_smarty_tpl ) );?>

				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['query']->value) {?><em>&laquo;<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['query']->value ));?>
&raquo;</em><?php }?>
			</p>
		<?php }?>

				<ul class="search_results pardalis_results">
			<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['iterate'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['iterate'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'smartyIterate'))) {
throw new SmartyException('block tag \'iterate\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('iterate', array('from'=>'results','item'=>'result'));
$_block_repeat=true;
echo $_block_plugin1->smartyIterate(array('from'=>'results','item'=>'result'), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
				<li>
					<?php $_smarty_tpl->_subTemplateRender("app:frontend/objects/article_summary.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('article'=>$_smarty_tpl->tpl_vars['result']->value['publishedSubmission'],'journal'=>$_smarty_tpl->tpl_vars['result']->value['journal'],'showDatePublished'=>true,'hideGalleys'=>true,'heading'=>"h3"), 0, false);
?>
				</li>
			<?php $_block_repeat=false;
echo $_block_plugin1->smartyIterate(array('from'=>'results','item'=>'result'), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
		</ul>

				<?php if ($_smarty_tpl->tpl_vars['results']->value->wasEmpty()) {?>
			<div class="pardalis_empty" role="status">
				<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
					<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/notification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'message'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['error']->value ))), 0, false);
?>
				<?php } else { ?>
					<span class="pardalis_empty_icon fa fa-search" aria-hidden="true"></span>
					<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"search.noResults"),$_smarty_tpl ) );?>
</h3>
					<p>No encontramos artículos que coincidan con su búsqueda. Pruebe lo siguiente:</p>
					<ul>
						<li>Revise la ortografía o use menos palabras.</li>
						<li>Quite los filtros de autor o de fechas.</li>
						<li>Pruebe con sinónimos o palabras más generales.</li>
					</ul>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"issue",'op'=>"archive"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_soft"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"journal.viewAllIssues"),$_smarty_tpl ) );?>
</a>
				<?php }?>
			</div>

				<?php } else { ?>
			<div class="cmp_pagination">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['page_info'][0], array( array('iterator'=>$_smarty_tpl->tpl_vars['results']->value),$_smarty_tpl ) );?>

				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['page_links'][0], array( array('anchor'=>"results",'iterator'=>$_smarty_tpl->tpl_vars['results']->value,'name'=>"search",'query'=>$_smarty_tpl->tpl_vars['query']->value,'searchJournal'=>$_smarty_tpl->tpl_vars['searchJournal']->value,'authors'=>$_smarty_tpl->tpl_vars['authors']->value,'dateFromMonth'=>$_smarty_tpl->tpl_vars['dateFromMonth']->value,'dateFromDay'=>$_smarty_tpl->tpl_vars['dateFromDay']->value,'dateFromYear'=>$_smarty_tpl->tpl_vars['dateFromYear']->value,'dateToMonth'=>$_smarty_tpl->tpl_vars['dateToMonth']->value,'dateToDay'=>$_smarty_tpl->tpl_vars['dateToDay']->value,'dateToYear'=>$_smarty_tpl->tpl_vars['dateToYear']->value),$_smarty_tpl ) );?>

			</div>
		<?php }?>

	<?php } else { ?>

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
			¿Prefiere explorar? <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"issue",'op'=>"archive"),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"journal.viewAllIssues"),$_smarty_tpl ) );?>
</a>
		</p>

	<?php }?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1147439576aeab9cb009631_54840573', 'searchSyntaxInstructions');
?>

</div><!-- .page -->

<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {block 'searchQuery'} */
class Block_15936863896aeab9caf2ec06_81188095 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'searchQuery' => 
  array (
    0 => 'Block_15936863896aeab9caf2ec06_81188095',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<input type="text" id="query" name="query" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['query']->value ));?>
" class="query" placeholder="Título, autor o palabra clave…" autocomplete="off"<?php if (!$_smarty_tpl->tpl_vars['pardalisHasSearch']->value) {?> autofocus<?php }?>>
				<?php
}
}
/* {/block 'searchQuery'} */
/* {block 'searchAuthors'} */
class Block_21040249536aeab9caf36607_21434780 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'searchAuthors' => 
  array (
    0 => 'Block_21040249536aeab9caf36607_21434780',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<input type="text" id="authors" name="authors" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['authors']->value ));?>
">
						<?php
}
}
/* {/block 'searchAuthors'} */
/* {block 'searchSyntaxInstructions'} */
class Block_1147439576aeab9cb009631_54840573 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'searchSyntaxInstructions' => 
  array (
    0 => 'Block_1147439576aeab9cb009631_54840573',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'searchSyntaxInstructions'} */
}
