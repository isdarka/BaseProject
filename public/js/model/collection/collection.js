/**
 * @autor isdarka
 * @created Dec 11, 2013, 10:46:16 AM
 * 
 */

function Collection () {
	this.storage = new Object();
}

/**
 * 
 * @param {Bean} bean
 */
Collection.prototype.append = function(bean)
{
	try{
		if (bean instanceof Bean) {
			this.storage[bean.getIndex()] = bean;
		} else {
			throw "bean must be an instanceof Bean";
		}
	}catch(e){
		throw e;
	}
};

/**
 * 
 * @returns {Object}
 */
Collection.prototype.getStorage = function()
{
	return this.storage;
};

/**
 * 
 * @param index
 * @returns {Bean}
 */
Collection.prototype.getByIndex = function (index) {
	return this.storage[index]; 
};

/**
 * 
 * @returns {string}
 */
Collection.prototype.toJson = function () {
	return JSON.stringify(this.storage);
};

/**
 * 
 * @param index
 */
Collection.prototype.deleteByIndex = function(index) {
	this.storage[index] = undefined;
};

/**
 * 
 * @returns {String}
 */
Collection.prototype.getHidden = function()
{
	var hidden = "<input class='entries' type='hidden' name='" + this.getClassName() + "' value='" + this.toJson() + "'>";
	return hidden;
};

/**
 * 
 * @returns {Number}
 */
Collection.prototype.count = function()
{
	var count = 0;
	$.each(this.getStorage(), function(index, bean){
		if(bean instanceof Bean)
			count ++;
	});
	return count;
};


Collection.prototype.getClassName = function(){
	  var str = this.constructor.name;
	  var f = str.charAt(0).toLowerCase();
	  return f + str.substr(1);
};
