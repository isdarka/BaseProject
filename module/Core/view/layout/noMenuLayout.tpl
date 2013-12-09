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
    <link href="{$baseUrl}/css/login.css" rel="stylesheet">
    
    <script type="text/javascript" src="{$baseUrl}/js/jquery-2.0.3.js"></script>
    
        
<!--     jQuery UI -->
	<link href="{$baseUrl}/css/jquery.ui/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script type="text/javascript" src="{$baseUrl}/js/jquery.ui/jquery-ui-1.10.3.custom.js"></script>
	
    <script type="text/javascript" src="{$baseUrl}/js/bootstrap.js"></script>
    <script type="text/javascript" src="{$baseUrl}/js/scripts.js"></script>
    
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/jquery.validate.js"></script>
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/additional-methods.js"></script>
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/class.js"></script>
    <script type="text/javascript" src="{$baseUrl}/js/jquery.validate/messages.js"></script>

  </head>

  <body>
  <div id="wrap">
<!--   navbar-fixed-top -->
<!--     <div class="navbar  navbar-inverse"> -->
 

    <div id="wrap" class="container">
		{include file="messages.tpl"}
		
		{$content}

      <hr>

      

    </div><!--/.container-->
		</div><!--  /.wrap -->
	
  </body>
</html>

