<fieldset>
	<legend>{$i18n->translate("Menu")}</legend>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed table-hover">
  		<thead>
  			<tr class="well">
  				<th class="text-center">{$i18n->translate("ID")}</th>
  				<th class="text-center">{$i18n->translate("Menu")}</th>
  				<th class="text-center">{$i18n->translate("Status")}</th>
  				<th class="text-center">{$i18n->translate("Actions")}</th>
  			</tr>
  		</thead>
  		<tbody>
  			{foreach $users as $user}
  				<tr>
  					<td>{$user->getIdUser()}</td>
  					<td>{$user->getUsername()}</td>
  					<td>{$user->getStatus()}</td>
  					<td>
						<div class="btn-group">
						
		  					<a href="{url module=core controller=user action=update idUser=$user->getIdUser()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
		  					<a href="#" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a>
		  					<a href="#" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a>
		  					<a href="#" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a>
  						</div>
  					</td>
  				</tr>
  			{/foreach}
  		</tbody>
	</table>
	</div>
</fieldset>
