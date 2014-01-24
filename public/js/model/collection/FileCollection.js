/**
 * @autor isdarka
 * @created Dec 23, 2013, 3:26:42 PM
 * 
 */

function FileCollection()
{
}

FileCollection.prototype = new Collection();
FileCollection.prototype.constructor = FileCollection;

/**
 * @param {File} file
 */
FileCollection.prototype.append = function(file)
{
	try{
		if (file instanceof File) {
			this.storage[file.getIndex()] = file;
//			file.render($("#customers"));
		} else {
			throw "file must be an instanceof File";
		}
	}catch(e){
		throw e;
	}
};