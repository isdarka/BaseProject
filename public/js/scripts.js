/**
 * @autor isdarka
 * @created Nov 25, 2013, 8:54:09 PM
 * 
 */

//ProgressBar Ajax
var ajaxSend = 0;
var complete = 0;
var ajaxBar = true;
$(document).ajaxSend(function(){
	ajaxSend++;
});

$(document).ajaxStart(function(){
	if(ajaxBar)
	{
		$("#progressBar").show(0);
		$("#progressBar .progress-bar").width("0%");
	}
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
	

	$(".gear").bind('mouseover',function(event){
    	$(this).find("i").addClass("fa-spin");
    }).bind('mouseleave',function(){
    	$(this).find("i").removeClass("fa-spin");
    });
	
//	Multiselect
	$('.multiselect').multiselect();
	
	
	
//	Messages
	
	$("#newMessage").click(function(e){
		e.preventDefault();
		$("#sendMessageModal").modal("show");
	});
	
	$("#saveSendMessage").click(function(){
		try {
			var idUsers = $("#messageUsers").val();
			
			if($("#sendMessageForm").valid())
			{
				var subject = $("#subject").val();
				var body = $("#body").val();
				
				$.ajax({
					type: "POST",
					url: baseUrl +  '/core/message/save-message',
					data: {
						idUsers : idUsers,
						subject : subject,
						body : body
					},
					success: function(data){
						if(data.status)
							new Messages(1, data.msn);
						else
							new Messages(2, data.msn);
						$("#sendMessageModal").modal("hide");
					},
					error : function(jqXHR, textStatus, errorThrown){
						throw textStatus;
					}
				});
			}
		} catch (e) {
			new Messages(2, e);
		}
		
	});
	
	function hasMessages()
	{
		ajaxBar = false;
		$.ajax({
			type: "POST",
			url: baseUrl +  '/core/message/has-messages',
			data: {
			},
			success: function(data){
				ajaxBar = true;
				$("#notification").find(".badge").text("");
				if(data.status)
					if(data.messages > 0){
						$("#notification").find(".badge").text(data.messages);
						$(".msnNotifications").find(".dropdown-header").find("a").text('You have ' + data.messages + ' new notifications');
					}
				
				
				 setTimeout(hasMessages,15000);
				 
			},
			error : function(jqXHR, textStatus, errorThrown){
				ajaxBar = true;
			}
		});
	}
	hasMessages();

	$("#notification").click(function(e){
		try {
			$.ajax({
				type: "POST",
				url: baseUrl +  '/core/message/get-messages',
				data: {
				},
				success: function(data){
					if(data.status){
						var userAvatarCollection = new UserAvatarCollection();
						$.each(data.userAvatars, function( index, item ) {
							var userAvatar = new UserAvatar();
								userAvatar.setIdUser(item.idUser);
								userAvatar.setAvatar(item.avatar);
								
							userAvatarCollection.append(userAvatar);
						});

						var messageCollection = new MessageCollection();
						$.each(data.messages, function( index, item ) {
							var message = new Message();
							message.setIdMessage(item.id_message);
							message.setStatus(item.status);
							message.setTimestamp(item.timestamp);
							message.setSubject(item.subject);
							message.setMessage(item.message);
							message.setUserAvatar(userAvatarCollection.getByIndex(item.id_user));
							messageCollection.append(message);
						});
					}else
						new Messages(2, data.msn);
					 
				},
				error : function(jqXHR, textStatus, errorThrown){
				}
			});
		} catch (e) {
		}
	});

	$(".msnNotifications").on("click", ".readMessage", function(e){
		e.preventDefault();
		try {
			var index = $(this).closest("li").data("index");
			
			$.ajax({
				type: "POST",
				url: baseUrl +  '/core/message/get-message',
				data: {
					idMessage : index
				},
				success: function(data){
					if(data.status){
						var userAvatar = new UserAvatar();
						userAvatar.setIdUser(data.message.id_user);
						userAvatar.setAvatar(data.userAvatar.path + "/" + data.userAvatar.name);
					
						var message = new Message();
							message.setIdMessage(data.message.id_message);
							message.setStatus(data.message.status);
							message.setTimestamp(data.message.timestamp);
							message.setSubject(data.message.subject);
							message.setMessage(data.message.message);
							message.setUserAvatar(userAvatar);
							
						message.renderFullMessage($("#readMessageModal div.modal-dialog div.modal-content div.modal-body"));
						$("#readMessageModal").modal("show");
					}else
						new Messages(2, data.msn);
					
				},
				error : function(jqXHR, textStatus, errorThrown){
				}
			});
			
			
		} catch (e) {
			console.log(e);
		}
	});
	
});