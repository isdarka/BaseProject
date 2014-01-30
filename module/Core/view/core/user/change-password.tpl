<fieldset>
	<legend></legend>
	<form class="form-horizontal validate" method="post" action="{$baseUrl}/core/user/change-password">
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">{$i18n->translate("Current Password")}</label>
		  		<div class="col-sm-10">
		    		<input type="password" class="form-control name" id="currentPassword" name="currentPassword" value="" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">{$i18n->translate("New Password")}</label>
		  		<div class="col-sm-10">
		    		<input type="password" class="form-control" id="password" name="password" value="" required>
		  		</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">{$i18n->translate("Confirm Password")}</label>
		  		<div class="col-sm-10">
		    		<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="" required>
		  		</div>
		</div>
		
		<div class="form-group">
		  <div class="col-sm-offset-2 col-sm-10">
		    <a href="{url module=core controller=core action=index}" class="btn btn-default">{$i18n->translate("Cancel")}</a>
		    <button type="submit" class="btn btn-primary">{$i18n->translate("Save")}</button>
		  </div>
		</div>
	</form>
	
</fieldset>