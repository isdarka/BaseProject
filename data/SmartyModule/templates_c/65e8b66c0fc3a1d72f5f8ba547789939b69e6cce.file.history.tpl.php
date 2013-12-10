<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-09 13:11:46
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/menu-item/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118426121152a615f2f15551-33055288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65e8b66c0fc3a1d72f5f8ba547789939b69e6cce' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/menu-item/history.tpl',
      1 => 1386600460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118426121152a615f2f15551-33055288',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'i18n' => 0,
    'menuItemLogs' => 0,
    'menuItemLog' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a615f30754f9_06900656',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a615f30754f9_06900656')) {function content_52a615f30754f9_06900656($_smarty_tpl) {?><fieldset>
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
				<?php  $_smarty_tpl->tpl_vars['menuItemLog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menuItemLog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuItemLogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menuItemLog']->key => $_smarty_tpl->tpl_vars['menuItemLog']->value) {
$_smarty_tpl->tpl_vars['menuItemLog']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars["user"] = new Smarty_variable($_smarty_tpl->tpl_vars['users']->value->getByPK($_smarty_tpl->tpl_vars['menuItemLog']->value->getIdUser()), null, 0);?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFullName();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['menuItemLog']->value->getEventString();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['menuItemLog']->value->getTimestamp();?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['menuItemLog']->value->getNote();?>
</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</fieldset>
<?php }} ?>
