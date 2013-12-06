{if $flashMessenger}
	{if $flashMessenger->hasCurrentSuccessMessages()}
		{foreach $flashMessenger->getSuccessMessages() as $message}
			<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>{$i18n->translate("Success")}!</strong> {$message}.
			</div>
		{/foreach}
	{/if}
	{if $flashMessenger->hasCurrentInfoMessages()}
		{foreach $flashMessenger->getInfoMessages() as $message}
			<div class="alert alert-info alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>{$i18n->translate("Info")}!</strong> {$message}.
			</div>
		{/foreach}
	{/if}
	{if $flashMessenger->hasCurrentMessages()}
		{foreach $flashMessenger->getMessages() as $message}
			<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>{$i18n->translate("Warning")}!</strong> {$message}.
			</div>
		{/foreach}
	{/if}
	{if $flashMessenger->hasCurrentErrorMessages()}
		{foreach $flashMessenger->getErrorMessages() as $message}
			<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>{$i18n->translate("Error")}!</strong> {$message}.
			</div>
		{/foreach}
	{/if}
{/if}
