<blockquote class="alert-danger">
  <p>{$message}</p>
  <p>{$exception->getFile()}</p>
  <p>{$exception->getMessage()}</p>
	{assign var="traceStrings" value=explode("#", $exception->getTraceAsString())}
	<dl>
	{foreach $traceStrings as $traceString}
		{assign var="trace" value=explode(":", $traceString)}
		  <dt>{$trace[0]}</dt>
		  <dd>{$trace[1]}</dd>
	{/foreach}
	</dl>
  <small>Error</small>  
</blockquote>
{assign var="exception" value=$exception->getPrevious()}
{if $exception}
	<blockquote class="alert-danger">
	  <p>Previous exceptions</p>
	  <p>{$exception->getFile()}</p>
	  <p>{$exception->getMessage()}</p>
		{assign var="traceStrings" value=explode("#", $exception->getTraceAsString())}
		<dl>
		{foreach $traceStrings as $traceString}
			{assign var="trace" value=explode(":", $traceString)}
			  <dt>{$trace[0]}</dt>
			  <dd>{$trace[1]}</dd>
		{/foreach}
		</dl>
	  <small>Error</small>  
	</blockquote>
{/if}