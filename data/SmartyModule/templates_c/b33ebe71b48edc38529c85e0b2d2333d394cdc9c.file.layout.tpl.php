<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-28 20:45:13
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/layout/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7213247965261754e57c357-07979625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b33ebe71b48edc38529c85e0b2d2333d394cdc9c' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/layout/layout.tpl',
      1 => 1385693112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7213247965261754e57c357-07979625',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5261754e57d335_15954630',
  'variables' => 
  array (
    'baseUrl' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5261754e57d335_15954630')) {function content_5261754e57d335_15954630($_smarty_tpl) {?><!DOCTYPE html>
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
 <div class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation">		
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div id="wrap" class="container">
		<?php echo $_smarty_tpl->getSubTemplate ("messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>


      <hr>

      

    </div><!--/.container-->
		</div><!--  /.wrap -->
<div id="footer">
      <div class="container">
        <p class="text-muted credit">BaseProject Israel Ruiz.</p>
      </div>
    </div>
  </body>
</html>

<?php }} ?>
