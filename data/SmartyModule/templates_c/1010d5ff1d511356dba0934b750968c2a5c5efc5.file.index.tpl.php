<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-28 19:59:00
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/menu/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21380105265297f46e160ac1-51515927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1010d5ff1d511356dba0934b750968c2a5c5efc5' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/menu/index.tpl',
      1 => 1385690339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21380105265297f46e160ac1-51515927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5297f46e16daf5_27902302',
  'variables' => 
  array (
    'i18n' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5297f46e16daf5_27902302')) {function content_5297f46e16daf5_27902302($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Menu");?>
</legend>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover">
  		<thead>
  			<tr class="well">
  				<th class="text-center"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("ID");?>
</th>
  				<th class="text-center"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Menu");?>
</th>
  				<th class="text-center"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Status");?>
</th>
  				<th class="text-center"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Actions");?>
</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
  				<tr>
  					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getStatus();?>
</td>
  					<td>
						<div class="btn-group">
						
		  					<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'update','idUser'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Edit');?>
"><span class="fa fa-pencil"></span></a>
		  					<a href="#" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Enable');?>
"><span class="fa fa-check-circle-o"></span></a>
		  					<a href="#" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Disable');?>
"><span class="fa fa-times-circle-o"></span></a>
		  					<a href="#" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('History');?>
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
