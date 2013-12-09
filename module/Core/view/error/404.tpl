<h1>{$content} <small>{$baseUrl}/{strtolower(str_replace("\\Controller\\", "/", $controller))}</small></h1>

<div class="alert alert-warning">
{if $reason == 'error-controller-cannot-dispatch'}
	The requested controller was unable to dispatch the request.
{elseif $reason == 'error-controller-not-found'}
	The requested controller could not be mapped to an existing controller class.
{elseif $reason == 'error-controller-invalid'}
	The requested controller was not dispatchable.
{elseif $reason == 'error-router-no-match'}
	The requested URL could not be matched by routing.
{else}
	We cannot determine at this time why a 404 was generated.
{/if}
	<br />
	
</div>
