<!-- Paginator -->
{if $paginator->pageCount}
<ul class="pagination">
	{if $paginator->previous}	
		<li><a href="{$baseUrl}/{$path}/{if $idRoute}{$idRoute}/{/if}page/{$paginator->previous}{if $params}?{http_build_query($params)}{/if}" data-toggle="tooltip" title="{$i18n->translate('Previous')}">&laquo;</a></li>
	{else}
		<li><a>&laquo;</a></li>
	{/if}
	
	{foreach $paginator->pagesInRange as $page}
		{if ($page != $paginator->current)}
			<li><a href="{$baseUrl}/{$path}/{if $idRoute}{$idRoute}/{/if}page/{$page}{if $params}?{http_build_query($params)}{/if}">{$page}</a></li>
		{else}
			<li class="active"><a>{$page}</a></li>
		{/if}
	{/foreach}
	
	{if $paginator->next}
		<li><a href="{$baseUrl}/{$path}/{if $idRoute}{$idRoute}/{/if}page/{$paginator->next}{if $params}?{http_build_query($params)}{/if}" data-toggle="tooltip" title="{$i18n->translate('Next')}">&raquo;</a></li>
	{else}
	  <li><a>&raquo;</a></li>
	{/if}
	
</ul>
{/if}
<!-- Paginator -->