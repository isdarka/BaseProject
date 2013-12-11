<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-11 10:24:25
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/user/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:921752185294e2ea335e38-49804260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '121effc2774712e7bcf5dd21aa601e67836001ed' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/user/index.tpl',
      1 => 1386779063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '921752185294e2ea335e38-49804260',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5294e2ea336c33_33062310',
  'variables' => 
  array (
    'i18n' => 0,
    'baseUrl' => 0,
    'queryParams' => 0,
    'users' => 0,
    'user' => 0,
    'roles' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294e2ea336c33_33062310')) {function content_5294e2ea336c33_33062310($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_isAllowed')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/modifier.isAllowed.php';
if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("User");?>
 
		<?php if (smarty_modifier_isAllowed("core\controller\user::create")) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/create" class="btn btn-success pull-right"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("New User");?>
</a>
		<?php }?>
	</legend>
	<div class="table-responsive">
	<form action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/index" method="get">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><input type="text" class="form-control" name="id_user" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('ID_USER');?>
" value="<?php echo $_smarty_tpl->tpl_vars['queryParams']->value['id_user'];?>
"></th>
					<th><input type="text" class="form-control" name="status" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('STATUS');?>
" value="<?php echo $_smarty_tpl->tpl_vars['queryParams']->value['status'];?>
"></th>
					<th><input type="text" class="form-control" name="id_role" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('ID_ROLE');?>
" value="<?php echo $_smarty_tpl->tpl_vars['queryParams']->value['id_role'];?>
"></th>
					<th><input type="text" class="form-control" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('USERNAME');?>
" value="<?php echo $_smarty_tpl->tpl_vars['queryParams']->value['username'];?>
"></th>
					<th class="col-xs-2"><button type="submit" class="form-control btn btn-primary "><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Filter");?>
</button></th>
				</tr>
				<tr class="well">
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdUser");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Status");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("IdRole");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Username");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Actions");?>
</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars["role"] = new Smarty_variable($_smarty_tpl->tpl_vars['roles']->value->getByPK($_smarty_tpl->tpl_vars['user']->value->getIdRole()), null, 0);?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getStatusString();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['role']->value->getName();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</td>
					<td>
						<div class="btn-group">
						<?php if (smarty_modifier_isAllowed("core\controller\user::update")) {?>
							<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'update','id'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Edit');?>
"><span class="fa fa-pencil"></span></a>
						<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['user']->value->isEnabled()) {?>
								<?php if (smarty_modifier_isAllowed("core\controller\user::disable")) {?>
									<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'disable','id'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Disable');?>
"><span class="fa fa-times-circle-o"></span></a>
								<?php }?>
							<?php } elseif ($_smarty_tpl->tpl_vars['user']->value->isDisabled()) {?>
								<?php if (smarty_modifier_isAllowed("core\controller\user::enable")) {?>
									<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'enable','id'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Enable');?>
"><span class="fa fa-check-circle-o"></span></a>
								<?php }?>
							<?php }?>
						<?php if (smarty_modifier_isAllowed("core\controller\user::history")) {?>
							<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'history','id'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
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
