<?php /* Smarty version Smarty-3.1-DEV, created on 2014-01-23 17:43:50
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/user/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6060090895294f7eb3353f2-44246521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efb2318d6c0c3d6c9815a66d23e4a137a39c47df' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/user/form.tpl',
      1 => 1387905414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6060090895294f7eb3353f2-44246521',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5294f7eb336310_05015178',
  'variables' => 
  array (
    'baseUrl' => 0,
    'user' => 0,
    'i18n' => 0,
    'roleCollection' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294f7eb336310_05015178')) {function content_5294f7eb336310_05015178($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.html_options.php';
if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend></legend>
	<form class="form-horizontal validate" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/save">
		<input type="hidden" name="idUser" id="idUser" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
">
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Role");?>
</label>
		  		<div class="col-sm-10">
		  			<?php echo smarty_function_html_options(array('options'=>array(((string)$_smarty_tpl->tpl_vars['i18n']->value->translate("Select a option")))+$_smarty_tpl->tpl_vars['roleCollection']->value->toCombo(),'name'=>"id_role",'id'=>"idRole",'class'=>"form-control",'selected'=>$_smarty_tpl->tpl_vars['user']->value->getIdRole()),$_smarty_tpl);?>

		    		
		  		</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Username");?>
</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control name" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Password");?>
</label>
		  		<div class="col-sm-10">
		    		<input type="password" class="form-control" id="password" name="password" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getPassword();?>
" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Name");?>
</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="lastName" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Last Name");?>
</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getLastName();?>
" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="secondLastName" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Second Last Name");?>
</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control" id="secondLastName" name="second_last_name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getSecondLastName();?>
" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="birthdate" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Birthdate");?>
</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control datepicker" id="birthdate" name="birthdate" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getBirthdate();?>
" required>
		  		</div>
		</div>
		<div class="form-group">
		  <div class="col-sm-offset-2 col-sm-10">
		    <a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'index'),$_smarty_tpl);?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Cancel");?>
</a>
		    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Save");?>
</button>
		  </div>
		</div>
	</form>
	
</fieldset><?php }} ?>
