
;(function ($) {
	"use strict";
	$.cromares = function(el) {
		var croma = $(el),
			adder = '',
			themess = '',
			isBlockOn = 0,
			alertLength = 0,
			now = new Date(),
			dateB = Math.floor(now / 1000),
			clickAddr = croma.find('.bookingcalholder').attr('rel'),
			lodder = croma.find('.cro_backloader'),

		methods = {
			init: function() {
				methods.fadeMng(lodder, 1000);
				methods.deleGater();
			},
			fadeMng: function(el,time) {
				var $this 		= $(el),
					initski 	=  (($this).is(':visible')) ? $this.delay(time).fadeOut('slow') : $this.delay(time).fadeIn('slow');
			},
			deleGater: function() {
				croma.delegate('.helphelp','mouseenter mouseleave', function() {
					var target	= $(this).parents('.sideinner').find('p.helper');
					methods.fadeMng(target,0);
				});

				croma.on("click", ".cro_itemplusitems span", function(){ 
					methods.skedler();					
				});

				croma.on("click", ".cro_t_itemplusitems span", function(){ 
					methods.t_skedler();					
				});

				croma.on("click", ".cro_listdeleteone", function(){ 
					var $this = $(this),
						counts = ('.schedblox').length;
					$this.parents('.schedblox').remove();
					if (counts <= 1) {
						croma.find('p.cro_thereisnone').show();
					}
				});
			},	
			skedler: function() {
				var rndstr = methods.rndString(),
					coptions = methods.createoptions(cro_bquery.activities),
					moptions = methods.createoptions(cro_bquery.trainers),
					cro_start = $('<div></div>'),
					cro_form = cro_start.addClass('schedblox'),
					cro_thisselect = '<select name="cro_ac_select-' + rndstr + '" class="cro_maxwidth">' + coptions + '</select><select name="cro_tr_select-' + rndstr + '" class="cro_maxwidth">' + moptions + '</select>',
					cro_date = '<div class="dateblocker datepadright"><select class="dayname" name="cro_dayname-' + rndstr + '"><option value="1">' + cro_bquery.mday + '</option><option value="2">' + cro_bquery.tday + '</option><option value="3">' + cro_bquery.wday + '</option><option value="4">' + cro_bquery.thday + '</option><option value="5">' + cro_bquery.fday + '</option><option value="6">' + cro_bquery.saday + '</option><option value="7">' + cro_bquery.sday + '</option></select></div>',
					cro_to = '<div class="dateblocker"><span class="dateto"> - </span></div>',
					cro_closer = '<div class="dateblocker selectblocker">' + cro_thisselect + '</div><br/><input class="cro_title_select" name="cro_title_select-' + rndstr + '" /><br class="clear"></div>';
	
				cro_form.html(
					'<input type="hidden" name="cro_schedcontrol-' + rndstr + '" value="' + rndstr + '">' + 
					cro_date + '<span class="cro_listdeleteone">-</span>' + 
					'<div class="dateblocker"><select class="starthour" name="cro_schedfromhour-' + rndstr + '">' + methods.dateBlocka(24) + '</select></div>' + 
					'<div class="dateblocker"><select class="startminute" name="cro_schedfrommin-' + rndstr + '">' + methods.dateBlocka(59) + '</select></div>' + 
					cro_to + 
					'<div class="dateblocker"><select class="endhour" name="cro_schedtohour-' + rndstr + '">' + methods.dateBlocka(24) + '</select></div>' + 
					'<div class="dateblocker"><select class="endminute" name="cro_schedtomin-' + rndstr + '">' + methods.dateBlocka(59) + '</select></div>' +
					cro_closer
				);

				croma.find('.schedouter').append(cro_form);
				croma.find('p.cro_thereisnone').hide();
			},
			t_skedler: function() {
				var rndstr = methods.rndString(),
					coptions = methods.createoptions(cro_bquery.tariffs),
					cro_start = $('<div></div>'),
					cro_form = cro_start.addClass('schedblox'),
					cro_thisselect = '<select name="cro_ac_select-' + rndstr + '">' + coptions + '</select>',
					cro_to = '<div class="dateblocker"><span class="dateto"> - </span></div>',
					cro_closer = '<div class="dateblocker selectblocker">' + cro_thisselect + '</div><br class="clear"></div>';
	
				cro_form.html(
					'<input type="hidden" name="cro_schedcontrol-' + rndstr + '" value="' + rndstr + '">' + 
					'<span class="cro_listdeleteone">-</span>' + 
					'<div class="dateblocker"><input type="text" class="intervalminutes intervaltarr" name="cro_tarrprice-' + rndstr + '"></div>' +
					'<div class="dateblocker"><input type="text" class="intervalminutes intervaldesc" name="cro_tarrdesc-' + rndstr + '"></div>' +
					cro_closer
				);

				croma.find('.schedouter').append(cro_form);
				croma.find('p.cro_thereisnone').hide();
			},
			rndString: function() {
				var text = '',
				possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				for(var i=0; i < 10; i++){text += possible.charAt(Math.floor(Math.random() * possible.length));}
					return text;
			},
			dateBlocka: function(numbers) {
				var	optionstring = '',
					$i = 0,
					$j = 0;
				for ($i=0; $i < numbers ; $i++) { 
					$j = ($i <= 9) ? '0' + $i : $i ;						
					optionstring += '<option value="' + $i + '">' + $j + '</option>';
				}
				return optionstring;
			},
			createoptions: function(string) {
				var n=string.split(","),
					length = n.length,
    				element = '';




				for (var i = 0; i < length; i++) {
					var m = n[i].split("%%");
  					element += '<option value="' +  m[1]  + '">' + m[0] + '</option>';

				}

				return element;
			},
			t_createoptions: function(string) {
				var n=string.split(","),
					length = n.length,
    				element = null;

				for (var i = 0; i < length; i++) {
  					element += '<option value="' +  n[i]  + '">' + n[i] + '</option>';
				}

				return element;
			}

		};
		methods.init();
	};

	$.fn.cromares =function(){new $.cromares($(this));};

})( jQuery );



