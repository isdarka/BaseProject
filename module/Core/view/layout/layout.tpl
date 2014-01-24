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
		
		{$content}
		{include file="paginator.tpl"}
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
  </body>
</html>

