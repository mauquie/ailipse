(function($) {
	var colors = {
		aqua : [0, 255, 255, 1],
		azure : [240, 255, 255, 1],
		beige : [245, 245, 220, 1],
		black : [0, 0, 0, 1],
		blue : [0, 0, 255, 1],
		brown : [165, 42, 42, 1],
		cyan : [0, 255, 255, 1],
		darkblue : [0, 0, 139, 1],
		darkcyan : [0, 139, 139, 1],
		darkgrey : [169, 169, 169, 1],
		darkgreen : [0, 100, 0, 1],
		darkkhaki : [189, 183, 107, 1],
		darkmagenta : [139, 0, 139, 1],
		darkolivegreen : [85, 107, 47, 1],
		darkorange : [255, 140, 0, 1],
		darkorchid : [153, 50, 204, 1],
		darkred : [139, 0, 0, 1],
		darksalmon : [233, 150, 122, 1],
		darkviolet : [148, 0, 211, 1],
		fuchsia : [255, 0, 255, 1],
		gold : [255, 215, 0, 1],
		green : [0, 128, 0, 1],
		indigo : [75, 0, 130, 1],
		khaki : [240, 230, 140, 1],
		lightblue : [173, 216, 230, 1],
		lightcyan : [224, 255, 255, 1],
		lightgreen : [144, 238, 144, 1],
		lightgrey : [211, 211, 211, 1],
		lightpink : [255, 182, 193, 1],
		lightyellow : [255, 255, 224, 1],
		lime : [0, 255, 0, 1],
		magenta : [255, 0, 255, 1],
		maroon : [128, 0, 0, 1],
		navy : [0, 0, 128, 1],
		olive : [128, 128, 0, 1],
		orange : [255, 165, 0, 1],
		pink : [255, 192, 203, 1],
		purple : [128, 0, 128, 1],
		violet : [128, 0, 128, 1],
		red : [255, 0, 0, 1],
		silver : [192, 192, 192, 1],
		white : [255, 255, 255, 1],
		yellow : [255, 255, 0, 1],
		transparent :  [255, 255, 255, 1]
	};
	
	var browserPrefixes = ["webkit", "moz", "ms", "o"];
	
	function ImageBaseUrl() {
		return eTERPSClient.Utilities.GetRefUrl() + "images/ColorPicker/";
	}
	
	function ParseColor(color) {
	/// <summary>Parses the RGBA color values for a string color,
	/// returning the results in a four-element array.</summary>
	/// <param name="color">The string color value (e.g. "red", "rgb(50, 75, 100)") to parse for RGBA values.</param>.
		
		color = color.toLowerCase();
		
		// Look for rgb(num,num,num)
		if (result = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color))
			return [parseInt(result[1],10), parseInt(result[2],10), parseInt(result[3],10), 1];
		
		// Look for rgba(num,num,num,num)
		if (result = /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([\.0-9]+)\s*\)/.exec(color))
			return [parseInt(result[1],10), parseInt(result[2],10), parseInt(result[3],10), parseFloat(result[4])];
		
		// Look for rgb(num%,num%,num%)
		if (result = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(color))
			return [parseFloat(result[1])*2.55, parseFloat(result[2])*2.55, parseFloat(result[3])*2.55, 1];
		
		// Look for #a0b1c2
		if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color))
			return [parseInt(result[1],16), parseInt(result[2],16), parseInt(result[3],16), 1];
		
		// Look for #fff
		if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color))
			return [parseInt(result[1]+result[1],16), parseInt(result[2]+result[2],16), parseInt(result[3]+result[3],16), 1];
		
		// Otherwise, we're most likely dealing with a named color.
		// Note that an invalid color will return white
		var result = colors[$.trim(color)];
		return result ? result : [255, 255, 255, 1];
	}
	jQuery.parseColor = ParseColor;
	
	function rgbToHsl(r, g, b) {
			r /= 255, g /= 255, b /= 255;
			var max = Math.max(r, g, b), min = Math.min(r, g, b);
			var h, s, l = (max + min) / 2;

			if(max == min){
					h = s = 0; // achromatic
			}else{
					var d = max - min;
					s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
					switch(max){
							case r: h = (g - b) / d + (g < b ? 6 : 0); break;
							case g: h = (b - r) / d + 2; break;
							case b: h = (r - g) / d + 4; break;
					}
					h /= 6;
			}

			return [h, s, l];
	}
	
	function hslToRgb(h, s, l){
			var r, g, b;

			if(s == 0){
					r = g = b = l; // achromatic
			}else{
					function hue2rgb(p, q, t){
							if(t < 0) t += 1;
							if(t > 1) t -= 1;
							if(t < 1/6) return p + (q - p) * 6 * t;
							if(t < 1/2) return q;
							if(t < 2/3) return p + (q - p) * (2/3 - t) * 6;
							return p;
					}

					var q = l < 0.5 ? l * (1 + s) : l + s - l * s;
					var p = 2 * l - q;
					r = hue2rgb(p, q, h + 1/3);
					g = hue2rgb(p, q, h);
					b = hue2rgb(p, q, h - 1/3);
			}

			return [r * 255, g * 255, b * 255];
	}
	
	// The color picker popup.
	var colorPicker;
	function CreateColorPicker() {
		function UpdateColorBlock(percentage) {
			var red, green, blue;
			
			// Determine the appropriate RGB values for this spot on the color bar.
			if (percentage < 100 / 6) {
				red = 255;
				green = Math.floor(percentage * 255 / (100 / 6));
				blue = 0;
			}
			else if (percentage < 100 / 3) {
				red = 255 - Math.floor((percentage - 100 / 6) * 255 / (100 / 6));
				green = 255;
				blue = 0;
			}
			else if (percentage < 50) {
				red = 0;
				green = 255;
				blue = Math.floor((percentage - 100 / 3) * 255 / (100 / 6));
			}
			else if (percentage < 200 / 3) {
				red = 0;
				green = 255 - Math.floor((percentage - 50) * 255 / (100 / 6));
				blue = 255;
			}
			else if (percentage < 500 / 6) {
				red = Math.floor((percentage - 200 / 3) * 255 / (100 / 6));
				green = 0;
				blue = 255;
			}
			else {
				red = 255;
				green = 0;
				blue = 255 - Math.floor((percentage - 500 / 6) * 255 / (100 / 6));
			}
			
			// Note the new base color.
			baseColor = [red, green, blue];
			
			// Update the color black background to match the selected color base.
			colorBlock.css("background", "radial-gradient(circle at top right, rgb(" + red + ", " + green +
				", " + blue + "), transparent 75%)," +
				"linear-gradient(white, rgb(225, 225, 255) 25%, " +
				"rgb(175, 175, 175) 50%, rgb(100, 100, 100) 75%, black)");
			
			// Firefox returns "" when the gradient was set correctly using colorBlock.css("background").
			if (!colorBlock[0].style.background) {
				colorBlock.css({
					"background-color" : "rgb(" + red + ", " + green + ", " + blue + ")",
					"background-image" : "url('" + ImageBaseUrl() + "ColorBlock.png')"
				});
			}
		}
		
		// Color picker panel.
		colorPicker = $("<div>", {
			id : "ColorPicker",
			css : {
				position : "absolute",
				background : "rgb(96,125,139)",
				padding : 4,
				"border-radius" : 5,
				"box-shadow" : "0 0 25px rgb(80, 80, 80)",
				"z-index" : 5000,
				height : 232,
			}
		}).appendTo(document.body);
		
		// Inner container box.
		var box = $("<div>", {
			css : {
				border : "1px solid black",
				background : "rgb(230, 230, 230)",
				padding : 7
			}
		}).appendTo(colorPicker);
		
		// Color block.
		var colorBlock = $("<div>", {
			css : {
				height : 150,
				width : 150,
				border : "1px solid gray",
				position : "absolute"
			}
		}).appendTo(box)
			.mousedown(function(event) {
				// Ignore right clicks.
				if (event.which !== 1)
					return;
				
				var pos = colorBlock.offset(),
					height = colorBlock.height(),
					width = colorBlock.width();
				
				// Updates the dot position.
				function UpdatePosition(left, top) {
					colorDot.css({
						left : left - pos.left,
						top : top - pos.top
					});
					
					UpdateColor();
				}
				
				// Event function during mouse move.
				var mouseMove = function(event) {
					UpdatePosition(event.clientX, event.clientY);
				};
				
				// Event function for mouse up; ends the mousedown events.
				var mouseUp = function() {
					colorBlock
						.unbind("mousemove", mouseMove)
						.unbind("mouseup", mouseUp);
				};
				
				// Attach events.
				colorBlock
					.mousemove(mouseMove)
					.mouseup(mouseUp);
				
				UpdatePosition(event.clientX, event.clientY);
				
				// Cancel normal mouse click of the color box.
				return false;
			});
		
		// Color dot.
		var colorDot = $("<div>", {
			css : {
				position : "absolute",
				height : 3,
				width : 3,
				margin : -2,
				background : "black",
				border : "1px solid white",
				"border-radius" : 10
			}
		}).appendTo(colorBlock);
		
		// Color bar.
		var colorBar = $("<div>", {
			css : {
				height: 152,
				width: 36,
				"margin-left" : 170
			}
		}).appendTo(box);
		
		// Use a linear gradient to draw the box, where available.
		colorBar.css("background", "linear-gradient(" +
			"rgb(255, 0, 0)," +
			"rgb(255, 255, 0)," +
			"rgb(0, 255, 0)," +
			"rgb(0, 255, 255)," +
			"rgb(0, 0, 255)," +
			"rgb(255, 0, 255)," +
			"rgb(255, 0, 0)" +
		")");
		
		// If a linear gradient isn't available, use a background image.
		if (!colorBar[0].style.background)
			colorBar.css("background", "url('" + ImageBaseUrl() + "ColorBar.png')");
		
		var baseColor = [255, 0, 0];
		
		// Color bar drag bar.
		var colorBarDragger = $("<div>", {
			css : {
				position: "absolute",
				height : 5,
				width : 38,
				border : "1px solid black",
				"border-radius" : 10,
				"margin-left" : -2,
				background : "rgba(255, 255, 255, 0.5)",
				cursor : "n-resize"
			}
		}).appendTo(colorBar);
		
		// Drag + click events of the right color bar.
		colorBar.mousedown(function(event) {
			// Ignore right clicks.
			if (event.which !== 1)
				return;
			
			var pos = colorBar.offset(),
				maxTop = pos.top + colorBar.height();
			
			// Updates the position of the slider, and updates the color picker accordingly.
			function UpdatePosition(top) {
				if (top < pos.top)
					top = pos.top;
				else if (top > maxTop)
					top = maxTop;
				
				colorBarDragger.css({
					top : top - pos.top + 9		// Add 9 for parent panels' padding.
				});
				
				// Calculate the percentage of the slider.
				var percentage = (top - pos.top) * 100 / 152;
				
				// Update the main color block.
				UpdateColorBlock(percentage);
				
				// Update the picker's selected color.
				UpdateColor();
			}
			
			// Event function during mouse move.
			var mouseMove = function(event) {
				UpdatePosition(event.clientY);
			};
			
			// Event function for mouse up; ends the mousedown events.
			var mouseUp = function() {
				colorBar.unbind("mousemove", mouseMove);
				$(document).unbind("mouseup", mouseUp);
			};
			
			// Attach events.
			colorBar.mousemove(mouseMove);
			$(document).mouseup(mouseUp);
			
			// Update to the clicked position.
			UpdatePosition(event.clientY);
			
			// Cancel normal mouse click of the color box.
			return false;
		});
		
		// Opacity slider.
		var opacity;
		
		// If range input types are supported by the browser...
		// Note that all browsers that support range inputs also accept rgba() color values.
		if ($("<input>", { type : "range" }).get(0).type === "range") {
			opacity = $("<input>", {
				id : "colorOpacity",
				type : "range",
				min : 0,
				max : 1,
				step : .01,
				css : {
					display : "block",
					"background-color": "rgb(96,125,139)",
					width : "100%",
					margin : 11,
					"margin-bottom" : 23,
					right : 10
				},
				change : UpdateColor
			}).appendTo(box);
			opacity.addClass("mdl-slider mdl-js-slider is-lowest-value is-upgraded");
		}
		else {
			// The browser doesn't support range inputs, so just use a static opacity value of 1.
			opacity = $("<input>", {
				type : "hidden",
				val : "1"
			}).appendTo(box);
		}
		
		// Sample color block.
		var sampleBlock = $("<div>", {
			css : {
				"float" : "left",
				height : 19,
				width : 19,
				border : "1px solid rgb(160, 160, 160)"
			}
		}).appendTo(box);
		
		// Color as text.
		var tbColor = $("<span>", {
			css : {
				"padding-left" : 10
			}
		}).appendTo(box);
		
		// Clear floating color block
		$("<div>", {
			css : {
				clear : "both"
			}
		}).appendTo(box);
		
		// Updates the selected color of the color picker.
		function UpdateColor() {
			var dotPos = colorDot.position(),
				red, green, blue,
				colorOpacity = Math.floor(parseFloat(opacity.val()) * 100) / 100;
			
			// The % of contribution from the color bar base color.
			var radialPercentage = Math.max(0, 1 - Math.sqrt(Math.pow(150 - dotPos.left, 2) +
				Math.pow(dotPos.top, 2)) / 100);
			
			// Add the radial (base) color.
			red = baseColor[0] * radialPercentage;
			green = baseColor[1] * radialPercentage;
			blue = baseColor[2] * radialPercentage;
			
			// The % of gray contribution to the color from the linear (white-to-black) gradient.
			var grayPercentage = dotPos.top / 150;
			
			// The linear gradient is not uniform, so divide by its slopes.
			var prevMax = 0;
			$.each([
				{start : 255, max : .25, slope : 30},
				{start : 225, max : .5, slope : 60},
				{start : 175, max : .75, slope : 75},
				{start : 100, max : 1.0001, slope : 100}
			], function(index, slope) {
				if (grayPercentage < slope.max && grayPercentage >= prevMax) {
					var grayAmount = (slope.start - (grayPercentage - prevMax) /
						(slope.max - prevMax) * slope.slope) * (1 - radialPercentage);
					
					red += grayAmount;
					green += grayAmount;
					blue += grayAmount;
				}
				
				prevMax = slope.max;
			});
			
			// Valid RGB values only (decimals aren't accepted).
			red = Math.floor(red);
			green = Math.floor(green);
			blue = Math.floor(blue);
			
			// Set the picker's color.
			colorPicker.setColor("rgb" + (colorOpacity < 1 ? "a" : "") +
				"(" + red + ", " + green + ", " + blue +
				(colorOpacity < 1 ? ", " + colorOpacity : "") + ")");
		}
		
		colorPicker.setColor = function(color) {
			var init = color ? false : true;
			
			// Parse the color to an rgba value.
			color = ParseColor(color ? color : colorPicker.tb.val());
			
			// Determine rgb(a) color value.
			var textColor = "rgb" + (color[3] < 1 ? "a" : "") +
				"(" + color[0] + ", " + color[1] + ", " + color[2] +
				(color[3] < 1 ? ", " + color[3] : "") + ")";
			
			// Set color picker elements to the selected color.
			opacity.val(color[3]);
			sampleBlock.css("background", textColor);
			tbColor.html(textColor);
			colorPicker.tb
				.val(textColor)
				.css("background", textColor);
			
			// If a selected event was passed in the color picker's options...
			if (!init && colorPicker.tb.get(0).options.selected) {
				// Reference the textbox and check its value in half a second.
				var tb = colorPicker.tb.get(0);
				setTimeout(function() {
					// If the user hasn't changed the value in the last 1/2 second, invoke the selected function.
					if (tb.value === textColor) {
						tb.options.selected(tb, color);
					}
				}, 500);
			}
			
			// If first showing the color picker for an element, set the base color.
			if (init) {
				// Calculate the base color.
				var hsl = rgbToHsl(color[0], color[1], color[2]),
					base = hslToRgb(hsl[0], 1, .5);
				
				// Note the base color.
				baseColor = [Math.floor(base[0]), Math.floor(base[1]), Math.floor(base[2])];
				
				var colorScrollTop = 0;
				
				if (baseColor[0] === 255) {
					if (baseColor[1] > 0)
						colorScrollTop = 150 * (baseColor[1] / 255 / 6);
					else
						colorScrollTop = 150 * (5 / 6 + (1 - baseColor[2] / 255) / 6);
				}
				
				else if (baseColor[1] === 255) {
					if (baseColor[0] > 0)
						colorScrollTop = 150 * (1 / 6 + (1 - baseColor[0] / 255) / 6);
					else
						colorScrollTop = 150 * (1 / 3 + baseColor[2] / 255 / 6);
				}
				
				// baseColor[2] === 255
				else {
					if (baseColor[0] > 0)
						colorScrollTop = 150 * (2 / 3 + baseColor[0] / 255 / 6);
					else
						colorScrollTop = 150 * (1 / 2 + (1 - baseColor[1] / 255) / 6);
				}
				
				colorBarDragger.css("top", colorScrollTop);
				
				UpdateColorBlock(colorScrollTop / 1.45);
			}
		}
	}
	
	$(function() {
		// Checks if we should close the color picker off a mouse click.
		function ClickCheck(event) {
			var el = $(event.target);
			
			// If a click outside the textbox and color picker, close the color picker.
			if (!el.hasClass("ColorPicker") && el.closest("#ColorPicker").length === 0) {
				colorPicker.hide();
				$(document).unbind("click", ClickCheck);
			}
		}
		
		// When focusing on any color picker element...
		$(document.body)
			.on("focus", ".ColorPicker", function() {
				// Initialize the color picker block, if it doesn't yet exist.
				if (!colorPicker)
					CreateColorPicker();
				
				// Color picker element + position.
				var el = $(this),
					pos = el.offset();
				
				// Calculate color picker position.
				var colorPickerPos = {
					left : Math.min(Math.max(pos.left, 15), $(window).width() - colorPicker.width() - 15),
					top : Math.max(pos.top - el.height() - colorPicker.height(), 15)
				};
				
				// If off the top of the screen, move to below the element.
				if (colorPickerPos.top < 0)
					colorPickerPos.top = pos.top + el.height();
				
				// Show + position the color picker popup.
				colorPicker
					.css(colorPickerPos)
					.show();
				
				// Toggle opacity slider, per the color picker options.
				$("#colorOpacity")[this.options.noOpacity ? "hide" : "show"]();
				
				// Set the color of the color picker to that of the color picker element.
				colorPicker.tb = el;
				colorPicker.setColor();
				
				// Check clicks to see if we need to hide the color picker.
				$(document).click(ClickCheck);
			});
	});
	
	/*
		Define the color picker as a jQuery function.
	*/
	$.fn.colorPicker = function(options) {
		// Setup the default options object.
		options = options ? options : {};
		
		return this.each(function() {
			// Parse the rgba value for this textbox.
			var color = ParseColor(this.value),
				rgbaColor = "rgba(" + color[0] + ", " + color[1] + ", " + color[2] + ", " + color[3] + ")";
			
			// Set the textbox value to rgba.
			this.value = rgbaColor;
			this.style.color = "transparent";
			
			this.options = options;
			
			try {
				this.style.background = rgbaColor;
			}
			catch (e) {
				this.style.background = "rgb(" + color[0] + ", " + color[1] + ", " + color[2] + ")";
			}
			
			$(this).addClass("ColorPicker");
		});
	};
})(jQuery);
		$(function() {
			$("#bgColor").colorPicker();
		});
		$(function() {
			$("#constructeurColor").colorPicker();
		});
		$(function() {
			$("#clientColor").colorPicker();
		});
