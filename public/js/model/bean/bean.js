/**
 * @autor isdarka
 * @created Dec 11, 2013, 10:46:16 AM
 * 
 */

function Bean()
{
	this.index;		
}

/**
 * 
 * @returns
 */
Bean.prototype.getIndex = function()
{
	return this.index;
};

/**
 * 
 * @param index
 * @returns {Bean}
 */
Bean.prototype.setIndex = function(index)
{
	this.index = index;
	return this;
};