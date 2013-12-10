<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-09 14:10:23
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/menu-item/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179581884052a5471c5da699-67599309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '337f1765ab04d2d35e4793aaf39cdf2199cf116b' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/menu-item/form.tpl',
      1 => 1386619781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179581884052a5471c5da699-67599309',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a5471c6820a4_92690053',
  'variables' => 
  array (
    'i18n' => 0,
    'baseUrl' => 0,
    'menuItem' => 0,
    'comboControllersActions' => 0,
    'menuParents' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a5471c6820a4_92690053')) {function content_52a5471c6820a4_92690053($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.html_options.php';
if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("MenuItem");?>
</legend>
	<form class="form-horizontal validate" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/menuitem/save">
		<input type="hidden" name="idMenuItem" id="idmenuitem" value="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getIdMenuItem();?>
">
		<div class="form-group">
			<label for="idAction" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdAction");?>
</label>
			<div class="col-sm-10">
				<?php echo smarty_function_html_options(array('options'=>array(((string)$_smarty_tpl->tpl_vars['i18n']->value->translate("Select a option")))+$_smarty_tpl->tpl_vars['comboControllersActions']->value,'name'=>"id_action",'id'=>"idAction",'class'=>"form-control",'selected'=>((string)$_smarty_tpl->tpl_vars['menuItem']->value->getIdAction())),$_smarty_tpl);?>

			</div>
		</div>
		<div class="form-group">
			<label for="idParent" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdParent");?>
</label>
			<div class="col-sm-10">
				<?php echo smarty_function_html_options(array('options'=>array(((string)$_smarty_tpl->tpl_vars['i18n']->value->translate("Select a option")))+$_smarty_tpl->tpl_vars['menuParents']->value->toCombo(),'name'=>"id_parent",'id'=>"idParent",'class'=>"form-control",'selected'=>((string)$_smarty_tpl->tpl_vars['menuItem']->value->getIdParent())),$_smarty_tpl);?>

			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Name");?>
<?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getIdParent();?>
</label>
			<div class="col-sm-10">
				<input type="text" class="form-control required" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getName();?>
">
			</div>
		</div>
		<div class="form-group">
			<label for="order" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Order");?>
</label>
			<div class="col-sm-10">
				<input type="text" class="form-control required int " id="order" name="order" value="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getOrder();?>
" >
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'menuitem','action'=>'index'),$_smarty_tpl);?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Cancel");?>
</a>
			<button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Save");?>
</button>
			</div>
		</div>
	</form>
</fieldset>
<?php }} ?>
