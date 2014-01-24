<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/file/save">
	<input type="hidden" name="idFile" id="idFile" value="{$file->getIdFile()}">
	<div class="row">
		<div class="col-xs-6">
			<fieldset>
				<legend>{$i18n->translate('File')}</legend>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label">{$i18n->translate('Name')}</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" id="name" name="name" value="{$file->getName()}">
					</div>
				</div>
				<div class="form-group">
					<label for="timestamp" class="col-sm-4 control-label">{$i18n->translate('Timestamp')}</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required datepicker" id="timestamp" name="timestamp" value="{$file->getTimestamp()}">
					</div>
				</div>
				<div class="form-group">
					<label for="path" class="col-sm-4 control-label">{$i18n->translate('Path')}</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" id="path" name="path" value="{$file->getPath()}">
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<a href="{url module=core controller='file' action=index}" class="btn btn-default">{$i18n->translate('Cancel')}</a>
		<button type="submit" class="btn btn-primary">{$i18n->translate('Save')}</button>
		</div>
	</div>
</form>
