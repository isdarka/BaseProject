<?php /* Smarty version Smarty-3.1-DEV, created on 2013-10-18 13:32:38
         compiled from "/home/isdarka/WWW/BaseProject/module/Core/view/error/index.phtml" */ ?>
<?php /*%%SmartyHeaderCode:89941816852617ec65d9de2-31398510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80a47b05514c2b9b0c6e54df180b8cfdf14a4d53' => 
    array (
      0 => '/home/isdarka/WWW/BaseProject/module/Core/view/error/index.phtml',
      1 => 1377467632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89941816852617ec65d9de2-31398510',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52617ec66b61d6_37723463',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52617ec66b61d6_37723463')) {function content_52617ec66b61d6_37723463($_smarty_tpl) {?><h1><<?php ?>?php echo $this->translate('An error occurred') ?<?php ?>></h1>
<h2><<?php ?>?php echo $this->message ?<?php ?>></h2>

<<?php ?>?php if (isset($this->display_exceptions) && $this->display_exceptions): ?<?php ?>>

<<?php ?>?php if(isset($this->exception) && $this->exception instanceof Exception): ?<?php ?>>
<hr/>
<h2><<?php ?>?php echo $this->translate('Additional information') ?<?php ?>>:</h2>
<h3><<?php ?>?php echo get_class($this->exception); ?<?php ?>></h3>
<dl>
    <dt><<?php ?>?php echo $this->translate('File') ?<?php ?>>:</dt>
    <dd>
        <pre class="prettyprint linenums"><<?php ?>?php echo $this->exception->getFile() ?<?php ?>>:<<?php ?>?php echo $this->exception->getLine() ?<?php ?>></pre>
    </dd>
    <dt><<?php ?>?php echo $this->translate('Message') ?<?php ?>>:</dt>
    <dd>
        <pre class="prettyprint linenums"><<?php ?>?php echo $this->exception->getMessage() ?<?php ?>></pre>
    </dd>
    <dt><<?php ?>?php echo $this->translate('Stack trace') ?<?php ?>>:</dt>
    <dd>
        <pre class="prettyprint linenums"><<?php ?>?php echo $this->exception->getTraceAsString() ?<?php ?>></pre>
    </dd>
</dl>
<<?php ?>?php
    $e = $this->exception->getPrevious();
    if ($e) :
?<?php ?>>
<hr/>
<h2><<?php ?>?php echo $this->translate('Previous exceptions') ?<?php ?>>:</h2>
<ul class="unstyled">
    <<?php ?>?php while($e) : ?<?php ?>>
    <li>
        <h3><<?php ?>?php echo get_class($e); ?<?php ?>></h3>
        <dl>
            <dt><<?php ?>?php echo $this->translate('File') ?<?php ?>>:</dt>
            <dd>
                <pre class="prettyprint linenums"><<?php ?>?php echo $e->getFile() ?<?php ?>>:<<?php ?>?php echo $e->getLine() ?<?php ?>></pre>
            </dd>
            <dt><<?php ?>?php echo $this->translate('Message') ?<?php ?>>:</dt>
            <dd>
                <pre class="prettyprint linenums"><<?php ?>?php echo $e->getMessage() ?<?php ?>></pre>
            </dd>
            <dt><<?php ?>?php echo $this->translate('Stack trace') ?<?php ?>>:</dt>
            <dd>
                <pre class="prettyprint linenums"><<?php ?>?php echo $e->getTraceAsString() ?<?php ?>></pre>
            </dd>
        </dl>
    </li>
    <<?php ?>?php
        $e = $e->getPrevious();
        endwhile;
    ?<?php ?>>
</ul>
<<?php ?>?php endif; ?<?php ?>>

<<?php ?>?php else: ?<?php ?>>

<h3><<?php ?>?php echo $this->translate('No Exception available') ?<?php ?>></h3>

<<?php ?>?php endif ?<?php ?>>

<<?php ?>?php endif ?<?php ?>>
<?php }} ?>
