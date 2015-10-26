<?php /* Smarty version 3.1.24, created on 2015-09-12 17:16:02
         compiled from "templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2659755f441b29263c8_77327030%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58ed512f23a3f125013b22b37825be0fcc569b88' => 
    array (
      0 => 'templates/footer.tpl',
      1 => 1442063925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2659755f441b29263c8_77327030',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f441b29263c4_92940141',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f441b29263c4_92940141')) {
function content_55f441b29263c4_92940141 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2659755f441b29263c8_77327030';
?>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="templates/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    $("#ImageUpload").on("change", function() {
      $("#ImageUploadName").attr( "value", $(this).val());
    });
    <?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
?>