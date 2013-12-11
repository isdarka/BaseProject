<fieldset>
	<legend>{$i18n->translate("Role")} 
		{if "Core\Controller\Role::create"|isAllowed}
			<a href="{$baseUrl}/core/role/create" class="btn btn-success pull-right">{$i18n->translate("New Role")}</a>
		{/if}
	</legend>
	<div class="table-responsive">
	<form action="{$baseUrl}/core/role/index" method="get">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><input type="text" class="form-control" name="id_role" placeholder="{$i18n->translate('ID_ROLE')}" value="{$queryParams['id_role']}"></th>
					<th><input type="text" class="form-control" name="name" placeholder="{$i18n->translate('NAME')}" value="{$queryParams['name']}"></th>
					<th><input type="text" class="form-control" name="status" placeholder="{$i18n->translate('STATUS')}" value="{$queryParams['status']}"></th>
					<th class="col-xs-2"><button type="submit" class="form-control btn btn-primary ">{$i18n->translate("Filter")}</button></th>
				</tr>
				<tr class="well">
					<th>{$i18n->translate("IdRole")}</th>
					<th>{$i18n->translate("Name")}</th>
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
						{if "Core\Controller\Role::update"|isAllowed}
							<a href="{url module=core controller=role action=update id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
						{/if}
							{if $role->isEnabled()}
								{if "Core\Controller\Role::disable"|isAllowed}
									<a href="{url module=core controller=role action=disable id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a>
								{/if}
							{else if $role->isDisabled()}
								{if "Core\Controller\Role::enable"|isAllowed}
									<a href="{url module=core controller=role action=enable id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a>
								{/if}
							{/if}
						{if "Core\Controller\Role::history"|isAllowed}
							<a href="{url module=core controller=role action=history id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a>
						{/if}
						</div>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		</form>
	</div>
</fieldset>
