
/**
 * jQuery Cookie plugin
 *
 * Copyright (c) 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
jQuery.cookie=function(e,t,n){if(arguments.length>1&&String(t)!=="[object Object]"){n=jQuery.extend({},n);if(t===null||t===undefined){n.expires=-1}if(typeof n.expires==="number"){var r=n.expires,i=n.expires=new Date;i.setDate(i.getDate()+r)}t=String(t);return document.cookie=[encodeURIComponent(e),"=",n.raw?t:encodeURIComponent(t),n.expires?"; expires="+n.expires.toUTCString():"",n.path?"; path="+n.path:"",n.domain?"; domain="+n.domain:"",n.secure?"; secure":""].join("")}n=t||{};var s,o=n.raw?function(e){return e}:decodeURIComponent;return(s=(new RegExp("(?:^|; )"+encodeURIComponent(e)+"=([^;]*)")).exec(document.cookie))?o(s[1]):null};

(function(e){e.fn.hoverIntent=function(t,n,r){var i={interval:100,sensitivity:7,timeout:0};if(typeof t==="object"){i=e.extend(i,t)}else if(e.isFunction(n)){i=e.extend(i,{over:t,out:n,selector:r})}else{i=e.extend(i,{over:t,out:t,selector:n})}var s,o,u,a;var f=function(e){s=e.pageX;o=e.pageY};var l=function(t,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);if(Math.abs(u-s)+Math.abs(a-o)<i.sensitivity){e(n).off("mousemove.hoverIntent",f);n.hoverIntent_s=1;return i.over.apply(n,[t])}else{u=s;a=o;n.hoverIntent_t=setTimeout(function(){l(t,n)},i.interval)}};var c=function(e,t){t.hoverIntent_t=clearTimeout(t.hoverIntent_t);t.hoverIntent_s=0;return i.out.apply(t,[e])};var h=function(t){var n=jQuery.extend({},t);var r=this;if(r.hoverIntent_t){r.hoverIntent_t=clearTimeout(r.hoverIntent_t)}if(t.type=="mouseenter"){u=n.pageX;a=n.pageY;e(r).on("mousemove.hoverIntent",f);if(r.hoverIntent_s!=1){r.hoverIntent_t=setTimeout(function(){l(n,r)},i.interval)}}else{e(r).off("mousemove.hoverIntent",f);if(r.hoverIntent_s==1){r.hoverIntent_t=setTimeout(function(){c(n,r)},i.timeout)}}};return this.on({"mouseenter.hoverIntent":h,"mouseleave.hoverIntent":h},i.selector)}})(jQuery);

(function(e){e.fn.superfish=function(t){var n=e.fn.superfish,r=n.c,i=e('<span class="'+r.arrowClass+'"> &#187;</span>'),s=function(){var t=e(this),n=u(t);clearTimeout(n.sfTimer);t.showSuperfishUl().siblings().hideSuperfishUl()},o=function(t){var r=e(this),i=u(r),o=n.op;var a=function(){o.retainPath=e.inArray(r[0],o.$path)>-1;r.hideSuperfishUl();if(o.$path.length&&r.parents("li."+o.hoverClass).length<1){o.onIdle.call();e.proxy(s,o.$path,t)()}};if(t.type==="click"){a()}else{clearTimeout(i.sfTimer);i.sfTimer=setTimeout(a,o.delay)}},u=function(t){if(t.hasClass(r.menuClass)){e.error("Superfish requires you to update to a version of hoverIntent that supports event-delegation, such as this one: https://github.com/joeldbirch/onHoverIntent")}var i=t.closest("."+r.menuClass)[0];n.op=n.o[i.serial];return i},a=function(e){e.css("ms-touch-action","none")},f=function(t){var r="li:has(ul)";if(!n.op.useClick){if(e.fn.hoverIntent&&!n.op.disableHI){t.hoverIntent(s,o,r)}else{t.on("mouseenter",r,s).on("mouseleave",r,o)}}var i="MSPointerDown";if(!navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad)/)){i+=" touchstart"}t.on("focusin","li",s).on("focusout","li",o).on("click","a",c).on(i,"a",l)},l=function(t){var n=e(this),r=n.siblings("ul");if(r.length>0&&!r.is(":visible")){n.data("follow",false);if(t.type==="MSPointerDown"){n.trigger("focus");return false}}},c=function(t){var r=e(this),i=r.siblings("ul"),u=r.data("follow")===false?false:true;if(i.length&&(n.op.useClick||!u)){t.preventDefault();if(!i.is(":visible")){e.proxy(s,r.parent("li"))()}else if(n.op.useClick&&u){e.proxy(o,r.parent("li"),t)()}}},h=function(t,n){if(n.autoArrows){t.children("a").each(function(){p(e(this))})}},p=function(e){e.addClass(r.anchorClass).append(i.clone())};return this.addClass(r.menuClass).each(function(){var i=this.serial=n.o.length;var s=e.extend({},n.defaults,t);var o=e(this);var u=o.find("li:has(ul)");s.$path=o.find("li."+s.pathClass).slice(0,s.pathLevels).each(function(){e(this).addClass(s.hoverClass+" "+r.bcClass).filter("li:has(ul)").removeClass(s.pathClass)});n.o[i]=n.op=s;h(u,s);a(o);f(o);u.not("."+r.bcClass).children("ul").show().hide();s.onInit.call(this)})};var t=e.fn.superfish;t.o=[];t.op={};t.c={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",arrowClass:"sf-sub-indicator"};t.defaults={hoverClass:"sfHover",pathClass:"overideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},animationOut:{opacity:"hide"},speed:"normal",speedOut:"fast",autoArrows:true,disableHI:false,useClick:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){},onIdle:function(){}};e.fn.extend({hideSuperfishUl:function(){var n=t.op,r=this,i=n.retainPath===true?n.$path:"";n.retainPath=false;e("li."+n.hoverClass,this).add(this).not(i).children("ul").stop(true,true).animate(n.animationOut,n.speedOut,function(){$ul=e(this);$ul.parent().removeClass(n.hoverClass);n.onHide.call($ul);if(t.op.useClick){r.children("a").data("follow",false)}});return this},showSuperfishUl:function(){var e=t.op,n=this,r=this.children("ul");n.addClass(e.hoverClass);e.onBeforeShow.call(r);r.stop(true,true).animate(e.animation,e.speed,function(){e.onShow.call(r);n.children("a").data("follow",true)});return this}})})(jQuery);

(function(e,t,n){"use strict";e.fn.foundationAccordion=function(t){var n=function(e){return e.hasClass("hover")&&!Modernizr.touch};e(document).on("mouseenter",".accordion li",function(){var t=e(this).parent();if(n(t)){var r=e(this).children(".content").first();e(".content",t).not(r).hide().parent("li").removeClass("active");r.show(0,function(){r.parent("li").addClass("active")})}});e(document).on("click.fndtn",".accordion li .title",function(){var t=e(this).closest("li"),r=t.parent();if(!n(r)){var i=t.children(".content").first();if(t.hasClass("active")){r.find("li").removeClass("active").end().find(".content").hide()}else{e(".content",r).not(i).hide().parent("li").removeClass("active");i.show(0,function(){i.parent("li").addClass("active")})}}})}})(jQuery,this);

(function(e){"use strict";e.cromaform=function(t){var n=e(t),r=n.find("#cro_form_sub"),i={border:"1px solid #EF8688"},s=n.find(".cro_bookingsoverlay1"),o=0,u=n.hasClass("blackform")?{border:"1px solid #2a2a2a"}:{border:"1px solid #CCCCCC"},a={init:function(){a.formClear();a.valReset();a.deleGated()},formClear:function(){n.find("input").not(r).val("");n.find("textarea").val("");r.removeAttr("disabled");o=0},valReset:function(){n.find("input").not(r).css(u);n.find("textarea").css(u);r.removeAttr("disabled");n.find(".valmess").find("div").hide();o=0},deleGated:function(){n.delegate("#cro_form_sub","click",function(e){e.preventDefault();a.formSubm();return false})},formSubm:function(){a.valReset();s.fadeIn("slow");n.find(".cro_validateform").each(function(){var t=e(this),n=t.val(),r=t.attr("contents");switch(r){case"cro_ct":t.css(u);if(n.length===0){o++;t.css(i)}break;case"cro_loc":t.css(u);if(n.length!==0){o++;t.css(i)}break}});if(o>=1){n.find(".bookerror").fadeIn("slow");s.fadeOut("slow")}else{var t=n.find("input#cro_form_name").val(),f=n.find("input#cro_form_mail").val(),l=n.find("textarea#cro_form_cmmt").val(),c=n.find("input#cro_form_tel").val(),h=n.find("#cro_form_loc").val(),p={action:"cro_get_ajaxdatas",type:"bookingcal_form_submit",option1:t,option2:f,option3:l,option4:c,option5:h};r.attr("disabled","disabled");e.post(cro_query.ajaxurl,p,function(){n.find(".booksuccess").fadeIn("slow");s.fadeOut("slow");window.setTimeout(function(){n.find(".booksuccess").fadeOut("slow");a.formClear()},1e4)})}}};a.init()};e.fn.cromaform=function(){new e.cromaform(e(this))}})(jQuery)


;(function ($) {

	"use strict";

	$.cromaticactivity = function(el) {		
		this.$el 	= $(el);
		this._init();
	};

	$.cromaticactivity.prototype = {
		_init : function() {
			this.lth 	= Cromatimes.length;
			this.img1 	= this.$el.find('.dateactivity');
			this.img2 	= this.$el.find('.trainerimg');
			this.day 	= this.$el.find('.dateday');
			this.date 	= this.$el.find('.datemonth');

			this.bod 	= this.$el.find('.dateatime span');
			this.stret 	= this.$el.find('.dateatime');
			this.tit 	= this.$el.find('.dateannounce');
			this.currc 	= 0;
			this.slideshowTime;
			this.interVal = 15000;
			this._iVal();
			this._delegate();
		},
		_delegate : function() {
			var self = this;
			this.$el.on( 'click', '.upcprev, .upcnext', function() {
				if ($(this).hasClass('upcprev')){ self._goPrev();return false;}
				if ($(this).hasClass('upcnext')){ self._goNext();return false;}
			});
		},
		_timerFunc: function(dir) {
			var self = this,
				timg1 = new Image(),
				timg2 = new Image();


			if (dir == 'prev'){
				this.currc--;
				this.currc = (this.currc >= 0)? this.currc : (this.lth-1);
			} else {
				this.currc++;
				this.currc = (this.currc <= (this.lth - 1))? this.currc : 0;
			}

			if (Cromatimes[this.currc]['img1'].length != 0){
				$(timg1).load(function () {	
					self.img1.find('img').remove();	
					self.img1.removeClass('cro_timeswithout_image');
					self.stret.removeClass('cro_stretch_noimg');
					self.tit.removeClass('cro_stretch_noimg');					
					self.img1.prepend(this);
				}).attr('src', Cromatimes[this.currc]['img1']);
		    } else {
		    	this.img1.find('img').remove();
		    	this.img1.addClass('cro_timeswithout_image');
		    	this.stret.addClass('cro_stretch_noimg');
		    	this.tit.addClass('cro_stretch_noimg');	
		    }

		    if (Cromatimes[this.currc]['img2'].length != 0){
				$(timg2).load(function () {	
					self.img2.find('img').remove();	
					self.img2.removeClass('cro_timeswithout_trainer');	
					self.stret.removeClass('cro_stretch_notrainer');
		    		self.tit.removeClass('cro_stretch_notrainer');		
					self.img2.prepend(this);
				}).attr('src', Cromatimes[this.currc]['img2']);
			} else {
				self.img2.find('img').remove();	
				this.img2.addClass('cro_timeswithout_trainer');
		    	this.stret.addClass('cro_stretch_notrainer');
		    	this.tit.addClass('cro_stretch_notrainer');	
			}

			this.day.html(self._decodeEntities(Cromatimes[this.currc]['day']));
			this._unScramble(this.day);
			this.date.html(self._decodeEntities(Cromatimes[this.currc]['date']));
			this._unScramble(this.date);
			this.bod.html(self._decodeEntities(Cromatimes[this.currc]['time']));
			this._unScramble(this.bod);
			this.tit.html(self._decodeEntities(Cromatimes[this.currc]['title']));
			this._unScramble(this.tit);
		},
		_iVal: function() {
			var self = this;
			 this.slideshowTime = setInterval( function() {
			 	self._timerFunc('next');
			 }, self.interVal );
		},
		_decodeEntities: function(string) {   		
      		var decoded = $("<div/>").html(string).text();
      		return decoded;
		},
		_goNext: function() {
			var self = this;
			clearInterval(self.slideshowTime);
			this._timerFunc('next');
			this._iVal;
		},
		_goPrev: function() {
			var self = this;
			clearInterval(self.slideshowTime);
			this._timerFunc('prev');
			this._iVal;
		},
		_unScramble: function(el) {
			 var 	ele 		= el, 
			 		str 		= ele.text() + ' ', 
			 		progress 	= 0;
            
            ele.text('');
            var timer = setInterval(function() {
                ele.text(str.substring(0, progress++) + (progress & 1 ? '' : ''));
                if (progress >= str.length) clearInterval(timer);
            }, 25);          
		}
	}

	$.fn.cromaticactivity = function() {
		new $.cromaticactivity($(this));
	};

})( jQuery );




;(function ($) {

	"use strict";

	$.cromaticfeedback = function(el) {		
		this.$el 	= $(el);
		this._init();
	};

	$.cromaticfeedback.prototype = {
		_init : function() {
			this.lth 	= Cromafeedbacks.length;
			this.img 	= this.$el.find('.feedbimg');
			this.bod 	= this.$el.find('.fitfeedb_content');
			this.tit 	= this.$el.find('.fitfeedb_title');
			this.currc 	= 0;
			this.slideshowTime;
			this.interVal = 13000;
			this._iVal();
			this._delegate();
		},
		_delegate : function() {
			var self = this;
			this.$el.on( 'click', '.finnerprev, .finnernext', function() {
				if ($(this).hasClass('finnerprev')){ self._goPrev();return false;}
				if ($(this).hasClass('finnernext')){ self._goNext();return false;}
			});
		},
		_timerFunc: function(dir) {
			var self = this,
				timg = new Image();

			if (dir == 'prev'){
				this.currc--;
				this.currc = (this.currc >= 0)? this.currc : (this.lth-1);
			} else {
				this.currc++;
				this.currc = (this.currc <= (this.lth - 1))? this.currc : 0;
			}

			if (Cromafeedbacks[this.currc]['img'].length >= 1) {
				$(timg).load(function () {	
					self.img.find('img').remove();			
					self.img.prepend(this);
				}).attr('src', Cromafeedbacks[this.currc]['img']);	
				this.img.removeClass('cro_image_without_image');
				this.bod.parents('.fbcontentinner').removeClass('cro_without_image');
			} else {
				this.img.addClass('cro_image_without_image');
				this.bod.parents('.fbcontentinner').addClass('cro_without_image');
			}
			this.bod.html(self._decodeEntities(Cromafeedbacks[this.currc]['content']));
			this.tit.html(self._decodeEntities(Cromafeedbacks[this.currc]['title']));
		},
		_iVal: function() {
			var self = this;
			 this.slideshowTime = setInterval( function() {
			 	if (self.lth >= 2) {
			 		self._timerFunc('next');
			 	}
			 }, self.interVal );
		},
		_decodeEntities: function(string) {   		
      		var decoded = $("<div/>").html(string).text();
      		return decoded;
		},
		_goNext: function() {
			var self = this;
			clearInterval(self.slideshowTime);
			this._timerFunc('next');
			this._iVal;
		},
		_goPrev: function() {
			var self = this;
			clearInterval(self.slideshowTime);
			this._timerFunc('prev');
			this._iVal;
		}

	}

	$.fn.cromaticfeedback = function() {
		new $.cromaticfeedback($(this));
	};

})( jQuery );


jQuery(document).ready(function($) {
	"use strict";

	var ajaxNonces 			= cro_query.cro_nonces,
		ajaxUrls 			= cro_query.ajaxurl,
		croInit 			= '',
		croInits 			= '',
		currentTallest 		= 0,
     	currentRowStart 	= 0,
     	rowDivs 			= new Array(),
     	$el 				= '',
     	topPosition 		= 0;


    if ($('.fitfeedbackouter'.length != 0)  && Cromafeedbacks.length != 0) {
    	$('.fitfeedbackouter').cromaticfeedback();
    }

    if ($('.upcclasses'.length != 0) && Cromatimes.length != 0) {
    	$('.upcclasses').cromaticactivity();
    }

    $("ul.menu").superfish();

 	$('.cro_eqheight').each(function() {
   		var $el 			= $(this);
   		topPosition 		= $el.position().top;
   
   		if (currentRowStart != topPosition) {
     		for (var currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       			rowDivs[currentDiv].height(currentTallest);
     		}
     
     		rowDivs.length 	= 0; // empty the array
     		currentRowStart = topPosition;
     		currentTallest 	= $el.height();
     		rowDivs.push($el);

   		} else {
     		rowDivs.push($el);
     		currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  		}
   
   		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     		rowDivs[currentDiv].height(currentTallest);
   		}
   
 	});

 	$('.cro_welcome h1').click(function() {
 		window.open('https://vimeo.com/73617760');
 	});

 	$('.cro_welcome h2').click(function() {
 		window.open('https://vimeo.com/73618209');
 	});


	$(document).foundationAccordion();


	/* ========================= FOUNDATION ======================== */
	$('.myModal').each(function() {$(this).detach().prependTo('#modalholder');});
	$(".videodiv").click(function() {var mystr = $(this).attr('rel');var mylighboxstring = '.myModal[rel="' +  mystr  + '"]';$(mylighboxstring).reveal();});



	// UPDATE TWEETS
	var data = { action: 'cro_get_ajaxdatas', type: 'updte_tweet', nonce: ajaxNonces};
	$.post(ajaxUrls, data);

	// NEWSLETTER
	$('.newssubmit').click(function() {
		var $this = $(this),
			p = $this.parents('form'),
			submitted = 0,
			label = $this.attr('value'),
			labelcopy = $this.attr('value'),
			mlength = label.length,
			initanim = setInterval(intanm,300),
			valemail = p.find('.netlabs_newsmail').val(),	
			valcontent = p.find('.netlabs_newsname').val(),
			valcontrol = cro_valinput(p.find('.newsloc').val(), 'control'),
			succ = p.find('.valsuccess'),
			errr = p.find('.valerror');

		$this.css('cursor','wait').attr('disabled', 'disabled');
		succ.fadeOut('slow');
		errr.fadeOut('slow');

		if (cro_valinput(valcontent,'input') && cro_valemail(valemail)  && valcontrol && submitted === 0) {
			var data = { action: 'cro_get_ajaxdatas', type: 'submit_newsl', nonce: ajaxNonces, option1: valemail, option2: valcontent};
			$.post(ajaxUrls, data, function() {
				succ.fadeIn('fast');
				window.clearInterval(initanim);
				$this.attr('value',labelcopy);
				$this.css('cursor','pointer');
				submitted++;	
			});
		} else {
			errr.fadeIn('fast');
			$this.css('cursor','pointer').removeAttr("disabled");
			window.clearInterval(initanim);
			$this.attr('value',labelcopy);
		}


		function intanm() {
			label = (label.length <= mlength + 5) ?  label + '.' : labelcopy ;
			$this.attr('value',label);
		}

		return false;
	});



	/* ========================= EVENTS CALENDAR ======================== */
	$(document).on("click", ".agendir", function(){ 
		var timings = $(this).attr('rel'),
			data = { action: 'cro_get_ajaxdatas', type: 'cro_moveagenda', nonce: ajaxNonces, option1: timings};
		$.post(ajaxUrls, data, function(response) {
			var mydiv = $('.cro_agendadiv');
			mydiv.html(response);
		});
	});


	/* ========================= EVENTS CALENDAR ======================== */
	$(document).on("click", ".caldir", function(){ 
		var $this = $(this),
			timings = $this.attr('rel'),
			data = { action: 'cro_get_ajaxdatas', type: 'cro_movecal', nonce: ajaxNonces, option1: timings};
		$.post(ajaxUrls, data, function(response) {
			var mydiv = $('.caldiv'),
				wdt   = mydiv.width();
			mydiv.html(response);
			cro_hgtr(mydiv);
			if (wdt < 560) {
				$('ul.calday').hide();
				$('li.empty').hide();
			} else {
				$('ul.calday').show();
				$('li.empty').show();
			}
		});
	});

	if ($('.caldiv').length >= 1) {
		var $this = $('.caldiv');
		cro_hgtr($this);


		$(window).resize(function() {
			var wdt = $('.caldiv').width();

			if (wdt < 560) {
				$('ul.calday').hide();
				$('li.empty').hide();
			} else {
				$('ul.calday').show();
				$('li.empty').show();
			}

		});
	}


	var wdt = $('.caldiv').width();

	if (wdt < 560) {
		$('ul.calday').hide();
		$('li.empty').hide();
	} 

	function cro_hgtr(el){
		var $this = el;
		$this.each(function() {
			var hgt = 0;
			$('ul.maincal li').each(function() {
				var thgt = $(this).height();
				if (thgt > hgt) {
					hgt = thgt;
				}
			});

			if (hgt > 120){
				$(this).find('.maincal li').find('.daybox').css('height', hgt + 'px');
			}

		});
	}


	/* ========================= LIGHTBOX ======================== */
	$('.galholderski').click(function() {
		var clicklist = $(this).parents('.widget-container').find('ul.cro_gallerycontentwidget'),
			clicklistli = clicklist.find('li'),
			da_list  = clicklist.html(),
			da_count = clicklistli.length,
			da_thispage	= 1,
			da_markup = '<div class="cro_galelement"><div class="cro_thumbholder"><div class="cro_listholder"><ul class="cro_listoflists"></ul></div><div class="cro_thumbnext cro_thumbdir"></div><div class="cro_thumbprev cro_thumbdir"></div></div><div class="cro_showholder"><div class="cro_closegallery"></div><div class="cro_loadergal"></div><div class="cro_titlegal"><p>This is the title</p></div></div><div class="cro_biggalleft cro_bigdir"></div><div class="cro_biggalright cro_bigdir"></div></div>',
			da_window = 0,
			da_window_w = 0,
			da_thumbwidth = 0,
			da_stage = 0,
			da_stage_w = 0,
			da_perpage = 0,
			da_pagenums = 0,
			da_galtest = 0,
			da_onlastpage = 0,
			da_elementset = '',
			da_holderset = '',
			da_dirset = '',
			da_listset = '';


			// mask
		$('<div>').addClass('reveal-modal-bg').css('background','rgba(0,0,0,0.8)').show().prependTo('.galholder');

		da_set_things_up();


		// set up the close buttons
		$('.cro_closegallery').click(function() {
			$('.galholder').html('').hide();
		});

		$(window).resize(function() {
			da_set_things_up();
			if (('.cro_showholder img').length !== 0) {
				var ofset = { top: 0, left: 0 };
				ofset = $('.cro_showholder').find('img').offset();
				var wdt = $('.cro_showholder img').width();
				var dim = (typeof(ofset) === 'object')? da_window_w - wdt - ofset.left - 90 : dim = da_window_w - wdt -  90;
				dim = dim + 'px';

				$('.cro_closegallery').css('right', dim);

				var owidth = $('.cro_showholder img').width(),
					oheight = $('.cro_showholder img').height(),
					maxheight = Math.floor(da_stage * 0.9),
					proportion = owidth / oheight;


				if (da_stage < (oheight + 50)) {

					$('.cro_showholder img').css('height', maxheight + 'px');
					oheight = maxheight;
					owidth = maxheight * proportion;
				}

				var topband = Math.floor(da_stage - oheight) / 2;
				var rightband = Math.floor(da_stage_w - owidth) / 2;
				$('.cro_showholder img').css('margin-top', topband + 'px');
				$('.cro_closegallery').css('top', topband + 'px');
				$('.cro_closegallery').css('right', rightband + 'px');
			}
		});

		$('.cro_thumbdir').click(function() {

			if ($(this).hasClass('cro_thumbprev')){
				if ((da_thispage - 1) === 1 ) {
					$('ul.cro_listoflists').animate({left: '0px'}, 1000);
					da_thispage--;
				} else if((da_thispage - 1) > 1 ) {
					$('ul.cro_listoflists').animate({left: '+=' + da_perpage * 105}, 1000);
					da_thispage--;
				}


			} else {
				if ((da_thispage + 1) === da_pagenums ) {
					var da_tomove = 105 * da_onlastpage;
					$('ul.cro_listoflists').animate({left: '-=' + da_tomove}, 1000);
					da_thispage++;
				} else if ((da_thispage + 1) < da_pagenums ) {
					$('ul.cro_listoflists').animate({left: '-=' + da_perpage * 105}, 1000);
					da_thispage++;
				}
			}

			manage_da_thumbs();
		});



		// set up the directional buttons
		$('.cro_bigdir').click(function() {
			var current = $('ul.cro_listoflists li.crocurrgal'),
				target = '';

			if ($(this).hasClass('cro_biggalright')){
				target = current.next('li').length ? current.next('li'): $('ul.cro_listoflists li:first');
			} else {
				target = current.prev('ul.cro_listoflists li').length ? current.prev('li'): $('ul.cro_listoflists li:last');
			}

			current.removeClass('crocurrgal');
			target.addClass('crocurrgal');
			push_da_image(target.attr('contents'), target.attr('title'));

		});

		// show the image thumbs
		$('.cro_listholder li').each(function() {
				var $this = $(this);
				var thumbsrc = $this.attr('rel');
				$this.html('<img src="' + thumbsrc + '"/>');
				$this.unbind('click').bind('click',load_da_stage);
		});

		
		push_da_image('','');


		function da_set_things_up() {

			da_window = $(window).height(); 
			da_window_w = $(window).width();
			da_thumbwidth = da_count * 115;
			da_stage = da_window - 195;
			da_stage_w = da_window_w - 180;
			da_elementset = {'height' : da_window + 'px'};
			da_holderset = {'width' : da_stage_w + 'px','height'	: da_stage + 'px'};
			da_dirset = {'height' : da_stage + 'px'};
			da_listset = {'width' : (da_window_w - 100) + 'px'};
			da_perpage = Math.floor((da_window_w - 100)/105);
			da_pagenums = Math.ceil(da_count/da_perpage);
			
			// setup the show
			if (da_galtest === 0) {
				$(da_markup).prependTo('.galholder');
				$('.cro_listoflists').html(da_list);
				da_galtest++;
			}
			$('.cro_galelement').show().css(da_elementset);
			$('.cro_showholder').css(da_holderset);
			$('.cro_biggalleft').css(da_dirset);
			$('.cro_biggalright').css(da_dirset);
			$('.cro_listholder').css(da_listset);
			$('.cro_listoflists').css('width', da_thumbwidth + 'px');


			if (da_pagenums === 1) {
				var elemwdt = da_count * 105;
				var da_margin = (da_window_w - 100 - elemwdt)/2;
				$('.cro_listholder').css('margin-left', da_margin +'px');
			}


			// set up pages
			if (da_pagenums >= 2) {
				da_onlastpage = da_count - (da_perpage * (da_pagenums - 1));
			}

			manage_da_thumbs();
		}

		function manage_da_thumbs() {
			if (da_thispage >= 2 ) {
				$('.cro_thumbprev').show();
			} else {
				$('.cro_thumbprev').hide();
			}

			if (da_thispage <= (da_pagenums - 1) ) {
				$('.cro_thumbnext').show();
			} else {
				$('.cro_thumbnext').hide();
			}
		}

		function load_da_stage() {
			var $this = $(this);
			var thumb_src = $this.attr('contents');
			var thumb_title = $this.attr('title');
			$('.crocurrgal').removeClass('crocurrgal');
			$this.addClass('crocurrgal');
			push_da_image(thumb_src, thumb_title);
		}

		function push_da_image(img_string, title_string) {			
			var img = new Image();
			$('.cro_loadergal').show();

			if (!img_string) {
				img_string = $('ul.cro_listoflists li:first').attr('contents');
				title_string  = $('ul.cro_listoflists li:first').attr('title');
				$('ul.cro_listoflists li:first').addClass('crocurrgal');
				$('.cro_biggalright').show();
				$('.cro_biggalleft').show();
			}


			$('.cro_showholder img').remove();
			$('.cro_titlegal p').html('').css('display','none');

			$(img).bind('load', function() {			
				$('.cro_showholder').prepend(this);
				$('.cro_loadergal').hide();
				if (title_string) {
					$('.cro_titlegal p').html(title_string).css('display','inline-block');
				} else {
					$('.cro_titlegal p').css('display','none');
				}

				var owidth = $(this).width(),
					oheight = $(this).height(),
					maxheight = Math.floor(da_stage * 0.9),
					proportion = owidth / oheight;


				if (da_stage < (oheight + 50)) {
					oheight = maxheight;
					owidth = maxheight * proportion;
					var  da_newhw = {'width' : owidth + 'px','height'	: oheight + 'px'};
					$(this).css(da_newhw);
				}

				var topband = Math.floor(da_stage - oheight) / 2;
				var rightband = Math.floor(da_stage_w - owidth) / 2;
				$('.cro_closegallery').css('top', topband + 'px');
				$('.cro_closegallery').css('right', rightband + 'px');
				$('.cro_closegallery').show();
				$(img).css('margin-top', topband + 'px');
			}).attr('src', img_string);		
		}

		$('.galholder').show();
	});
	

	/* ========================= HELPERS ======================== */
	function cro_valemail($email){var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;if(!emailReg.test($email)||!$email){return false;}else{return true;}}
	function cro_valinput($input, $type){if(!$input && $type ==='input'){return false;} else if ($input && $type === 'input'){return true;} else if (!$input && $type === 'control'){return true;} else if ($input && $type === 'control'){return false;}}


	/* ========================= BOOKINGS ======================== */
	$('form#ctcform').cromaform();
	
});


