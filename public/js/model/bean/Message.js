/**
 * @author isdarka
 */

function Message()
{
	this.idMessage;
	this.status;
	this.timestamp;
	this.subject;
	this.message;
	this.userAvatar;
}

Message.prototype = new Bean();
Message.prototype.constructor = Message;

/**
 * 
 * @returns
 */
Message.prototype.getIndex = function()
{
	return this.idMessage;
};

/**
 * 
 * @param idMessage
 * @returns {Message}
 */
Message.prototype.setIdMessage = function(idMessage)
{
	this.idMessage = idMessage;
	return this;
};

/**
 * 
 * @returns
 */
Message.prototype.getIdMessage = function()
{
	return this.idMessage;
};

/**
 * 
 * @param status
 * @returns {Message}
 */
Message.prototype.setStatus = function(status)
{
	this.status = status;
	return this;
};

/**
 * 
 * @returns
 */
Message.prototype.getStatus = function()
{
	return this.status;
};

/**
 * 
 * @param timestamp
 * @returns {Message}
 */
Message.prototype.setTimestamp = function(timestamp)
{
	this.timestamp = timestamp;
	return this;
};

/**
 * 
 * @returns
 */
Message.prototype.getTimestamp = function()
{
	return this.timestamp;
};

/**
 * 
 * @param subject
 * @returns {Message}
 */
Message.prototype.setSubject = function(subject)
{
	this.subject = subject;
	return this;
};

/**
 * 
 * @returns
 */
Message.prototype.getSubject = function()
{
	return this.subject;
};

/**
 * 
 * @param message
 * @returns {Message}
 */
Message.prototype.setMessage = function(message)
{
	this.message = message;
	return this;
};

/**
 * 
 * @returns
 */
Message.prototype.getMessage = function()
{
	return this.message;
};

/**
 * 
 * @param {UserAvatar} userAvatar
 * @returns {Message}
 */
Message.prototype.setUserAvatar = function(userAvatar)
{
	if(userAvatar instanceof UserAvatar == false)
		throw "userAvatar must be instace of UserAvatar";
	this.userAvatar = userAvatar;
	return this;
};

/**
 * 
 * @returns {UserAvatar}
 */
Message.prototype.getUserAvatar = function()
{
	return this.userAvatar;
};

/**
 * 
 * @param {jQuery} element
 */
Message.prototype.render = function(element)
{
	var html = '';
		html += '<li data-index="' + this.getIndex() + '">';
		html += '<div class="row">';
		html += '<div class="col-sm-4 text-center">';
		html += '<a href="#" class="readMessage"><img class="img-circle" src="' + baseUrl + "/" + this.getUserAvatar().getAvatar() + '" width="50"></a>';
		html += '</div>	';
		html += '<div class="col-sm-8">';
		html += '<a href="#" class="readMessage">' + this.getSubject() + '</a>';
		html += '</div>';
		html += '</div>';
		html += '</li>';
	var exist = element.closest("li").find('[data-index="' + this.getIndex() + '"]');
	if(exist.length > 0)
	{
		exist.after(html);
		exist.remove();
	}else{
		html += '<li role="presentation" class="divider"></li>';
		element.closest("li").find("ul").append(html);
	}
};

/**
 * 
 * @param {jQuery} element
 */
Message.prototype.renderFullMessage = function(element)
{
	var html = '';
	element.html(html);
		html += '<div class="row">';
		html += '<div class="col-sm-4 text-center">';
		html += '<img class="img-circle" src="' +baseUrl + '/' + this.getUserAvatar().getAvatar() + '" width="100">';
		html += '</div>';
		html += '<div class="col-sm-8">';
		html += '<div class="panel panel-info">';
		html += '<div class="panel-heading">';
		html += '<h3 class="panel-title">' + this.getSubject() + '</h3>';
		html += '</div>';
		html += '<div class="panel-body">';
		html += this.getMessage();
		html += '</div>';
		html += '<div class="panel-footer text-right">' + this.getTimestamp() + '</div>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
	
	element.html(html);
};
