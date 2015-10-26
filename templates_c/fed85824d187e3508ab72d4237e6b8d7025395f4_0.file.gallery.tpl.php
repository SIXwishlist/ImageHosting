<?php /* Smarty version 3.1.24, created on 2015-09-12 17:16:03
         compiled from "templates/gallery.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1298655f441b3a5ebd5_61426800%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fed85824d187e3508ab72d4237e6b8d7025395f4' => 
    array (
      0 => 'templates/gallery.tpl',
      1 => 1442069143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1298655f441b3a5ebd5_61426800',
  'variables' => 
  array (
    'CountImages' => 0,
    'Images' => 0,
    'Host' => 0,
    'Query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f441b3afafd5_25461120',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f441b3afafd5_25461120')) {
function content_55f441b3afafd5_25461120 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1298655f441b3a5ebd5_61426800';
?>
    <div class="content">
      <div class="gallery">
        <?php if ($_smarty_tpl->tpl_vars['CountImages']->value > "0") {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['Images']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['Query'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['Query']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['Query']->value) {
$_smarty_tpl->tpl_vars['Query']->_loop = true;
$foreach_Query_Sav = $_smarty_tpl->tpl_vars['Query'];
?>
        <div class="col-md-3 col-sm-4 col-xs-6 thumb">
          <a class="thumbnail" href="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['Query']->value['ShortURL'];?>
" target="_blank">
            <img class="img-responsive" src="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['Query']->value['ImageURL'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['Query']->value['ImageName'];?>
">
          </a>
        </div>
        <?php
$_smarty_tpl->tpl_vars['Query'] = $foreach_Query_Sav;
}
?>
        <?php }?>
        <div class="clearfix"></div>
      </div>
    </div>
<?php }
}
?>