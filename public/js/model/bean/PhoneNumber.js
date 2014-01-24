/**
 * @autor isdarka
 * @created Dec 17, 2013, 1:05:22 PM
 * 
 */

function PhoneNumber()
{
	this.idPhoneNumber;
	this.area;
	this.number;
	this.extension;
	this.type;
	this.typeString;
}

PhoneNumber.prototype = new Bean();
PhoneNumber.prototype.constructor = PhoneNumber;

PhoneNumber.prototype.getIndex = function()
{
	return this.idPhoneNumber + "-" + this.area + "-" + this.number + "-" + this.type + "-" + this.extension;
};

PhoneNumber.prototype.setIdPhoneNumber = function(idPhoneNumber)
{
	this.idPhoneNumber = idPhoneNumber;
	return this;
};

PhoneNumber.prototype.getIdPhoneNumber = function()
{
	return (this.idPhoneNumber)?this.idPhoneNumber:"";
};

PhoneNumber.prototype.setArea = function(area)
{
	this.area = area;
	return this;
};

PhoneNumber.prototype.getArea = function()
{
	return (this.area)?this.area:"";
};

PhoneNumber.prototype.setNumber = function(number)
{
	this.number = number;
	return this;
};

PhoneNumber.prototype.getNumber = function()
{
	return (this.number)?this.number:"";
};

PhoneNumber.prototype.setExtension = function(extension)
{
	this.extension = extension;
	return this;
};

PhoneNumber.prototype.getExtension = function()
{
	return (this.extension)?this.extension:"";
};

PhoneNumber.prototype.setType = function(type)
{
	this.type = type;
	return this;
};

PhoneNumber.prototype.getType = function()
{
	return this.type;
};

PhoneNumber.prototype.setTypeString = function(typeString)
{
	this.typeString = typeString;
	return this;
};

PhoneNumber.prototype.getTypeString = function()
{
	return (this.typeString)?this.typeString:"";
};

/**
 * @param {jQuery} element
 */
PhoneNumber.prototype.render = function(element)
{
	
	var html = '';
		html += '<tr data-type="' + this.getType() + '" data-type-string="' + this.getTypeString() + '" date-index="' + this.getIndex() + '">';
		html += '<td>' + this.getTypeString() + '</td>';
		html += '<td><input type="text" class="form-control  number area" id="area" name="area"  placeholder="Area" value="' + this.getArea() + '"></td>';
		html += '<td>';
		html += '<input type="text" class="form-control  number phoneNumber" id="number" name="number" placeholder="Number" value="' + this.getNumber() + '">';
		html += '</td>';
		html += '<td>';
		html += '<input type="text" class="form-control  number extension" id="extension" name="extension" placeholder="Extension" value="' + this.getExtension() + '">';
		html += '</td>';
		html += '<td><a class="btn btn-danger" ><i class="fa fa-minus"></i></a></td>';
		html += '</tr>';
	
	var exist = element.find('[data-index="' + this.getIndex() + '"]');
	if(exist.length > 0)
	{
		exist.after(html);
		exist.remove();
	}else
		element.append(html);
};
