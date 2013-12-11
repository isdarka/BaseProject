<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-10 17:11:04
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/core/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11585970529fa52b01ab17-84818477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e90cef47272a1b89177e24f624e72acf2860501c' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/core/config.tpl',
      1 => 1386717060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11585970529fa52b01ab17-84818477',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_529fa52b041f22_01132615',
  'variables' => 
  array (
    'baseUrl' => 0,
    'i18n' => 0,
    'modules' => 0,
    'module' => 0,
    'controllers' => 0,
    'roles' => 0,
    'controllersModule' => 0,
    'controller' => 0,
    'actions' => 0,
    'role' => 0,
    'controllerActions' => 0,
    'action' => 0,
    'actionRoles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529fa52b041f22_01132615')) {function content_529fa52b041f22_01132615($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/modules/core/config.js"></script>
<fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Config");?>

		<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/core/flush-privileges"  class="btn btn-warning" data-toggle="tooltip" title="Flush Privileges"><i class="fa fa-refresh fa-spin"></i></a>
	</legend>
	<div class="table-responsive">
	<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars["controllersModule"] = new Smarty_variable($_smarty_tpl->tpl_vars['controllers']->value->getByIdModule($_smarty_tpl->tpl_vars['module']->value->getIdModule()), null, 0);?>
		
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th colspan="<?php echo $_smarty_tpl->tpl_vars['roles']->value->count()+1;?>
" class="text-center"><?php echo $_smarty_tpl->tpl_vars['module']->value->getName();?>
</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['controller'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['controller']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controllersModule']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['controller']->key => $_smarty_tpl->tpl_vars['controller']->value) {
$_smarty_tpl->tpl_vars['controller']->_loop = true;
?>
				<?php $_smarty_tpl->tpl_vars["controllerActions"] = new Smarty_variable($_smarty_tpl->tpl_vars['actions']->value->getByIdController($_smarty_tpl->tpl_vars['controller']->value->getIdController()), null, 0);?>
				<tr class="well">
					<td><?php echo $_smarty_tpl->tpl_vars['controller']->value->getName();?>
</td>
					<?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
?>
						<td><?php echo $_smarty_tpl->tpl_vars['role']->value->getName();?>
</td>	
					<?php } ?>
				</tr>
				
					<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controllerActions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['action']->value->getName();?>
</td>
							<?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
?>
								<td><input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['actionRoles']->value[$_smarty_tpl->tpl_vars['action']->value->getIdAction()][$_smarty_tpl->tpl_vars['role']->value->getIdRole()]) {?> checked="checked" <?php }?> class="form-control" data-id-role="<?php echo $_smarty_tpl->tpl_vars['role']->value->getIdRole();?>
" data-id-action="<?php echo $_smarty_tpl->tpl_vars['action']->value->getIdAction();?>
"></td>	
							<?php } ?>
						<tr>	
					<?php } ?>	
				<?php } ?>
			</tbody>
		</table>
	<?php } ?>
	</div>
</fieldset><?php }} ?>
