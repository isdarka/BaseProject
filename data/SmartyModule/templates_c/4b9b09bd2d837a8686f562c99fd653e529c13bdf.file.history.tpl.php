<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-09 11:30:22
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/user/history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:662280335298fe11af15f2-62688410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b9b09bd2d837a8686f562c99fd653e529c13bdf' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/user/history.tpl',
      1 => 1386610221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '662280335298fe11af15f2-62688410',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5298fe11af2888_30198355',
  'variables' => 
  array (
    'i18n' => 0,
    'userLogs' => 0,
    'userLog' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5298fe11af2888_30198355')) {function content_5298fe11af2888_30198355($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("History");?>
</legend>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover">
  		<thead>
  			<tr class="well">
<!--   				<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("ID");?>
</th> -->
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
  			<?php  $_smarty_tpl->tpl_vars['userLog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['userLog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userLogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['userLog']->key => $_smarty_tpl->tpl_vars['userLog']->value) {
$_smarty_tpl->tpl_vars['userLog']->_loop = true;
?>
  				<?php $_smarty_tpl->tpl_vars["user"] = new Smarty_variable($_smarty_tpl->tpl_vars['users']->value->getByPK($_smarty_tpl->tpl_vars['userLog']->value->getIdUser()), null, 0);?>
  				<tr>
  					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFullName();?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['userLog']->value->getEventString();?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['userLog']->value->getTimestamp();?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['userLog']->value->getNote();?>
</td>
  				</tr>
  			<?php } ?>
  		</tbody>
	</table>
	</div>
	<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'index'),$_smarty_tpl);?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Go Back');?>
</a>
</fieldset>
<?php }} ?>
