<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-10 17:03:22
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/role/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193785396752a68e1bd21aa0-33445181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b1e4bc5b3ad0bff0ada02d2268fafbb933c1411' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/role/index.tpl',
      1 => 1386716569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193785396752a68e1bd21aa0-33445181',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a68e1be203c8_37281621',
  'variables' => 
  array (
    'i18n' => 0,
    'baseUrl' => 0,
    'queryParams' => 0,
    'roles' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a68e1be203c8_37281621')) {function content_52a68e1be203c8_37281621($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_isAllowed')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/modifier.isAllowed.php';
if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Role");?>
 
		<?php if (smarty_modifier_isAllowed("Core\Controller\Role::create")) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/role/create" class="btn btn-success pull-right"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("New Role");?>
</a>
		<?php }?>
	</legend>
	<div class="table-responsive">
	<form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/role/index" method="get">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><input type="text" class="form-control" name="id_role" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('ID_ROLE');?>
" value="<?php echo $_smarty_tpl->tpl_vars['queryParams']->value['id_role'];?>
"></th>
					<th><input type="text" class="form-control" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('NAME');?>
" value="<?php echo $_smarty_tpl->tpl_vars['queryParams']->value['name'];?>
"></th>
					<th><input type="text" class="form-control" name="status" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('STATUS');?>
" value="<?php echo $_smarty_tpl->tpl_vars['queryParams']->value['status'];?>
"></th>
					<th class="col-xs-2"><button type="submit" class="form-control btn btn-primary "><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Filter");?>
</button></th>
				</tr>
				<tr class="well">
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdRole");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Name");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Status");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Actions");?>
</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['role']->value->getIdRole();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['role']->value->getName();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['role']->value->getStatusString();?>
</td>
					<td>
						<div class="btn-group">
						<?php if (smarty_modifier_isAllowed("Core\Controller\Role::update")) {?>
							<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'role','action'=>'update','id'=>$_smarty_tpl->tpl_vars['role']->value->getIdRole()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Edit');?>
"><span class="fa fa-pencil"></span></a>
						<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['role']->value->isEnabled()) {?>
								<?php if (smarty_modifier_isAllowed("Core\Controller\Role::disable")) {?>
									<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'role','action'=>'disable','id'=>$_smarty_tpl->tpl_vars['role']->value->getIdRole()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Disable');?>
"><span class="fa fa-times-circle-o"></span></a>
								<?php }?>
							<?php } elseif ($_smarty_tpl->tpl_vars['role']->value->isDisabled()) {?>
								<?php if (smarty_modifier_isAllowed("Core\Controller\Role::enable")) {?>
									<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'role','action'=>'enable','id'=>$_smarty_tpl->tpl_vars['role']->value->getIdRole()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Enable');?>
"><span class="fa fa-check-circle-o"></span></a>
								<?php }?>
							<?php }?>
						<?php if (smarty_modifier_isAllowed("Core\Controller\Role::history")) {?>
							<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'role','action'=>'history','id'=>$_smarty_tpl->tpl_vars['role']->value->getIdRole()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('History');?>
"><span class="fa fa-book"></span></a>
						<?php }?>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</form>
	</div>
</fieldset>
<?php }} ?>
