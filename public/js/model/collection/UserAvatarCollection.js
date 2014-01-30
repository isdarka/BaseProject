/**
 * @author isdarka
 */

function UserAvatarCollection()
{
}

UserAvatarCollection.prototype = new Collection();
UserAvatarCollection.prototype.constructor = UserAvatarCollection;

UserAvatarCollection.prototype.append = function(userAvatar)
{
	try{
		if (userAvatar instanceof UserAvatar) {
			this.storage[userAvatar.getIndex()] = userAvatar;
//			userAvatar.render($("#contacts"));
		} else {
			throw "userAvatar must be an instanceof UserAvatar";
		}
	}catch(e){
		throw e;
	}
};