/**
 * @autor isdarka
 * @created Dec 17, 2013, 3:47:35 PM
 * 
 */

function Email()
{
	this.idEmail;
	this.email;
}

Email.prototype = new Bean();
Email.prototype.constructor = Email;

Email.prototype.getIndex = function()
{
	return this.idEmail + "-" + this.email;
};

Email.prototype.setIdEmail = function(idEmail)
{
	this.idEmail = idEmail;
	return this;
};

Email.prototype.getIdEmail = function()
{
	return this.idEmail;
};

Email.prototype.setEmail = function(email)
{
	this.email = email;
	return this;
};

Email.prototype.getEmail = function()
{
	return (this.email)?this.email:"";
};

Email.prototype.render = function(element)
{
	var html = '';
		html += '<div class="form-group" data-index="' + this.getIndex() + '">';
		html += '<label for="lastName" class="col-sm-4 control-label">Email</label>';
		html += '<div class="col-sm-8 input-group">';
		html += '<input type="text" class="form-control email" id="email" name="email" value="' + this.getEmail() + '">';
		html += '<span class="input-group-btn">';
		html += '<button type="button" class="btn btn-danger" ><i class="fa fa-minus"></i> </button>';
		html += '</span>';
		html += '</div>';
		html += '</div>';
		
	element.append(html);
};