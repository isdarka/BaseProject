<?php /* Smarty version Smarty-3.1-DEV, created on 2014-01-30 14:54:59
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/layout/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170758490552a68e1be2cd36-01947536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b33ebe71b48edc38529c85e0b2d2333d394cdc9c' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/layout/layout.tpl',
      1 => 1391106482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170758490552a68e1be2cd36-01947536',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52a68e1be93695_05036376',
  'variables' => 
  array (
    'baseUrl' => 0,
    'systemMenu' => 0,
    'content' => 0,
    'messageUsers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a68e1be93695_05036376')) {function content_52a68e1be93695_05036376($_smarty_tpl) {?><!DOCTYPE html>
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
	
<!--     ZipCode -->
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/zipcode.js"></script>
	
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/bootstrap.js"></script>
    
    
    
<!--     MultiSelect -->
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/bootstrap/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/css/bootstrap/bootstrap-multiselect.css" type="text/css">
    
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
    
	<script type="text/javascript">
		var baseUrl = "<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
";
	</script>
	
<!-- 	BaseModel -->
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/model/bean/bean.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/model/collection/collection.js"></script>
	
<!-- 	Messages -->
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/Messages.js"></script>
	
	
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/model/bean/Message.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/model/bean/UserAvatar.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/model/collection/MessageCollection.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/js/model/collection/UserAvatarCollection.js"></script>
	
  </head>

  <body>
  
  <div id="wrap">
  
<!--   <div class="row row-offcanvas row-offcanvas-right"> -->

<!--         <div class="col-xs-12 col-sm-9"> -->
<!--           <p class="pull-right visible-xs"> -->
<!--             <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button> -->
<!--           </p> -->
<!--           <div class="jumbotron"> -->
<!--             <h1>Hello, world!</h1> -->
<!--             <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p> -->
<!--           </div> -->
<!--           <div class="row"> -->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
<!--               <h2>Heading</h2> -->
<!--               <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p> -->
<!--               <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
<!--             </div>/span -->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
<!--               <h2>Heading</h2> -->
<!--               <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p> -->
<!--               <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
<!--             </div>/span -->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
<!--               <h2>Heading</h2> -->
<!--               <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p> -->
<!--               <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
<!--             </div>/span -->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
<!--               <h2>Heading</h2> -->
<!--               <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p> -->
<!--               <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
<!--             </div>/span -->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
<!--               <h2>Heading</h2> -->
<!--               <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p> -->
<!--               <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
<!--             </div>/span -->
<!--             <div class="col-6 col-sm-6 col-lg-4"> -->
<!--               <h2>Heading</h2> -->
<!--               <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p> -->
<!--               <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
<!--             </div>/span -->
<!--           </div>/row -->
<!--         </div>/span -->

<!--         <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation"> -->
<!--           <div class="list-group"> -->
<!--             <a href="#" class="list-group-item active">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--             <a href="#" class="list-group-item">Link</a> -->
<!--           </div> -->
<!--         </div>/span -->
<!--       </div>/row -->


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
          <a class="navbar-brand" href="#">IsdarkA</a>
        </div>
        <?php echo $_smarty_tpl->tpl_vars['systemMenu']->value;?>

      </div><!-- /.container -->
    </div><!-- /.navbar -->
    
<!--     Progress Bar -->
	<div class="progress progress-striped active navbar-fixed-top" id="progressBar" style="display:none; height: 3px; margin: 0px;">
		<div class="progress-bar"  style="width: 0%">
		</div>
	</div>
<!--    / Progress Bar -->

    <div id="wrap" class="container">
		<?php echo $_smarty_tpl->getSubTemplate ("messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			
		<div class="row">
<!--         	<div class="col-xs-6 col-sm-2 " > -->
<!-- 	        	<div class="list-group  ">  -->
<!-- 		            <a href="#" class="list-group-item active">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 		            <a href="#" class="list-group-item">Link</a> -->
<!-- 	           </div> -->
<!--         	</div> -->
        	<div class="col-xs-6 col-sm-12 " >
        		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        		<?php echo $_smarty_tpl->getSubTemplate ("paginator.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        	</div>
        </div>
		
		
      <hr>

      
<div class="alert alert-danger navbar-fixed-top" id="alertMessages" style="display:none; width: 40%; left: 30%; top: -5px">
<a class="close"  href="#" aria-hidden="true">&times;</a>
  <strong>a</strong>
  <p></p>
  </div>
    </div><!--/.container-->
		</div><!--  /.wrap -->
<div id="footer">
      <div class="container">
        <p class="text-muted credit">BaseProject Israel Ruiz.</p>
      </div>
    </div>
    
    <?php if ($_smarty_tpl->tpl_vars['messageUsers']->value) {?>
    	<?php echo $_smarty_tpl->getSubTemplate ("sendMessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
  </body>
</html>

<?php }} ?>
