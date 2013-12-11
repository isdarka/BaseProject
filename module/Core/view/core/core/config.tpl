<script type="text/javascript" src="{$baseUrl}/js/modules/core/config.js"></script>
<script type="text/javascript" src="{$baseUrl}/js/model/demo.js"></script>
<fieldset>
	<legend>{$i18n->translate("Config")}
		<a href="{$baseUrl}/core/core/flush-privileges"  class="btn btn-warning" data-toggle="tooltip" title="Flush Privileges"><i class="fa fa-refresh fa-spin"></i></a>
	</legend>
	<div class="table-responsive">
	{foreach $modules as $module}
		{assign var="controllersModule" value=$controllers->getByIdModule($module->getIdModule())}
		
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th colspan="{$roles->count() + 1}" class="text-center">{$module->getName()}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $controllersModule as $controller}
				{assign var="controllerActions" value=$actions->getByIdController($controller->getIdController())}
				<tr class="well">
					<td>{$controller->getName()}</td>
					{foreach $roles as $role}
						<td>{$role->getName()}</td>	
					{/foreach}
				</tr>
				
					{foreach $controllerActions as $action}
						<tr>
							<td>{$action->getName()}</td>
							{foreach $roles as $role}
								<td><input type="checkbox" {if $actionRoles[$action->getIdAction()][$role->getIdRole()]} checked="checked" {/if} class="form-control" data-id-role="{$role->getIdRole()}" data-id-action="{$action->getIdAction()}"></td>	
							{/foreach}
						<tr>	
					{/foreach}	
				{/foreach}
			</tbody>
		</table>
	{/foreach}
	</div>
</fieldset>