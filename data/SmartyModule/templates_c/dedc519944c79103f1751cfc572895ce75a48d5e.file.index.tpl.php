<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-26 17:28:22
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/error/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1415998770529404b73da619-51263738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dedc519944c79103f1751cfc572895ce75a48d5e' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/error/index.tpl',
      1 => 1385508500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1415998770529404b73da619-51263738',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_529404b73dbd38_72475393',
  'variables' => 
  array (
    'message' => 0,
    'exception' => 0,
    'traceStrings' => 0,
    'traceString' => 0,
    'trace' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529404b73dbd38_72475393')) {function content_529404b73dbd38_72475393($_smarty_tpl) {?><blockquote class="alert-danger">
  <p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
  <p><?php echo $_smarty_tpl->tpl_vars['exception']->value->getFile();?>
</p>
  <p><?php echo $_smarty_tpl->tpl_vars['exception']->value->getMessage();?>
</p>
	<?php $_smarty_tpl->tpl_vars["traceStrings"] = new Smarty_variable(explode("#",$_smarty_tpl->tpl_vars['exception']->value->getTraceAsString()), null, 0);?>
	<dl>
	<?php  $_smarty_tpl->tpl_vars['traceString'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['traceString']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['traceStrings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['traceString']->key => $_smarty_tpl->tpl_vars['traceString']->value) {
$_smarty_tpl->tpl_vars['traceString']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars["trace"] = new Smarty_variable(explode(":",$_smarty_tpl->tpl_vars['traceString']->value), null, 0);?>
		  <dt><?php echo $_smarty_tpl->tpl_vars['trace']->value[0];?>
</dt>
		  <dd><?php echo $_smarty_tpl->tpl_vars['trace']->value[1];?>
</dd>
	<?php } ?>
	</dl>
  <small>Error</small>  
</blockquote>
<?php $_smarty_tpl->tpl_vars["exception"] = new Smarty_variable($_smarty_tpl->tpl_vars['exception']->value->getPrevious(), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['exception']->value) {?>
	<blockquote class="alert-danger">
	  <p>Previous exceptions</p>
	  <p><?php echo $_smarty_tpl->tpl_vars['exception']->value->getFile();?>
</p>
	  <p><?php echo $_smarty_tpl->tpl_vars['exception']->value->getMessage();?>
</p>
		<?php $_smarty_tpl->tpl_vars["traceStrings"] = new Smarty_variable(explode("#",$_smarty_tpl->tpl_vars['exception']->value->getTraceAsString()), null, 0);?>
		<dl>
		<?php  $_smarty_tpl->tpl_vars['traceString'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['traceString']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['traceStrings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['traceString']->key => $_smarty_tpl->tpl_vars['traceString']->value) {
$_smarty_tpl->tpl_vars['traceString']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars["trace"] = new Smarty_variable(explode(":",$_smarty_tpl->tpl_vars['traceString']->value), null, 0);?>
			  <dt><?php echo $_smarty_tpl->tpl_vars['trace']->value[0];?>
</dt>
			  <dd><?php echo $_smarty_tpl->tpl_vars['trace']->value[1];?>
</dd>
		<?php } ?>
		</dl>
	  <small>Error</small>  
	</blockquote>
<?php }?><?php }} ?>
