<?php
/* Smarty version 4.3.1, created on 2026-11-04 04:41:54
  from 'app:frontendpagesindexJournal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6aeab792b04d13_94194884',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e64e579388e5615e11e939b12134d6ae8679eba6' => 
    array (
      0 => 'app:frontendpagesindexJournal.tpl',
      1 => 1793767289,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/header.tpl' => 1,
    'app:frontend/objects/announcement_summary.tpl' => 1,
    'app:frontend/objects/issue_toc.tpl' => 1,
    'app:frontend/components/footer.tpl' => 1,
  ),
),false)) {
function content_6aeab792b04d13_94194884 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\revista-ojs\\lib\\pkp\\lib\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\laragon\\www\\revista-ojs\\lib\\pkp\\lib\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("app:frontend/components/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitleTranslated'=>$_smarty_tpl->tpl_vars['currentJournal']->value->getLocalizedName()), 0, false);
?>

<div class="page_index_journal">

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Index::journal"),$_smarty_tpl ) );?>


		<section class="pardalis_hero">
		<div class="pardalis_hero_bg"<?php if ($_smarty_tpl->tpl_vars['homepageImage']->value) {?> style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['publicFilesDir']->value;?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['homepageImage']->value['uploadName'],"url" ));?>
');"<?php }?>></div>
		<div class="pardalis_container">
			<div class="pardalis_hero_card">
				<div class="pardalis_hero_text">
					<span class="pardalis_eyebrow">Publicación científica</span>
					<h2 class="pardalis_hero_title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedName() ));?>
</h2>
					<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getData('onlineIssn') || $_smarty_tpl->tpl_vars['currentContext']->value->getData('printIssn')) {?>
						<p class="pardalis_hero_issn">
							<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getData('printIssn')) {?>ISSN <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getData('printIssn') ));
}?>
							<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getData('printIssn') && $_smarty_tpl->tpl_vars['currentContext']->value->getData('onlineIssn')) {?> &nbsp;|&nbsp; <?php }?>
							<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getData('onlineIssn')) {?>e-ISSN <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getData('onlineIssn') ));
}?>
						</p>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['pardalisLead']->value) {?>
						<p class="pardalis_hero_lead"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pardalisLead']->value ));?>
</p>
					<?php }?>
					<div class="pardalis_hero_actions">
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"submission"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"author.submit"),$_smarty_tpl ) );?>
</a>
						<?php if ($_smarty_tpl->tpl_vars['issue']->value) {?>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"issue",'op'=>"current"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_outline"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"journal.currentIssue"),$_smarty_tpl ) );?>
</a>
						<?php } else { ?>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"issue",'op'=>"archive"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_outline"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"journal.viewAllIssues"),$_smarty_tpl ) );?>
</a>
						<?php }?>
					</div>
				</div>

				<div class="pardalis_hero_visual">
					<?php if ($_smarty_tpl->tpl_vars['issue']->value && $_smarty_tpl->tpl_vars['issue']->value->getLocalizedCoverImageUrl()) {?>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"issue",'op'=>"current"),$_smarty_tpl ) );?>
" class="pardalis_cover">
							<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['issue']->value->getLocalizedCoverImageUrl() ));?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['issue']->value->getIssueIdentification() ?: '') ));?>
">
						</a>
					<?php } else { ?>
						<div class="pardalis_cover pardalis_cover_placeholder" aria-hidden="true">
							<span class="fa fa-flask"></span>
							<strong><?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedAcronym()) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedAcronym() ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedName() ));
}?></strong>
							<?php if ($_smarty_tpl->tpl_vars['issue']->value) {?><small><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['issue']->value->getIssueIdentification() ?: '') ));?>
</small><?php }?>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>

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
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"submission"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_soft">Enviar</a>
				</article>
				<article class="pardalis_card">
					<span class="pardalis_card_icon fa fa-file-text-o" aria-hidden="true"></span>
					<h3>Directrices para autores</h3>
					<p>Consulte los requisitos de formato y las normas de presentación antes de enviar.</p>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"about",'op'=>"submissions"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_soft"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.readMore"),$_smarty_tpl ) );?>
</a>
				</article>
				<article class="pardalis_card">
					<span class="pardalis_card_icon fa fa-balance-scale" aria-hidden="true"></span>
					<h3>Políticas editoriales</h3>
					<p>Conozca el proceso de revisión, la ética de la publicación y las políticas de la revista.</p>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"about",'op'=>"editorialPolicies"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_soft"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.readMore"),$_smarty_tpl ) );?>
</a>
				</article>
				<article class="pardalis_card">
					<span class="pardalis_card_icon fa fa-archive" aria-hidden="true"></span>
					<h3>Archivo de números</h3>
					<p>Explore todos los números publicados y consulte los artículos en texto completo.</p>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"issue",'op'=>"archive"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_soft"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.readMore"),$_smarty_tpl ) );?>
</a>
				</article>
			</div>
		</div>
	</section>

		<section class="pardalis_section">
		<div class="pardalis_container pardalis_about">
			<div class="pardalis_about_visual" aria-hidden="true">
				<div class="pardalis_about_art">
					<span class="fa fa-book"></span>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['pardalisStats']->value) {?>
					<div class="pardalis_badge">
						<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pardalisStats']->value['articles'] ));?>
</strong>
						<span>artículos<br>publicados</span>
					</div>
				<?php }?>
			</div>
			<div class="pardalis_about_text">
				<span class="pardalis_label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"about.aboutContext"),$_smarty_tpl ) );?>
</span>
				<h2 class="pardalis_section_title pardalis_left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedName() ));?>
</h2>
				<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedData('description')) {?>
					<div class="pardalis_about_desc"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_unsafe_html' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedData('description') ));?>
</div>
				<?php }?>
				<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['pardalisSections']->value)) {?>
					<ul class="pardalis_chips">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pardalisSections']->value, 'sectionTitle');
$_smarty_tpl->tpl_vars['sectionTitle']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sectionTitle']->value) {
$_smarty_tpl->tpl_vars['sectionTitle']->do_else = false;
?>
							<li><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sectionTitle']->value ));?>
</li>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</ul>
				<?php }?>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"about"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"about.aboutContext"),$_smarty_tpl ) );?>
</a>
			</div>
		</div>
	</section>

		<?php if ($_smarty_tpl->tpl_vars['pardalisStats']->value && ($_smarty_tpl->tpl_vars['pardalisStats']->value['articles'] || $_smarty_tpl->tpl_vars['pardalisStats']->value['issues'] || $_smarty_tpl->tpl_vars['pardalisStats']->value['sections'])) {?>
		<section class="pardalis_stats">
			<div class="pardalis_container pardalis_stats_inner">
				<div class="pardalis_stat">
					<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pardalisStats']->value['articles'] ));?>
</strong>
					<span>Artículos publicados</span>
					<i></i>
				</div>
				<div class="pardalis_stat">
					<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pardalisStats']->value['issues'] ));?>
</strong>
					<span>Números publicados</span>
					<i></i>
				</div>
				<div class="pardalis_stat">
					<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['pardalisStats']->value['sections'] ));?>
</strong>
					<span>Secciones de la revista</span>
					<i></i>
				</div>
			</div>
		</section>
	<?php }?>

		<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['pardalisRecent']->value)) {?>
		<section class="pardalis_section pardalis_section_mint">
			<div class="pardalis_container">
				<div class="pardalis_section_head">
					<span class="pardalis_label">Últimas publicaciones</span>
					<h2 class="pardalis_section_title">Artículos recientes</h2>
				</div>
				<div class="pardalis_articles">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pardalisRecent']->value, 'art');
$_smarty_tpl->tpl_vars['art']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->do_else = false;
?>
						<article class="pardalis_article">
							<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['url'] ));?>
" class="pardalis_article_img<?php if (!$_smarty_tpl->tpl_vars['art']->value['cover']) {?> pardalis_article_img_empty<?php }?>"<?php if ($_smarty_tpl->tpl_vars['art']->value['cover']) {?> style="background-image: url('<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['cover'] ));?>
');"<?php }?> tabindex="-1" aria-hidden="true">
								<?php if (!$_smarty_tpl->tpl_vars['art']->value['cover']) {?><span class="fa fa-file-text-o"></span><?php }?>
								<?php if ($_smarty_tpl->tpl_vars['art']->value['day']) {?>
									<span class="pardalis_date"><b><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['day'] ));?>
</b><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['month'] ));?>
</span>
								<?php }?>
							</a>
							<div class="pardalis_article_body">
								<?php if ($_smarty_tpl->tpl_vars['art']->value['section']) {?><span class="pardalis_tag"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['section'] ));?>
</span><?php }?>
								<h3><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['url'] ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_unsafe_html' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['title'] ));?>
</a></h3>
								<?php if ($_smarty_tpl->tpl_vars['art']->value['authors']) {?><p class="pardalis_article_authors"><span class="fa fa-user-o" aria-hidden="true"></span> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['authors'] ));?>
</p><?php }?>
								<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['art']->value['url'] ));?>
" class="pardalis_btn pardalis_btn_soft pardalis_btn_sm"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.readMore"),$_smarty_tpl ) );?>
</a>
							</div>
						</article>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		</section>
	<?php }?>

		<div class="pardalis_container pardalis_native">

				<?php if ($_smarty_tpl->tpl_vars['numAnnouncementsHomepage']->value && smarty_modifier_count($_smarty_tpl->tpl_vars['announcements']->value)) {?>
			<section class="cmp_announcements highlight_first">
				<a id="homepageAnnouncements"></a>
				<h2>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"announcement.announcements"),$_smarty_tpl ) );?>

				</h2>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['announcements']->value, 'announcement', false, NULL, 'announcements', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['announcement']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['announcement']->value) {
$_smarty_tpl->tpl_vars['announcement']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration']++;
?>
					<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration'] : null) > $_smarty_tpl->tpl_vars['numAnnouncementsHomepage']->value) {?>
						<?php break 1;?>
					<?php }?>
					<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration'] : null) == 1) {?>
						<?php $_smarty_tpl->_subTemplateRender("app:frontend/objects/announcement_summary.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('heading'=>"h3"), 0, true);
?>
						<div class="more">
					<?php } else { ?>
						<article class="obj_announcement_summary">
							<h4>
								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>(defined('ROUTE_PAGE') ? constant('ROUTE_PAGE') : null),'page'=>"announcement",'op'=>"view",'path'=>$_smarty_tpl->tpl_vars['announcement']->value->getId()),$_smarty_tpl ) );?>
">
									<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['announcement']->value->getLocalizedTitle() ));?>

								</a>
							</h4>
							<div class="date">
								<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['announcement']->value->getDatePosted(),$_smarty_tpl->tpl_vars['dateFormatShort']->value);?>

							</div>
						</article>
					<?php }?>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div><!-- .more -->
			</section>
		<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['issue']->value) {?>
			<section class="current_issue">
				<a id="homepageIssue"></a>
				<h2>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"journal.currentIssue"),$_smarty_tpl ) );?>

				</h2>
				<div class="current_issue_title">
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_unsafe_html' ][ 0 ], array( $_smarty_tpl->tpl_vars['issue']->value->getIssueIdentification() ));?>

				</div>
				<?php $_smarty_tpl->_subTemplateRender("app:frontend/objects/issue_toc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('heading'=>"h3"), 0, false);
?>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>(defined('ROUTE_PAGE') ? constant('ROUTE_PAGE') : null),'page'=>"issue",'op'=>"archive"),$_smarty_tpl ) );?>
" class="read_more">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"journal.viewAllIssues"),$_smarty_tpl ) );?>

				</a>
			</section>
		<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['additionalHomeContent']->value) {?>
			<div class="additional_content">
				<?php echo $_smarty_tpl->tpl_vars['additionalHomeContent']->value;?>

			</div>
		<?php }?>
	</div>

		<section class="pardalis_cta">
		<div class="pardalis_container pardalis_cta_inner">
			<div>
				<h2>¿Tiene una investigación lista para publicar?</h2>
				<p>Envíe su manuscrito a <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedName() ));?>
 o escríbanos si tiene dudas sobre el proceso.</p>
			</div>
			<div class="pardalis_cta_actions">
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"submission"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_white"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"author.submit"),$_smarty_tpl ) );?>
</a>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"about",'op'=>"contact"),$_smarty_tpl ) );?>
" class="pardalis_btn pardalis_btn_ghost"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"about.contact"),$_smarty_tpl ) );?>
</a>
			</div>
		</div>
	</section>

</div><!-- .page_index_journal -->

<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
