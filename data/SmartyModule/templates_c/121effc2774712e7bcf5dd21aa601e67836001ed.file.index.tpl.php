<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-29 22:55:49
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/user/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:921752185294e2ea335e38-49804260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '121effc2774712e7bcf5dd21aa601e67836001ed' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/user/index.tpl',
      1 => 1385787347,
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
    'users' => 0,
    'user' => 0,
    'pages' => 0,
    'baseUrl' => 0,
    'currentPage' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294e2ea336c33_33062310')) {function content_5294e2ea336c33_33062310($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/isdarka/WWW/BaseProject/vendor/smarty/smarty/distribution/libs/plugins/function.url.php';
?><fieldset>
	<legend><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Users");?>
</legend>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover">
  		<thead>
  			<tr class="well">
  				<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("ID");?>
</th>
  				<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Username");?>
</th>
  				<th><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Status");?>
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
  				<tr>
  					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getIdUser();?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getStatusString();?>
</td>
  					<td>
						<div class="btn-group">
						
		  					<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'update','idUser'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Edit');?>
"><span class="fa fa-pencil"></span></a>
		  					<?php if ($_smarty_tpl->tpl_vars['user']->value->isEnabled()) {?>
		  						<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'disable','id'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Disable');?>
"><span class="fa fa-times-circle-o"></span></a>
		  					<?php } elseif ($_smarty_tpl->tpl_vars['user']->value->isDisabled()) {?>
		  						<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'enable','id'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
" class="btn btn-default" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate('Enable');?>
"><span class="fa fa-check-circle-o"></span></a>
		  					<?php }?>
		  					<a href="<?php echo smarty_function_url(array('module'=>'core','controller'=>'user','action'=>'history','id'=>$_smarty_tpl->tpl_vars['user']->value->getIdUser()),$_smarty_tpl);?>
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
<?php if ($_smarty_tpl->tpl_vars['pages']->value>1) {?>
<ul class="pagination">
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/index/page/1">&laquo;</a></li>
	<?php $_smarty_tpl->tpl_vars["many"] = new Smarty_variable(false, null, 0);?>
	<?php if ($_smarty_tpl->tpl_vars['currentPage']->value>=2) {?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/index/page/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
</a></li>
	<?php }?>
		<li class="active "><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/index/page/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
</a></li>
	<?php if ($_smarty_tpl->tpl_vars['currentPage']->value<$_smarty_tpl->tpl_vars['pages']->value) {?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/index/page/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
</a></li>
	<?php }?>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/user/index/page/<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
">&raquo;</a></li>
  	<li><a href="#">Pages: <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</a></li>
  	<li><a href="#">Records: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</a></li>
</ul>
<?php }?>
<?php }} ?>