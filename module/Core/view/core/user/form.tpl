<fieldset>
	<legend></legend>
	<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/user/save">
		<input type="hidden" name="idUser" id="idUser" value="{$user->getIdUser()}">
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">{$i18n->translate("Username")}</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control name" id="username" name="username" value="{$user->getUsername()}" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">{$i18n->translate("Password")}</label>
		  		<div class="col-sm-10">
		    		<input type="password" class="form-control" id="password" name="password" value="{$user->getPassword()}" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">{$i18n->translate("Name")}</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control" id="name" name="name" value="{$user->getName()}" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="lastName" class="col-sm-2 control-label">{$i18n->translate("Last Name")}</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control" id="lastName" name="last_name" value="{$user->getLastName()}" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="secondLastName" class="col-sm-2 control-label">{$i18n->translate("Second Last Name")}</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control" id="secondLastName" name="second_last_name" value="{$user->getSecondLastName()}" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="birthdate" class="col-sm-2 control-label">{$i18n->translate("Birthdate")}</label>
		  		<div class="col-sm-10">
		    		<input type="text" class="form-control datepicker" id="birthdate" name="birthdate" value="{$user->getBirthdate()}" required>
		  		</div>
		</div>
		<div class="form-group">
		  <div class="col-sm-offset-2 col-sm-10">
		    <a href="{url module=core controller=user action=index}" class="btn btn-default">{$i18n->translate("Cancel")}</a>
		    <button type="submit" class="btn btn-primary">{$i18n->translate("Save")}</button>
		  </div>
		</div>
	</form>
	<textarea rows="" cols=""></textarea>
	
</fieldset>