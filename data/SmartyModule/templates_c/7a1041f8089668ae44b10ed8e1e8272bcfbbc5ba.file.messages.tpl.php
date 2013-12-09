<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-26 11:48:06
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/layout/messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47343902152940dec93db57-94524855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a1041f8089668ae44b10ed8e1e8272bcfbbc5ba' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/layout/messages.tpl',
      1 => 1385488085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47343902152940dec93db57-94524855',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52940dec93ed45_18056705',
  'variables' => 
  array (
    'flashMessenger' => 0,
    'i18n' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52940dec93ed45_18056705')) {function content_52940dec93ed45_18056705($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['flashMessenger']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['flashMessenger']->value->hasCurrentSuccessMessages()) {?>
		<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['flashMessenger']->value->getSuccessMessages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
			<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Success");?>
!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
.
			</div>
		<?php } ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['flashMessenger']->value->hasCurrentInfoMessages()) {?>
		<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['flashMessenger']->value->getInfoMessages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
			<div class="alert alert-info alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Info");?>
!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
.
			</div>
		<?php } ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['flashMessenger']->value->hasCurrentMessages()) {?>
		<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['flashMessenger']->value->getMessages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
			<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Warning");?>
!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
.
			</div>
		<?php } ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['flashMessenger']->value->hasCurrentErrorMessages()) {?>
		<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['flashMessenger']->value->getErrorMessages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
			<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Error");?>
!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
.
			</div>
		<?php } ?>
	<?php }?>
<?php }?>
<?php }} ?>
