<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-09 11:37:19
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/role/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52093713352a4fd6d042e26-01651182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a2d2b15c82044883e7fc0b886c0e2d71239cea1' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/role/form.tpl',
      1 => 1386600460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52093713352a4fd6d042e26-01651182',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a4fd6d0a0660_07617438',
  'variables' => 
  array (
    'i18n' => 0,
    'baseUrl' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a4fd6d0a0660_07617438')) {function content_52a4fd6d0a0660_07617438($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Role");?>
</legend>
	<form class="form-horizontal validate" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/role/save">
		<input type="hidden" name="idRole" id="idrole" value="<?php echo $_smarty_tpl->tpl_vars['role']->value->getIdRole();?>
">
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Name");?>
</label>
			<div class="col-sm-10">
				<input type="text" class="form-control required" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['role']->value->getName();?>
">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'role','action'=>'index'),$_smarty_tpl);?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Cancel");?>
</a>
			<button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Save");?>
</button>
			</div>
		</div>
	</form>
</fieldset>
<?php }} ?>
