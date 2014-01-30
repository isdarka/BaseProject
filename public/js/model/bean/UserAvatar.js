/**
 *
 * @author isdarka
 */

function UserAvatar()
{
	this.idUser;
	this.avatar;
}

UserAvatar.prototype = new Bean();
UserAvatar.prototype.constructor = UserAvatar;

/**
 * 
 * @returns
 */
UserAvatar.prototype.getIndex = function()
{
	return this.idUser;
};

/**
 * 
 * @param idUser
 * @returns
 */
UserAvatar.prototype.setIdUser = function(idUser)
{
	this.idUser = idUser;
	return this.idUser;
};

/**
 * 
 * @returns
 */
UserAvatar.prototype.getIdUser = function()
{
	return this.idUser;
};

/**
 * 
 * @param avatar
 * @returns
 */
UserAvatar.prototype.setAvatar = function(avatar)
{
	this.avatar = avatar;
	return this.avatar;
};

/**
 * 
 * @returns
 */
UserAvatar.prototype.getAvatar = function()
{
	return this.avatar;
};