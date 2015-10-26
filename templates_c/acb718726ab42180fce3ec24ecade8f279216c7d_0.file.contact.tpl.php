<?php /* Smarty version 3.1.24, created on 2015-09-12 17:16:05
         compiled from "templates/contact.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1863255f441b5732433_00890738%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acb718726ab42180fce3ec24ecade8f279216c7d' => 
    array (
      0 => 'templates/contact.tpl',
      1 => 1442065374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1863255f441b5732433_00890738',
  'variables' => 
  array (
    'Messages' => 0,
    'Message' => 0,
    'Action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f441b57ce839_82001042',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f441b57ce839_82001042')) {
function content_55f441b57ce839_82001042 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1863255f441b5732433_00890738';
?>
    <div class="content">
      <?php if (isset($_smarty_tpl->tpl_vars['Messages']->value)) {
$_from = $_smarty_tpl->tpl_vars['Messages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['Message'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['Message']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['Message']->value) {
$_smarty_tpl->tpl_vars['Message']->_loop = true;
$foreach_Message_Sav = $_smarty_tpl->tpl_vars['Message'];
?><div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['Message']->value;?>
</div><?php
$_smarty_tpl->tpl_vars['Message'] = $foreach_Message_Sav;
}
}?>
      <div class="contact">
        <form action="<?php echo $_smarty_tpl->tpl_vars['Action']->value;?>
" method="POST">
          <label>Message Title:</label>
          <input type="text" required class="form-control" name="MessageTitle">
          <label>E-Mail Address:</label>
          <input type="email" required class="form-control" name="EmailAddress">
          <label>Message:</label>
          <textarea class="form-control" required rows="5" name="MessageContent"></textarea>
          <input type="submit" class="btn btn-success pull-right" value="SUBMIT">
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
<?php }
}
?>