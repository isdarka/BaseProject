<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-08 22:19:07
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/role/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134419775252a529927dc630-99788581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc039bf8456586f9537df23c2c485a254d84df9f' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/role/history.tpl',
      1 => 1386562739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134419775252a529927dc630-99788581',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a529928c70f3_19861727',
  'variables' => 
  array (
    'i18n' => 0,
    'roleLogs' => 0,
    'roleLog' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a529928c70f3_19861727')) {function content_52a529928c70f3_19861727($_smarty_tpl) {?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("History");?>
</legend>
	<div class="table-responsive">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Username");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Event");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Date");?>
</th>
					<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Note");?>
</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['roleLog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['roleLog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roleLogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['roleLog']->key => $_smarty_tpl->tpl_vars['roleLog']->value) {
$_smarty_tpl->tpl_vars['roleLog']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars["user"] = new Smarty_variable($_smarty_tpl->tpl_vars['users']->value->getByPK($_smarty_tpl->tpl_vars['roleLog']->value->getIdUser()), null, 0);?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFullName();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['roleLog']->value->getEventString();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['roleLog']->value->getTimestamp();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['roleLog']->value->getNote();?>
</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</fieldset>
<?php }} ?>
