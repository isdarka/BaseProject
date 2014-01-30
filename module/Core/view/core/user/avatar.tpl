<script type="text/javascript" src="{$baseUrl}/js/jCrop/jquery.Jcrop.js"></script>
<script type="text/javascript" src="{$baseUrl}/js/modules/core/user/avatar.js"></script>
<link rel="stylesheet" href="{$baseUrl}/css/jCrop/jquery.Jcrop.css" type="text/css" />
<style type="text/css">

/* Apply these styles only when #preview-pane has
   been placed within the Jcrop widget */
.jcrop-holder #preview-pane {
  display: block;
  position: absolute;
  z-index: 2000;
  top: 10px;
  right: -280px;
  padding: 6px;
  border: 1px rgba(0,0,0,.4) solid;
  background-color: white;

  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;

  -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}

/* The Javascript code will set the aspect ratio of the crop
   area based on the size of the thumbnail preview,
   specified here */
#preview-pane .preview-container {
  width: 200px;
  height: 200px;
  overflow: hidden;
}

</style>
<fieldset>
	<legend>{$i18n->translate("Change Avatar")}</legend>
	<form class="form-horizontal validate" id="imageForm" method="post" enctype="multipart/form-data"  action="{$baseUrl}/core/user/save-profile">
		<div class="form-group">
			<label for="image" class="col-sm-2 control-label">{$i18n->translate("Select File")}</label>
		  		<div class="col-sm-10">
		    		<input type="file" name="image" id="image" class=" required">
		  		</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
		    	<a href="{url module=core controller=user action=profile}" class="btn btn-default">{$i18n->translate("Cancel")}</a>
		    	<button type="button" id="upload" class="btn btn-primary">{$i18n->translate("Upload")}</button>
			</div>
		</div>
	</form>
	
	
	<div class="panel panel-default" style="display: none;">
		<form class="form-horizontal validate" id="cropForm" method="post" enctype="multipart/form-data"  action="{$baseUrl}/core/user/crop">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<div class="row">
				<div class="col-md-8">
					<img src="{$baseUrl}/images/avatar/no_image.png" id="target"  alt="[Jcrop Example]" />
				</div>
				<div class="col-md-4" style="height: 400;">
					<div id="preview-pane"> 
				  		<div class="preview-container">
				    		<img src="{$baseUrl}/images/avatar/no_image.png" class="jcrop-preview" alt="Preview" />
				  		</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
			    	<button type="submit" id="upload" class="btn btn-primary">{$i18n->translate("Crop Image")}</button>
				</div>
			</div>
		</form>
	</div>
		
</fieldset>