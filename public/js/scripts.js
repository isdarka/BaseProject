/**
 * @autor isdarka
 * @created Nov 25, 2013, 8:54:09 PM
 * 
 */

//ProgressBar Ajax
var ajaxSend = 0;
var complete = 0;
$(document).ajaxSend(function(){
	ajaxSend++;
});

$(document).ajaxStart(function(){
	$("#progressBar").show(0);
	$("#progressBar .progress-bar").width("0%");
});

$(document).ajaxStop(function(){
	$("#progressBar .progress-bar").width("100%");
	$("#progressBar").fadeOut(1500, function(){
		
	});
	
});

$(document).ajaxComplete(function(){
	complete++;
	var percentage = 0;
	percentage = (complete * 100)/ajaxSend;
	$("#progressBar .progress-bar").width(percentage + "%");
	if(percentage == 100)
		$("#progressBar .bar").delay(1000).width("0%");
});
// END ProgressBar Ajax

$(document).ready(function() {
//	$.widget.bridge('uibutton', $.ui.button);
//	$.widget.bridge('uitooltip', $.ui.tooltip);
	$("form.validate").each(function(){
		$(this).validate({		
			highlight : function(element) {
				$(element).closest("div.form-group").removeClass("has-success").addClass("has-error");
			},
			unhighlight: function( element, errorClass, validClass ) {
				$(element).closest("div.form-group").removeClass("has-error").addClass("has-success");
			},
			success : function(element) {
				$(element).closest("div.form-group").removeClass("has-error").addClass("has-success");
			},
			errorClass : "control-label",
			errorElement : "span",
			errorPlacement : function(error, element) {
				$(error).appendTo($(element).closest("div"));
			},
		});
	});
	
	$(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
	
//	ToolTip
	$('[data-toggle="tooltip"]').tooltip();
	
//	Zipcode
	$("#zipcode").zipcode({ url: baseUrl + "/core/index/zipcode" });
	
	
//	Tabs
	$('#tabs a:first').tab('show');
	$('#tabs a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	
//	Messages
	$("#alertMessages").click(function(e){
		e.preventDefault();
		$("#alertMessages").slideUp();
	});
	

});