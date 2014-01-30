<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="{$baseUrl}/css/bootstrap.css" rel="stylesheet">
<!--     <link href="{$baseUrl}/css/bootstrap-theme.css" rel="stylesheet"> -->
    <link href="{$baseUrl}/css/font-awesome/font-awesome.css" rel="stylesheet">
    <link href="{$baseUrl}/css/style.css" rel="stylesheet">
    
    <script type="text/javascript" src="{$baseUrl}/js/jquery-2.0.3.js"></script>
    
        
<!--     jQuery UI -->
	<link href="{$baseUrl}/css/jquery.ui/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script type="text/javascript" src="{$baseUrl}/js/jquery.ui/jquery-ui-1.10.3.custom.js"></script>
	
<!--     ZipCode -->
	<script type="text/javascript" src="{$baseUrl}/js/zipcode.js"></script>
	
    <script type="text/javascript" src="{$baseUrl}/js/bootstrap.js"></script>
    
    
    
<!--     MultiSelect -->
	<script type="text/javascript" src="{$baseUrl}/js/bootstrap/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="{$baseUrl}/css/bootstrap/bootstrap-multiselect.css" type="text/css">
    
    <script type="text/javascript" src="{$baseUrl}/js/scripts.js"></script>
    
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/jquery.validate.js"></script>
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/additional-methods.js"></script>
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/class.js"></script>
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/messages.js"></script>
    
	<script type="text/javascript">
		var baseUrl = "{$baseUrl}";
	</script>
	
<!-- 	BaseModel -->
	<script type="text/javascript" src="{$baseUrl}/js/model/bean/bean.js"></script>
	<script type="text/javascript" src="{$baseUrl}/js/model/collection/collection.js"></script>
	
<!-- 	Messages -->
	<script type="text/javascript" src="{$baseUrl}/js/Messages.js"></script>
	
	
	<script type="text/javascript" src="{$baseUrl}/js/model/bean/Message.js"></script>
	<script type="text/javascript" src="{$baseUrl}/js/model/bean/UserAvatar.js"></script>
	<script type="text/javascript" src="{$baseUrl}/js/model/collection/MessageCollection.js"></script>
	<script type="text/javascript" src="{$baseUrl}/js/model/collection/UserAvatarCollection.js"></script>
	
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
        {$systemMenu}
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    
<!--     Progress Bar -->
	<div class="progress progress-striped active navbar-fixed-top" id="progressBar" style="display:none; height: 3px; margin: 0px;">
		<div class="progress-bar"  style="width: 0%">
		</div>
	</div>
<!--    / Progress Bar -->

    <div id="wrap" class="container">
		{include file="messages.tpl"}
			
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
        		{$content}
        		{include file="paginator.tpl"}
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
    
    {if $messageUsers}
    	{include file="sendMessage.tpl"}
    {/if}
  </body>
</html>

