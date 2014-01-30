/**
 * @author isdarka
 */

function MessageCollection()
{
}

MessageCollection.prototype = new Collection();
MessageCollection.prototype.constructor = MessageCollection;


MessageCollection.prototype.append = function(message)
{
	try{
		if (message instanceof Message) {
			this.storage[message.getIndex()] = message;
			message.render($("#notification"));
		} else {
			throw "message must be an instanceof Message";
		}
	}catch(e){
		throw e;
	}
};