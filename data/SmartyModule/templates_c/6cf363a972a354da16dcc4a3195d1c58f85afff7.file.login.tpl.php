<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-08 21:08:25
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/core/auth/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133142299652a52bf79dd7b6-21338018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cf363a972a354da16dcc4a3195d1c58f85afff7' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/core/auth/login.tpl',
      1 => 1386558500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133142299652a52bf79dd7b6-21338018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a52bf79eafb5_37667160',
  'variables' => 
  array (
    'baseUrl' => 0,
    'i18n' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a52bf79eafb5_37667160')) {function content_52a52bf79eafb5_37667160($_smarty_tpl) {?><div class="container">
	<form class="form-signin validates" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/core/auth/auth" role="form">
    	<h2 class="form-signin-heading"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Login");?>
</h2>
        <input type="text" name="username" class="form-control required" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Username");?>
"  autofocus>
        <input type="password" name="password" class="form-control required" placeholder="<?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Password");?>
">
        <label class="checkbox">
          <input type="checkbox" name="rememberMe" value="1"> <?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Remember me");?>

        </label>        
        <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $_smarty_tpl->tpl_vars['i18n']->value->translate("Sign in");?>
</button>
        
      </form>

    </div><?php }} ?>
