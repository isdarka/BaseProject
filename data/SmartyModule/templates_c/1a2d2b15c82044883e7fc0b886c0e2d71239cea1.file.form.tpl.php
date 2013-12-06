<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-04 19:01:13
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/role/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:450038651529fcf71b85da1-10873254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a2d2b15c82044883e7fc0b886c0e2d71239cea1' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/role/form.tpl',
      1 => 1386205271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '450038651529fcf71b85da1-10873254',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_529fcf71c4e7d4_59941032',
  'variables' => 
  array (
    'baseUrl' => 0,
    'role' => 0,
    'i18n' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529fcf71c4e7d4_59941032')) {function content_529fcf71c4e7d4_59941032($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend></legend>
	<form class="form-horizontal validate" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/role/save">
		<input type="hidden" name="idRole" id="idRole" value="<?php echo $_smarty_tpl->tpl_vars['role']->value->getIdRole();?>
">
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Name");?>
</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control name" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['role']->value->getName();?>
" required>
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
	
</fieldset><?php }} ?>
