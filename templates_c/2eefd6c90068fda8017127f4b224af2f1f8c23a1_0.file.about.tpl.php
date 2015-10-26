<?php /* Smarty version 3.1.24, created on 2015-09-12 17:16:04
         compiled from "templates/about.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3005955f441b49ca510_21411218%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2eefd6c90068fda8017127f4b224af2f1f8c23a1' => 
    array (
      0 => 'templates/about.tpl',
      1 => 1442064817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3005955f441b49ca510_21411218',
  'variables' => 
  array (
    'AboutUs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f441b4a18715_70518939',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f441b4a18715_70518939')) {
function content_55f441b4a18715_70518939 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3005955f441b49ca510_21411218';
?>
    <div class="content">
      <div class="about">
        <?php echo $_smarty_tpl->tpl_vars['AboutUs']->value;?>

      </div>
    </div>
<?php }
}
?>