/**
 * @autor isdarka
 * @created Jan 28, 2013, 17:48:12 PM
 * 
 */
$(document).ready(function() {
	
	// Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,

        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
    

    function updatePreview(c)
    {
      if (parseInt(c.w) > 0)
      {
        var rx = xsize / c.w;
        var ry = ysize / c.h;

        $pimg.css({
          width: Math.round(rx * boundx) + 'px',
          height: Math.round(ry * boundy) + 'px',
          marginLeft: '-' + Math.round(rx * c.x) + 'px',
          marginTop: '-' + Math.round(ry * c.y) + 'px'
        });
        
        
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
      }
    };
	
	$("#upload").click(function(){
		if($("#imageForm").valid())
		{
			var fileData = new FormData();
			var inputFileImage = document.getElementById("image");
			var file = inputFileImage.files[0];
			fileData.append("File", file);
			$.ajax({
				url : baseUrl + "/core/user/upload",
				type:'POST',
	            contentType:false,
	            data:fileData,
	            processData:false,  
	            cache:false,
				success : function(data, textStatus, jqXHR) {
					if(data.status){
						new Messages(1, data.msn);

						$pimg.prop("src", baseUrl + "/" + data.file);
						
						var width = 0;
						var height = 0;
						
						$('#target').prop("src", baseUrl + "/" + data.file);
						$('#target').load(function(){
							width = this.width;
							height = this.height;
							if (width > 500)
							{
								var percentage = (500 * 100) / width;
								percentage = width/percentage;
								
								width = 500;
								
								height = (percentage * height)/100;
							}
							$(this).prop("width", width).prop("height", height);
							
							$(this).Jcrop({
							      onChange: updatePreview,
							      onSelect: updatePreview,
							      aspectRatio: xsize / ysize
							    },function(){
							      // Use the API to get the real image size
							      var bounds = this.getBounds();
							      boundx = bounds[0];
							      boundy = bounds[1];
							      // Store the API in the jcrop_api variable
							      jcrop_api = this;
	
							      // Move the preview into the jcrop container for css positioning
							      $preview.appendTo(jcrop_api.ui.holder);
							    });
						});
						
						 
						 $("#imageForm").fadeOut(500, function(){
							 $(".panel").fadeIn();
						 });
					}
					else
						new Messages(2, data.msn);
				},
				dataType : 'json',
				error : function(jqXHR, textStatus, errorThrown) {
					throw textStatus + ":" + errorThrown;
				}
			});
		}
	});
	
	


});
