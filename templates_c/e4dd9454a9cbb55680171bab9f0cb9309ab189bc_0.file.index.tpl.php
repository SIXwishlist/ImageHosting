<?php /* Smarty version 3.1.24, created on 2015-09-12 17:16:02
         compiled from "templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2326055f441b2889fc1_68121499%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4dd9454a9cbb55680171bab9f0cb9309ab189bc' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1442070335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2326055f441b2889fc1_68121499',
  'variables' => 
  array (
    'SuccessMessages' => 0,
    'Message' => 0,
    'ErrorMessages' => 0,
    'Action' => 0,
    'UploadOK' => 0,
    'Host' => 0,
    'ImageInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f441b28ff2c8_51249846',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f441b28ff2c8_51249846')) {
function content_55f441b28ff2c8_51249846 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2326055f441b2889fc1_68121499';
?>
    <div class="content">
      <?php if (isset($_smarty_tpl->tpl_vars['SuccessMessages']->value)) {
$_from = $_smarty_tpl->tpl_vars['SuccessMessages']->value;
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
      <?php if (isset($_smarty_tpl->tpl_vars['ErrorMessages']->value)) {
$_from = $_smarty_tpl->tpl_vars['ErrorMessages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['Message'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['Message']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['Message']->value) {
$_smarty_tpl->tpl_vars['Message']->_loop = true;
$foreach_Message_Sav = $_smarty_tpl->tpl_vars['Message'];
?><div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['Message']->value;?>
</div><?php
$_smarty_tpl->tpl_vars['Message'] = $foreach_Message_Sav;
}
}?>
      <div class="upload">
        <div class="content">
          <form action="<?php echo $_smarty_tpl->tpl_vars['Action']->value;?>
" method="POST" enctype="multipart/form-data">
            <div class="file">
              <input type="text" id="ImageUploadName" readonly class="form-control" placeholder="No file selected">
              <span class="btn btn-info btn-file pull-right">
                Browse
                <input type="file" id="ImageUpload" name="ImageUpload">
              </span>
            </div><br/><br/>
            Private Upload: <input type="checkbox" checked name="PrivateUpload"><br/>
            <input type="submit" class="btn btn-success" value="UPLOAD">
          </form>
        </div>
      </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['UploadOK']->value == "1") {?>
    <div class="content">
      <div class="upload-links">
        <div class="col-xs-6">
         <a href="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['ShortURL'];?>
" class="thumbnail" target="_blank">
           <img src="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['URL'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['Name'];?>
" />
         </a>
       </div>
        <div class="links-input">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Short Link:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['ShortURL'];?>
" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Direct Link:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['URL'];?>
" aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Forum Code:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value='[URL="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['ShortURL'];?>
"][IMG]http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['URL'];?>
[/IMG][/URL]' aria-describedby="basic-addon1">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">HTML Code:</span>
            <input type="text" class="form-control" readonly onclick="javascript:this.focus();this.select();" value='<a href="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['ShortURL'];?>
"><img src="http://<?php echo $_smarty_tpl->tpl_vars['Host']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['URL'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['ImageInfo']->value['Name'];?>
"></a>' aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
    </div>
    <?php }

}
}
?>