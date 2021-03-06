<fieldset>
	<legend>{$i18n->translate("Role")}</legend>
	<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/role/save">
		<input type="hidden" name="idRole" id="idrole" value="{$role->getIdRole()}">
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">{$i18n->translate("Name")}</label>
			<div class="col-sm-10">
				<input type="text" class="form-control required" id="name" name="name" value="{$role->getName()}">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<a href="{url module=core controller=role action=index}" class="btn btn-default">{$i18n->translate("Cancel")}</a>
			<button type="submit" class="btn btn-primary">{$i18n->translate("Save")}</button>
			</div>
		</div>
	</form>
</fieldset>
