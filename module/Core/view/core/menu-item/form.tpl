<fieldset>
	<legend>{$i18n->translate("MenuItem")}</legend>
	<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/menuitem/save">
		<input type="hidden" name="idMenuItem" id="idmenuitem" value="{$menuItem->getIdMenuItem()}">
		<div class="form-group">
			<label for="idAction" class="col-sm-2 control-label">{$i18n->translate("IdAction")}</label>
			<div class="col-sm-10">
				{html_options options=array("{$i18n->translate("Select a option")}") + $comboControllersActions name="id_action" id="idAction" class="form-control" selected="{$menuItem->getIdAction()}"}
			</div>
		</div>
		<div class="form-group">
			<label for="idParent" class="col-sm-2 control-label">{$i18n->translate("IdParent")}</label>
			<div class="col-sm-10">
				{html_options options=array("{$i18n->translate("Select a option")}") + $menuParents->toCombo() name="id_parent" id="idParent" class="form-control" selected="{$menuItem->getIdParent()}"}
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">{$i18n->translate("Name")}{$menuItem->getIdParent()}</label>
			<div class="col-sm-10">
				<input type="text" class="form-control required" id="name" name="name" value="{$menuItem->getName()}">
			</div>
		</div>
		<div class="form-group">
			<label for="order" class="col-sm-2 control-label">{$i18n->translate("Order")}</label>
			<div class="col-sm-10">
				<input type="text" class="form-control required int " id="order" name="order" value="{$menuItem->getOrder()}" >
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<a href="{url module=core controller=menuitem action=index}" class="btn btn-default">{$i18n->translate("Cancel")}</a>
			<button type="submit" class="btn btn-primary">{$i18n->translate("Save")}</button>
			</div>
		</div>
	</form>
</fieldset>
