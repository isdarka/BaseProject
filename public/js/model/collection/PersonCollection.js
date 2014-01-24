/**
 * @autor isdarka
 * @created Dec 17, 2013, 3:29:53 PM
 * 
 */

function PersonCollection()
{
	
}

PersonCollection.prototype = new Collection();
PersonCollection.prototype.constructor = PersonCollection;

/**
 * @param {Person} person
 */
PersonCollection.prototype.append = function(person)
{
	try{
		if (person instanceof Person) {
			this.storage[person.getIndex()] = person;
			person.render($("#contacts"));
		} else {
			throw "person must be an instanceof Person";
		}
	}catch(e){
		throw e;
	}
};