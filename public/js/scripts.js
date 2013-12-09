/**
 * @autor isdarka
 * @created Nov 25, 2013, 8:54:09 PM
 * 
 */
$(document).ready(function() {
	
//	$.widget.bridge('uibutton', $.ui.button);
//	$.widget.bridge('uitooltip', $.ui.tooltip);
	
	$("form.validate").validate({
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
	
	$(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
	
//	ToolTip
	$('[data-toggle="tooltip"]').tooltip();
});