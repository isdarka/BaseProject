<fieldset>
	<legend>Profile</legend>
	<div class="panel panel-default">
		<div class="panel-body">
	  		<div class="row">
	  			<div class="col-xs-12 col-sm-6 col-md-2 text-center">
	  				<img src="{$baseUrl}/{$file->getPath()}/{$file->getName()}" class="img-circle">
	  				<a class="btn btn-primary" href="{$baseUrl}/core/user/avatar">Change Image</a>
	  			</div>
	  			<div class="col-xs-12 col-sm-6 col-md-10">
	  				<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/user/save-profile">
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">{$i18n->translate("Name")}</label>
						  		<div class="col-sm-8">
						    		<input type="text" class="form-control" id="name" name="name" value="{$user->getName()}" required>
						  		</div>
						</div>
						<div class="form-group">
							<label for="lastName" class="col-sm-4 control-label">{$i18n->translate("Last Name")}</label>
						  		<div class="col-sm-8">
						    		<input type="text" class="form-control" id="lastName" name="last_name" value="{$user->getLastName()}" required>
						  		</div>
						</div>
						<div class="form-group">
							<label for="secondLastName" class="col-sm-4 control-label">{$i18n->translate("Second Last Name")}</label>
						  		<div class="col-sm-8">
						    		<input type="text" class="form-control" id="secondLastName" name="second_last_name" value="{$user->getSecondLastName()}" required>
						  		</div>
						</div>
						<div class="form-group">
							<label for="birthdate" class="col-sm-4 control-label">{$i18n->translate("Birthdate")}</label>
						  		<div class="col-sm-8">
						    		<input type="text" class="form-control datepicker" id="birthdate" name="birthdate" value="{$user->getBirthdate()}" required>
						  		</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
						    	<a href="{url module=core controller=user action=index}" class="btn btn-default">{$i18n->translate("Cancel")}</a>
						    	<button type="submit" class="btn btn-primary">{$i18n->translate("Save")}</button>
							</div>
						</div>
	  				</form>
	  			</div>
	  		</div>
	  	</div>
	</div>
</fieldset>