<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/notification-type/save">
	<input type="hidden" name="idNotificationType" id="idNotificationType" value="{$notificationType->getIdNotificationType()}">
	<div class="row">
		<div class="col-xs-6">
			<fieldset>
				<legend>{$i18n->translate('NotificationType')}</legend>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label">{$i18n->translate('Name')}</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" id="name" name="name" value="{$notificationType->getName()}">
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<a href="{url module=core controller='notification-type' action=index}" class="btn btn-default">{$i18n->translate('Cancel')}</a>
		<button type="submit" class="btn btn-primary">{$i18n->translate('Save')}</button>
		</div>
	</div>
</form>
