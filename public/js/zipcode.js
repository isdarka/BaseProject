/**
 * @autor isdarka
 * @created Dic 13, 2013, 10:04:09 PM
 * 
 */

if (!jQuery) { throw new Error("zipcode requires jQuery"); }

$.fn.zipcode = function(options)
{
	var settings = $.extend({
		zipcode: "#zipcode",
		neighborhood: "#neighborhood",
		settlement: "#settlement",
		city: "#city",
		state: "#state",
		url: "hostname"
	}, options );
	
	return this.each(function() {
		
		/**
		 * @param {string} value
		 */
		function checkURL(value) {
     	    var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.|http:\/\/){1}([0-9A-Za-z]+\.)");
     	    if (urlregex.test(value)) {
     	        return (true);
     	    }
     	    return (false);
		}
		
		/**
		 * @throws 
		 */
		function checkOptions()
		{
     		if(settings.url == "hostname")
     			throw new Error("Please define URL");
     		if(!checkURL(settings.url))
     			throw new Error("URL no valid");
		}
		
		/**
		 * 
		 */
		$(this).keypress(function(event){
			if(event.keyCode == 13){
				event.preventDefault();
				search($(this).val());
				return false;
			}
			
			return true;
		
		});
		
		/**
		 * @param {string} zipcode
		 */
		function search(zipcode)
		{
			$.ajax({
				type: "POST",
				url: settings.url,
				data: {zipcode: zipcode},
				success: process,
				error:function(jqXHR, textStatus, errorThrown)
    			{
					throw new Error(textStatus + ": " + errorThrown);
    			}
			});
		}
		
		/**
		 * @param {Object} data
		 */
		function process(data)
		{
			var neighborhoods = new Array();
			var settlements = new Array();
			var cities = new Array();
			var states = new Array();
			
			$.each(data, function(index,value){
				neighborhoods.push(value.d_asenta);
				settlements.push(value.D_mnpio);
				cities.push(value.d_ciudad);
				states.push(value.d_estado);
			});
			neighborhoods = unique(neighborhoods).sort();
			settlements = unique(settlements).sort();
			cities = unique(cities).sort();
			states = unique(states).sort();
			
			
			render($(settings.neighborhood), neighborhoods);
			render($(settings.settlement), settlements);
			render($(settings.city), cities);
			render($(settings.state), states);
			
			
		}
		
		/**
		 * @param {Array} array 
		 */
		function unique(array){
			return $.grep(array, function(element, index){
    	        return index == $.inArray(element, array);
    	    });
    	}
		
		/**
		 * @param {jQuery} element
		 * @param {Array} values
		 */
		function render(element, values)
		{
			var newElement;
			if(values.length > 1)
				newElement = createCombo(values);
			else
				newElement = createInput(values[0]);
			
			newElement.prop('id', element.prop('id'));
			newElement.prop('name', element.prop('name'));
			newElement.prop('class', element.prop('class'));
			element.replaceWith(newElement);
		}
		
		/**
		 * @param {Array} values
		 * @returns {jQuery} element
		 */
		function createCombo(values)
		{
			var element = $('<select></select>');
			$.each(values, function(index,value){
				element.append($('<option></option>').val(value).text(value));
			});
			return element;
		}
		
		/**
		 * @param {string} value
		 * @returns {jQuery} element
		 */
		
		function createInput(value)
		{
			var element = $('<input type="text"/>');
			element.val(value);
			return element;
		}
	 });
};
