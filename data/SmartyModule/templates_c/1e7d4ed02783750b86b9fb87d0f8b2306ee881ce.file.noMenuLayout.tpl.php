<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-09 08:48:12
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/layout/noMenuLayout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17688199552a52d16f0c561-34607813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e7d4ed02783750b86b9fb87d0f8b2306ee881ce' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/layout/noMenuLayout.tpl',
      1 => 1386600460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17688199552a52d16f0c561-34607813',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a52d1708eec7_93600846',
  'variables' => 
  array (
    'baseUrl' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a52d1708eec7_93600846')) {function content_52a52d1708eec7_93600846($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/css/bootstrap.css" rel="stylesheet">
<!--     <link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/css/bootstrap-theme.css" rel="stylesheet"> -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/css/font-awesome/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/css/style.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/css/login.css" rel="stylesheet">
    
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/jquery-2.0.3.js"></script>
    
        
<!--     jQuery UI -->
	<link href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/css/jquery.ui/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/jquery.ui/jquery-ui-1.10.3.custom.js"></script>
	
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/jquery.validate/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/jquery.validate/additional-methods.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/jquery.validate/class.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/jquery.validate/messages.js"></script>

  </head>

  <body>
  <div id="wrap">
<!--   navbar-fixed-top -->
<!--     <div class="navbar  navbar-inverse"> -->
 

    <div id="wrap" class="container">
		<?php echo $_smarty_tpl->getSubTemplate ("messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>


      <hr>

      

    </div><!--/.container-->
		</div><!--  /.wrap -->
	
  </body>
</html>

<?php }} ?>
