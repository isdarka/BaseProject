/**
 * @autor isdarka
 * @created Dec 23, 2013, 3:21:32 PM
 * 
 */

function File()
{
	this.idFile;
	this.name;
	this.path;
}

File.prototype = new Bean();
File.prototype.constructor = File;

File.prototype.getIndex = function()
{
	return this.idFile;
};

File.prototype.setIdFile = function(idFile)
{
	this.idFile = idFile;
	return this;
};

File.prototype.getIdFile = function()
{
	return this.idFile;
};

File.prototype.setName = function(name)
{
	this.name = name;
	return this;
};

File.prototype.getName = function()
{
	return this.name;
};

File.prototype.setPath = function(path)
{
	this.path = path;
	return this;
};

File.prototype.getPath = function()
{
	return this.path;
};