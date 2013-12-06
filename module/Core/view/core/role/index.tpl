<fieldset>
	<legend>{$i18n->translate("Roles")}</legend>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover">
  		<thead>
  			<tr class="well">
  				<th>{$i18n->translate("ID")}</th>
  				<th>{$i18n->translate("Role")}</th>
  				<th>{$i18n->translate("Status")}</th>
  				<th>{$i18n->translate("Actions")}</th>
  			</tr>
  		</thead>
  		<tbody>
  			{foreach $roles as $role}
  				<tr>
  					<td>{$role->getIdRole()}</td>
  					<td>{$role->getName()}</td>
  					<td>{$role->getStatusString()}</td>
  					<td>
						<div class="btn-group">
						
		  					<a href="{url module=core controller=role action=update idUser=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
		  					{if $role->isEnabled()}
		  						<a href="{url module=core controller=role action=disable id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a>
		  					{else if $role->isDisabled()}
		  						<a href="{url module=core controller=role action=enable id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a>
		  					{/if}
		  					<a href="{url module=core controller=role action=history id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a>
  						</div>
  					</td>
  				</tr>
  			{/foreach}
  		</tbody>
	</table>
	</div>
</fieldset>
{if $pages > 1}
<ul class="pagination">
	<li><a href="{$baseUrl}/core/user/index/page/1">&laquo;</a></li>
	{assign var="many" value=false}
	{if $currentPage >= 2}
		<li><a href="{$baseUrl}/core/user/index/page/{$currentPage - 1}">{$currentPage - 1}</a></li>
	{/if}
		<li class="active "><a href="{$baseUrl}/core/user/index/page/{$currentPage}">{$currentPage}</a></li>
	{if $currentPage < $pages}
		<li><a href="{$baseUrl}/core/user/index/page/{$currentPage + 1}">{$currentPage + 1}</a></li>
	{/if}
	<li><a href="{$baseUrl}/core/user/index/page/{$pages}">&raquo;</a></li>
  	<li><a href="#">Pages: {$pages}</a></li>
  	<li><a href="#">Records: {$total}</a></li>
</ul>
{/if}