jQuery(document).ready(function(){

	"use strict";

	jQuery('.cro_table').cromares();




	if (jQuery('.timetableli').length != 0) {
		var rlist = jQuery('.timetableli:first').attr('rel');
		jQuery('.timetableli:first').addClass('activ');
		jQuery(rlist).show();
	}


	jQuery('.timetableli').click(function() {
		var rlist = jQuery(this).attr('rel');
		jQuery('.activ').removeClass('activ');
		jQuery(this).addClass('activ');
		jQuery('.schedblox').hide();
		jQuery(rlist).show();

	});


	if (jQuery('.tariffli').length != 0) {
		var rlist = jQuery('.tariffli:first').attr('rel');
		jQuery('.tariffli:first').addClass('activ');
		jQuery(rlist).show();
	}

	jQuery('.tariffli').click(function() {
		var rlist = jQuery(this).attr('rel');
		jQuery('.activ').removeClass('activ');
		jQuery(this).addClass('activ');
		jQuery('.tariffblox').hide();
		jQuery(rlist).show();

	});


	jQuery(document).on("click", ".cro_listdeleteone", function(){ 
		jQuery(this).parents('.cro_listcloneractive').remove();		
	});

	// SIDEBAR MANAGER
	jQuery(document).on("click", ".cro_itemplusitems span", function(){ 
		var rstr = new Date().getTime();
		if (jQuery('.cro_theresnolist').length !== 0) {
			jQuery('.cro_theresnolist').remove();
		}
		jQuery('.cro_listcloner').clone().appendTo('.cro_itemlistitems').show().removeClass('cro_listcloner').addClass('cro_listcloneractive').find('input').attr('name', 'inp-' + rstr);
	});
});			
	