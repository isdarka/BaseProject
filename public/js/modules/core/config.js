/**
 * @autor isdarka
 * @created Dec 09, 2013, 1:48:12 PM
 * 
 */

$(document).ready(function() {
	$("input[type=checkbox]").click(function(){
		var idAction = $(this).data("id-action");
		var idRole = $(this).data("id-role");
		var allow = 0;
		if($(this).is(":checked"))
			allow = 1;
		
		$.ajax({
			type : "POST",
			url : baseUrl + '/core/core/set-privilege',
			data : {
				idAction : idAction,
				idRole : idRole,
				allow : allow
			},
			success : function(data, textStatus, jqXHR) {
				if (data.status) {
					
				} else {
					
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				
			}
		});
	});
});