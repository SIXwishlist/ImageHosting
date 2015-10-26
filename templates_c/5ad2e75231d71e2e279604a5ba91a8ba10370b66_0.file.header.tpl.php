<?php /* Smarty version 3.1.24, created on 2015-09-12 17:16:02
         compiled from "templates/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2951955f441b27517b8_83237281%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ad2e75231d71e2e279604a5ba91a8ba10370b66' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1442064425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2951955f441b27517b8_83237281',
  'variables' => 
  array (
    'Description' => 0,
    'Keywords' => 0,
    'Title' => 0,
    'Page' => 0,
    'Active' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f441b283bdc3_10543526',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f441b283bdc3_10543526')) {
function content_55f441b283bdc3_10543526 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2951955f441b27517b8_83237281';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['Description']->value;?>
">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['Keywords']->value;?>
">
    <title><?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['Page']->value;?>
</title>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>
  <body>
    <div class="navbar">
      <ul>
        <li <?php if ($_smarty_tpl->tpl_vars['Active']->value == "Home") {?>class="active"<?php }?>><a href="index.php"><span>Home</span></a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['Active']->value == "Gallery") {?>class="active"<?php }?>><a href="gallery.php"><span>Gallery</span></a></li>
        <li <?php if ($_smarty_tpl->tpl_vars['Active']->value == "AboutUs") {?>class="active"<?php }?>><a href="about.php"><span>About Us</span></a></li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['Active']->value == "Contact") {?>active <?php }?>last"><a href="contact.php"><span>Contact</span></a></li>
      </ul>
    </div>
<?php }
}
?>