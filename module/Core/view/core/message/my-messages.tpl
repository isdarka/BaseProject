<fieldset>
	<legend>{$i18n->translate('My Messages')} 
	</legend>
	<div class="table-responsive">
	<form action="{$baseUrl}/core/message/my-messages" method="get">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th></th>
					<th>
						{html_options options=array("{$i18n->translate('Select a option')}") + $statuses name="status" id="status" class="form-control" selected="{$queryParams['status']}"}
					</th>
					<th></th>
					<th><input type="text" class="form-control" name="subject" placeholder="{$i18n->translate('SUBJECT')}" value="{$queryParams['subject']}"></th>
					<th><input type="text" class="form-control" name="message" placeholder="{$i18n->translate('MESSAGE')}" value="{$queryParams['message']}"></th>
					<th class="col-xs-2"><button type="submit" class="form-control btn btn-primary ">{$i18n->translate('Filter')}</button></th>
				</tr>
				<tr class="well">
					<th>{$i18n->translate('ID')}</th>
					<th>{$i18n->translate('Status')}</th>
					<th>{$i18n->translate('Created')}</th>
					<th>{$i18n->translate('Subject')}</th>
					<th>{$i18n->translate('Message')}</th>
					<th>{$i18n->translate('Actions')}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $messages as $message}
				<tr>
					<td>{$message->getIdMessage()}</td>
					<td>{$message->getStatusString()}</td>
					<td>{$message->getTimestamp()}</td>
					<td>{$message->getSubject()}</td>
					<td>{$message->getMessage()}</td>
					<td>
						<div class="btn-group">
<!-- 						{if 'core\controller\message::update'|isAllowed} -->
<!-- 							<a href="{url module=core controller='message' action=update id=$message->getIdMessage()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a> -->
<!-- 						{/if} -->
<!-- 							{if $message->isEnabled()} -->
<!-- 								{if 'core\controller\message::disable'|isAllowed} -->
<!-- 									<a href="{url module=core controller='message' action=disable id=$message->getIdMessage()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a> -->
<!-- 								{/if} -->
<!-- 							{else if $message->isDisabled()} -->
<!-- 								{if 'core\controller\message::enable'|isAllowed} -->
<!-- 									<a href="{url module=core controller='message' action=enable id=$message->getIdMessage()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a> -->
<!-- 								{/if} -->
<!-- 							{/if} -->
<!-- 						{if 'core\controller\message::history'|isAllowed} -->
<!-- 							<a href="{url module=core controller='message' action=history id=$message->getIdMessage()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a> -->
<!-- 						{/if} -->
						</div>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		</form>
	</div>
</fieldset>
