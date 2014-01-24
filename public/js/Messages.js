/**
 * @autor isdarka
 * @created Dec 23, 2013, 2:52:58 PM
 * 
 */

function Messages(type, message)
{
	this.type = Number(type);
	this.message = message;
	this.style;
	this.typeString = "";
	this.setMessage();
}


Messages.prototype.getStyle = function()
{
	switch(this.type)
	{
		case 1:
			this.style = "alert-success";
			this.typeString = "Hecho";
		break;
		case 2:
			this.style = "alert-danger";
			this.typeString = "Error";
		break;
		case 3:
			this.style = "alert-info";
			this.typeString = "Noticia";
		break;
		case 4:
			this.style = "alert-warning";
			this.typeString = "Advertencia";
		break;
	}
};

Messages.prototype.removeStyles = function()
{
	$("#alertMessages").removeClass("alert-success");
	$("#alertMessages").removeClass("alert-danger");
	$("#alertMessages").removeClass("alert-info");
	$("#alertMessages").removeClass("alert-warning");
};

Messages.prototype.setMessage = function(){
	this.getStyle();
	this.removeStyles();
	$("#alertMessages").addClass(this.style);
	$("#alertMessages p").hide().html(this.message);
	$("#alertMessages strong").html(this.typeString);
	$("#alertMessages").css("top", "-5px");
	if(!$( "#alertMessages" ).is(":visible")){
		$("#alertMessages").slideUp(500, function(){
			$("#alertMessages").slideDown(500, function(){
				$("#alertMessages p").fadeIn(250, function(){
//					$("#alertMessages").effect( "bounce", {}, 1500);
				});
				
			});
		});
	}else{
		$("#alertMessages").slideDown(500, function(){
			$("#alertMessages p").fadeIn(250, function(){
//				$("#alertMessages").effect( "bounce", {}, 1500);
			});
		});
	}
};

