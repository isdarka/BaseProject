<fieldset>
	<legend>{$i18n->translate("History")}</legend>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover">
  		<thead>
  			<tr class="well">
<!--   				<th>{$i18n->translate("ID")}</th> -->
  				<th>{$i18n->translate("Username")}</th>
  				<th>{$i18n->translate("Event")}</th>
  				<th>{$i18n->translate("Date")}</th>
  				<th>{$i18n->translate("Note")}</th>
  			</tr>
  		</thead>
  		<tbody>
  			{foreach $userLogs as $userLog}
  				{assign var="user" value=$users->getByPK($userLog->getIdUser())}
  				<tr>
  					<td>{$user->getFullName()}</td>
  					<td>{$userLog->getEventString()}</td>
  					<td>{$userLog->getTimestamp()}</td>
  					<td>{$userLog->getNote()}</td>
  				</tr>
  			{/foreach}
  		</tbody>
	</table>
	</div>
	<a href="{url module=core controller=user action=index}" class="btn btn-default">{$i18n->translate('Go Back')}</a>
</fieldset>
