<fieldset>
	<legend>{$i18n->translate("Role")}</legend>
	<div class="table-responsive">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
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
						<a href="{url module=core controller=role action=update id=$role->getIdRole()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
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
