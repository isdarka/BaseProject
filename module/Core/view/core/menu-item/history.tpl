<fieldset>
	<legend>{$i18n->translate("History")}</legend>
	<div class="table-responsive">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th>{$i18n->translate("Username")}</th>
					<th>{$i18n->translate("Event")}</th>
					<th>{$i18n->translate("Date")}</th>
					<th>{$i18n->translate("Note")}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $menuItemLogs as $menuItemLog}
				{assign var="user" value=$users->getByPK($menuItemLog->getIdUser())}
					<tr>
						<td>{$user->getFullName()}</td>
						<td>{$menuItemLog->getEventString()}</td>
						<td>{$menuItemLog->getTimestamp()}</td>
						<td>{$menuItemLog->getNote()}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</fieldset>
