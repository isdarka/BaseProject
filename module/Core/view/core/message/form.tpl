<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/message/save">
	<input type="hidden" name="idMessage" id="idMessage" value="{$message->getIdMessage()}">
	<div class="row">
		<div class="col-xs-6">
			<fieldset>
				<legend>{$i18n->translate('Message')}</legend>
				<div class="form-group">
					<label for="subject" class="col-sm-4 control-label">{$i18n->translate('Subject')}</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" id="subject" name="subject" value="{$message->getSubject()}">
					</div>
				</div>
				<div class="form-group">
					<label for="message" class="col-sm-4 control-label">{$i18n->translate('Message')}</label>
					<div class="col-sm-8">
						<textarea class="form-control required " id="message" name="message" >{$message->getMessage()}</textarea>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<a href="{url module=core controller='message' action=index}" class="btn btn-default">{$i18n->translate('Cancel')}</a>
		<button type="submit" class="btn btn-primary">{$i18n->translate('Save')}</button>
		</div>
	</div>
</form>
