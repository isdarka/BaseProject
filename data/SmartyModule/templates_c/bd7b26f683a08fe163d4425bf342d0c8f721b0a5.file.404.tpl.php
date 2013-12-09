<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-26 13:07:19
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/error/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4178641455294ce07c77191-79480042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd7b26f683a08fe163d4425bf342d0c8f721b0a5' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/error/404.tpl',
      1 => 1385492838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4178641455294ce07c77191-79480042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5294ce07c99816_37067621',
  'variables' => 
  array (
    'content' => 0,
    'baseUrl' => 0,
    'controller' => 0,
    'reason' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294ce07c99816_37067621')) {function content_5294ce07c99816_37067621($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
 <small><?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/<?php echo strtolower(str_replace("\\Controller\\","/",$_smarty_tpl->tpl_vars['controller']->value));?>
</small></h1>

<div class="alert alert-warning">
<?php if ($_smarty_tpl->tpl_vars['reason']->value=='error-controller-cannot-dispatch') {?>
	The requested controller was unable to dispatch the request.
<?php } elseif ($_smarty_tpl->tpl_vars['reason']->value=='error-controller-not-found') {?>
	The requested controller could not be mapped to an existing controller class.
<?php } elseif ($_smarty_tpl->tpl_vars['reason']->value=='error-controller-invalid') {?>
	The requested controller was not dispatchable.
<?php } elseif ($_smarty_tpl->tpl_vars['reason']->value=='error-router-no-match') {?>
	The requested URL could not be matched by routing.
<?php } else { ?>
	We cannot determine at this time why a 404 was generated.
<?php }?>
	<br />
	
</div>
<?php }} ?>
