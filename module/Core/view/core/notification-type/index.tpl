<fieldset>
	<legend>{$i18n->translate('NotificationType')} 
		{if 'core\controller\notification-type::create'|isAllowed}
			<a href="{$baseUrl}/core/notification-type/create" class="btn btn-success pull-right">{$i18n->translate('New NotificationType')}</a>
		{/if}
	</legend>
	<div class="table-responsive">
	<form action="{$baseUrl}/core/notification-type/index" method="get">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><input type="text" class="form-control" name="id_notification_type" placeholder="{$i18n->translate('ID_NOTIFICATION_TYPE')}" value="{$queryParams['id_notification_type']}"></th>
					<th>
						{html_options options=array("{$i18n->translate('Select a option')}") + $statuses name="status" id="status" class="form-control" selected="{$queryParams['status']}"}
					</th>
					<th><input type="text" class="form-control" name="name" placeholder="{$i18n->translate('NAME')}" value="{$queryParams['name']}"></th>
					<th class="col-xs-2"><button type="submit" class="form-control btn btn-primary ">{$i18n->translate('Filter')}</button></th>
				</tr>
				<tr class="well">
					<th>{$i18n->translate('IdNotificationType')}</th>
					<th>{$i18n->translate('Status')}</th>
					<th>{$i18n->translate('Name')}</th>
					<th>{$i18n->translate('Actions')}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $notificationTypes as $notificationType}
				<tr>
					<td>{$notificationType->getIdNotificationType()}</td>
					<td>{$notificationType->getStatusString()}</td>
					<td>{$notificationType->getName()}</td>
					<td>
						<div class="btn-group">
						{if 'core\controller\notification-type::update'|isAllowed}
							<a href="{url module=core controller='notification-type' action=update id=$notificationType->getIdNotificationType()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
						{/if}
							{if $notificationType->isEnabled()}
								{if 'core\controller\notification-type::disable'|isAllowed}
									<a href="{url module=core controller='notification-type' action=disable id=$notificationType->getIdNotificationType()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a>
								{/if}
							{else if $notificationType->isDisabled()}
								{if 'core\controller\notification-type::enable'|isAllowed}
									<a href="{url module=core controller='notification-type' action=enable id=$notificationType->getIdNotificationType()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a>
								{/if}
							{/if}
						{if 'core\controller\notification-type::history'|isAllowed}
							<a href="{url module=core controller='notification-type' action=history id=$notificationType->getIdNotificationType()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a>
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
