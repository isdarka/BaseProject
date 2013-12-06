<?php /* Smarty version Smarty-3.1-DEV, created on 2013-11-27 16:12:16
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/layout/layout.phtml" */ ?>
<?php /*%%SmartyHeaderCode:13038776175261750d7d2d65-50270000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9468020772c9ac514d90363e9256f38d50ef3af9' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/layout/layout.phtml',
      1 => 1385499115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13038776175261750d7d2d65-50270000',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5261750d82d5e0_12492161',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5261750d82d5e0_12492161')) {function content_5261750d82d5e0_12492161($_smarty_tpl) {?><<?php ?>?php echo $this->doctype(); ?<?php ?>>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <<?php ?>?php echo $this->headTitle('ZF2 '. $this->translate('Skeleton Application'))->setSeparator(' - ')->setAutoEscape(false) ?<?php ?>>

        <<?php ?>?php echo $this->headMeta()
            ->appendName('viewport', 'width=device-width, initial-scale=1.0')
            ->appendHttpEquiv('X-UA-Compatible', 'IE=edge')
        ?<?php ?>>

        <!-- Le styles -->
        <<?php ?>?php echo $this->headLink(array('rel' => 'shortcut icon', 'type' => 'image/vnd.microsoft.icon', 'href' => $this->basePath() . '/img/favicon.ico'))
                        ->prependStylesheet($this->basePath() . '/css/bootstrap-theme.min.css')
                        ->prependStylesheet($this->basePath() . '/css/bootstrap.min.css')
                        ->prependStylesheet($this->basePath() . '/css/style.css')
                        ->prependStylesheet($this->basePath() . '/css/font-awesome.css')
//                         ->prependStylesheet($this->basePath() . '/css/font-awesome-ie7.min.css')
        ?<?php ?>>

        <!-- Scripts -->
        <<?php ?>?php echo $this->headScript()
            ->prependFile($this->basePath() . '/js/bootstrap.min.js')
            ->prependFile($this->basePath() . '/js/jquery-2.0.3.js')
            ->prependFile($this->basePath() . '/js/respond.min.js', 'text/javascript', array('conditional' => 'lt IE 9',))
            ->prependFile($this->basePath() . '/js/html5shiv.js',   'text/javascript', array('conditional' => 'lt IE 9',))
        ; ?<?php ?>>

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<<?php ?>?php echo $this->url('home') ?<?php ?>>"><<?php ?>?php echo $this->translate('Skeleton Application') ?<?php ?>></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<<?php ?>?php echo $this->url('home') ?<?php ?>>"><<?php ?>?php echo $this->translate('Home') ?<?php ?>></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <<?php ?>?php echo $this->content; ?<?php ?>>
            <hr>
            <footer>
                <p>&copy; 2005 - <<?php ?>?php echo date('Y') ?<?php ?>> by Zend Technologies Ltd. <<?php ?>?php echo $this->translate('All rights reserved.') ?<?php ?>></p>
            </footer>
        </div> <!-- /container -->
        <<?php ?>?php echo $this->inlineScript() ?<?php ?>>
        <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="well sidebar-nav">
            <ul class="nav">
              <li>Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li>Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li>Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.container-->
        
    </body>
</html>
<?php }} ?>
