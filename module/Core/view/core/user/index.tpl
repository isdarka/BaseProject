<fieldset>
	<legend>{$i18n->translate("User")} 
		{if "core\controller\user::create"|isAllowed}
			<a href="{$baseUrl}/core/user/create" class="btn btn-success pull-right">{$i18n->translate("New User")}</a>
		{/if}
	</legend>
	<div class="table-responsive">
	<form action="{$baseUrl}/core/user/index" method="get">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><input type="text" class="form-control" name="id_user" placeholder="{$i18n->translate('ID_USER')}" value="{$queryParams['id_user']}"></th>
					<th><input type="text" class="form-control" name="status" placeholder="{$i18n->translate('STATUS')}" value="{$queryParams['status']}"></th>
					<th><input type="text" class="form-control" name="id_role" placeholder="{$i18n->translate('ID_ROLE')}" value="{$queryParams['id_role']}"></th>
					<th><input type="text" class="form-control" name="username" placeholder="{$i18n->translate('USERNAME')}" value="{$queryParams['username']}"></th>
					<th class="col-xs-2"><button type="submit" class="form-control btn btn-primary ">{$i18n->translate("Filter")}</button></th>
				</tr>
				<tr class="well">
					<th>{$i18n->translate("IdUser")}</th>
					<th>{$i18n->translate("Status")}</th>
					<th>{$i18n->translate("IdRole")}</th>
					<th>{$i18n->translate("Username")}</th>
					<th>{$i18n->translate("Actions")}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $users as $user}
				{assign var="role" value=$roles->getByPK($user->getIdRole())}
				<tr>
					<td>{$user->getIdUser()}</td>
					<td>{$user->getStatusString()}</td>
					<td>{$role->getName()}</td>
					<td>{$user->getUsername()}</td>
					<td>
						<div class="btn-group">
						{if "core\controller\user::update"|isAllowed}
							<a href="{url module=core controller=user action=update id=$user->getIdUser()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
						{/if}
							{if $user->isEnabled()}
								{if "core\controller\user::disable"|isAllowed}
									<a href="{url module=core controller=user action=disable id=$user->getIdUser()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a>
								{/if}
							{else if $user->isDisabled()}
								{if "core\controller\user::enable"|isAllowed}
									<a href="{url module=core controller=user action=enable id=$user->getIdUser()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a>
								{/if}
							{/if}
						{if "core\controller\user::history"|isAllowed}
							<a href="{url module=core controller=user action=history id=$user->getIdUser()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a>
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
