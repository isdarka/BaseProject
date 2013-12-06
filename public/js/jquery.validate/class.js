/**
 * @autor isdarka
 * @created Nov 26, 2013, 2:18:21 PM
 * 
 */
$(document).ready(function() {
	jQuery.validator.addClassRules("name", {
		required: true,
		minlength: 2
	});
});
