<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-08 22:28:14
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/menu-item/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5579900052a546dee30652-81344531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab35ad9e192c10a39426b4eb45f8e4cbb5f716df' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/menu-item/index.tpl',
      1 => 1386563190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5579900052a546dee30652-81344531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'i18n' => 0,
    'menuItems' => 0,
    'menuItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a546df010887_89228587',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a546df010887_89228587')) {function content_52a546df010887_89228587($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("MenuItem");?>
</legend>
	<div class="table-responsive">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdMenuItem");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdAction");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdParent");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Name");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Order");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Status");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Actions");?>
</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['menuItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menuItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->key => $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getIdMenuItem();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getIdAction();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getIdParent();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getName();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getOrder();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['menuItem']->value->getStatusString();?>
</td>
					<td>
						<div class="btn-group">
						<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'menuitem','action'=>'update','id'=>$_smarty_tpl->tpl_vars['menuItem']->value->getIdMenuItem()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Edit');?>
"><span class="fa fa-pencil"></span></a>
							<?php if ($_smarty_tpl->tpl_vars['menuItem']->value->isEnabled()) {?>
								<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'menuitem','action'=>'disable','id'=>$_smarty_tpl->tpl_vars['menuItem']->value->getIdMenuItem()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Disable');?>
"><span class="fa fa-times-circle-o"></span></a>
							<?php } elseif ($_smarty_tpl->tpl_vars['menuItem']->value->isDisabled()) {?>
								<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'menuitem','action'=>'enable','id'=>$_smarty_tpl->tpl_vars['menuItem']->value->getIdMenuItem()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Enable');?>
"><span class="fa fa-check-circle-o"></span></a>
							<?php }?>
						<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'menuitem','action'=>'history','id'=>$_smarty_tpl->tpl_vars['menuItem']->value->getIdMenuItem()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('History');?>
"><span class="fa fa-book"></span></a>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</fieldset>
<?php }} ?>
