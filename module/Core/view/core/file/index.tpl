<fieldset>
	<legend>{$i18n->translate('File')} 
		{if 'core\controller\file::create'|isAllowed}
			<a href="{$baseUrl}/core/file/create" class="btn btn-success pull-right">{$i18n->translate('New File')}</a>
		{/if}
	</legend>
	<div class="table-responsive">
	<form action="{$baseUrl}/core/file/index" method="get">
		<table class="table table-bordered table-condensed table-hover">
			<thead>
				<tr class="well">
					<th><input type="text" class="form-control" name="id_file" placeholder="{$i18n->translate('ID_FILE')}" value="{$queryParams['id_file']}"></th>
					<th>
						{html_options options=array("{$i18n->translate('Select a option')}") + $statuses name="status" id="status" class="form-control" selected="{$queryParams['status']}"}
					</th>
					<th><input type="text" class="form-control" name="name" placeholder="{$i18n->translate('NAME')}" value="{$queryParams['name']}"></th>
					<th><input type="text" class="form-control" name="timestamp" placeholder="{$i18n->translate('TIMESTAMP')}" value="{$queryParams['timestamp']}"></th>
					<th><input type="text" class="form-control" name="path" placeholder="{$i18n->translate('PATH')}" value="{$queryParams['path']}"></th>
					<th class="col-xs-2"><button type="submit" class="form-control btn btn-primary ">{$i18n->translate('Filter')}</button></th>
				</tr>
				<tr class="well">
					<th>{$i18n->translate('IdFile')}</th>
					<th>{$i18n->translate('Status')}</th>
					<th>{$i18n->translate('Name')}</th>
					<th>{$i18n->translate('Timestamp')}</th>
					<th>{$i18n->translate('Path')}</th>
					<th>{$i18n->translate('Actions')}</th>
				</tr>
			</thead>
			<tbody>
				{foreach $files as $file}
				<tr>
					<td>{$file->getIdFile()}</td>
					<td>{$file->getStatusString()}</td>
					<td>{$file->getName()}</td>
					<td>{$file->getTimestamp()}</td>
					<td>{$file->getPath()}</td>
					<td>
						<div class="btn-group">
						{if 'core\controller\file::update'|isAllowed}
							<a href="{url module=core controller='file' action=update id=$file->getIdFile()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Edit')}"><span class="fa fa-pencil"></span></a>
						{/if}
							{if $file->isEnabled()}
								{if 'core\controller\file::disable'|isAllowed}
									<a href="{url module=core controller='file' action=disable id=$file->getIdFile()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Disable')}"><span class="fa fa-times-circle-o"></span></a>
								{/if}
							{else if $file->isDisabled()}
								{if 'core\controller\file::enable'|isAllowed}
									<a href="{url module=core controller='file' action=enable id=$file->getIdFile()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('Enable')}"><span class="fa fa-check-circle-o"></span></a>
								{/if}
							{/if}
						{if 'core\controller\file::history'|isAllowed}
							<a href="{url module=core controller='file' action=history id=$file->getIdFile()}" class="btn btn-default" data-toggle="tooltip" title="{$i18n->translate('History')}"><span class="fa fa-book"></span></a>
						{/if}
						</div>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		</form>
	</div>
</fieldset>
