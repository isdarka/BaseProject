<fieldset>
	<legend>{$i18n->translate("MenuItem")}</legend>
	<div class="table-responsive">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th>{$i18n->translate("IdMenuItem")}</th>
					<th>{$i18n->translate("IdAction")}</th>
					<th>{$i18n->translate("IdParent")}</th>
					<th>{$i18n->translate("Name")}</th>
					<th>{$i18n->translate("Order")}</th>
					<th>{$i18n->translate("Status")}</th>
					<th>{$i18n->translate("Actions")}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $menuItems as $menuItem}
				<tr>
					<td>{$menuItem->getIdMenuItem()}</td>
					<td>{$menuItem->getIdAction()}</td>
					<td>{$menuItem->getIdParent()}</td>
					<td>{$menuItem->getName()}</td>
					<td>{$menuItem->getOrder()}</td>
					<td>{$menuItem->getStatusString()}</td>
					<td>
						<div class="btn-group">
						<a href="{url module=core controller=menuitem action=update id=$menuItem->getIdMenuItem()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
							{if $menuItem->isEnabled()}
								<a href="{url module=core controller=menuitem action=disable id=$menuItem->getIdMenuItem()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a>
							{else if $menuItem->isDisabled()}
								<a href="{url module=core controller=menuitem action=enable id=$menuItem->getIdMenuItem()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a>
							{/if}
						<a href="{url module=core controller=menuitem action=history id=$menuItem->getIdMenuItem()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a>
						</div>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</fieldset>
