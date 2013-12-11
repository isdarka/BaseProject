function Person()
{
	this.name;
}
Person.prototype = new Bean();
Person.prototype.constructor = Person;

/**
 * 
 * @param name
 */
Person.prototype.setName = function(name)
{
	this.name = name;
};






var person = new Person();
person.setIndex("2W");
person.setName("demo");


var collection = new Collection();
collection.append(person);
console.log(collection.getHidden());