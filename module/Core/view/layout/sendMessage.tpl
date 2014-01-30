<div class="modal fade" id="sendMessageModal">
	<div class="modal-dialog">
    	<div class="modal-content">
	    	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        	<h4 class="modal-title">{$i18n->translate('New Message')}</h4>
	      	</div>
	      	<div class="modal-body">
	        	<form class="form-horizontal validate" method="post" id="sendMessageForm" action="{$baseUrl}">
	        		<div class="form-group">
						<label for="messageUsers" class="col-sm-2 control-label">{$i18n->translate('From')}</label>
						<div class="col-sm-10">
							{html_options options=$messageUsers->toCombo() name="messageUsers" id="messageUsers" class="form-control multiselect select required" multiple="multiple"}
						</div>
					</div>
	        		<div class="form-group">
						<label for="subject" class="col-sm-2 control-label">{$i18n->translate('Subject')}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required" id="subject" name="subject" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="body" class="col-sm-2 control-label">{$i18n->translate('Message')}</label>
						<div class="col-sm-10">
							<textarea rows="" cols="" name="body" id="body" class="form-control required"></textarea>
						</div>
					</div>
	        	</form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">{$i18n->translate('Cancel')}</button>
	        	<button type="button" class="btn btn-primary" id="saveSendMessage">{$i18n->translate('Send Message')}</button>
	      	</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<div class="modal fade" id="readMessageModal">
	<div class="modal-dialog">
    	<div class="modal-content">
	    	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        	<h4 class="modal-title">{$i18n->translate('Message')}</h4>
	      	</div>
	      	<div class="modal-body">
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">{$i18n->translate("Close")}</button>
	      	</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->