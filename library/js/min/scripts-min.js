function updateViewportDimensions(){var t=window,e=document,i=e.documentElement,o=e.getElementsByTagName("body")[0],n=t.innerWidth||i.clientWidth||o.clientWidth,a=t.innerHeight||i.clientHeight||o.clientHeight;return{width:n,height:a}}function loadGravatars(){viewport=updateViewportDimensions(),viewport.width>=768&&jQuery(".comment img[data-gravatar]").each(function(){jQuery(this).attr("src",jQuery(this).attr("data-gravatar"))})}var viewport=updateViewportDimensions(),waitForFinalEvent=function(){var t={};return function(e,i,o){o||(o="Don't call this twice without a uniqueId"),t[o]&&clearTimeout(t[o]),t[o]=setTimeout(e,i)}}(),timeToWaitForLast=100;jQuery(document).ready(function($){function t(){var t=$(window).width();if(t>1260)$(".sidebar").each(function(){var t=$(this),e=$(this).outerHeight(),i=$(".sidebar-inner").outerHeight(),o=$(document).scrollTop(),n=$(window).height();if(i>n)return t.css({position:"",height:"",top:"",right:"","align-self":""}),!1;var a=$("header > nav").outerHeight(),s=$("body > header").outerHeight(),r=s-a-o,l=$(".footer-cta + footer").outerHeight(),d=$(".footer-cta").outerHeight(),h=l+d,c=$(document).height(),p=l+d;sidebarBotOffset=c-o-n-h,t.css({height:n-a,"min-height":n-a}),console.log(sidebarBotOffset),0>r&&sidebarBotOffset>0?t.css({position:"fixed",top:a,right:0,"align-self":""}):sidebarBotOffset<0?t.css({position:"",top:"",right:"","align-self":"flex-end"}):t.css({position:"",top:"",right:"","align-self":""})});else{var e=$(this);e.css({position:"",height:"","min-height":"",top:"",right:"","align-self":""})}}function i(){var t=$(document).scrollTop(),e=$(window).width();if(e>900&&$("body").hasClass("page-template-page-home-php")){var i=$(".core-point:nth-child(1)"),o=i.offset().top,n=i.find(".core-point-text");t>o?n.css({position:"fixed",top:n.position().top,left:n.offset().left,width:n.outerWidth()}):n.css({position:"",top:"",left:"",width:""});var a=$(".core-point:nth-child(2)"),s=a.offset().top,r=a.find(".core-point-text");t>s?(n.css({position:"",top:"",left:"",width:""}),r.css({position:"fixed",top:r.position().top,left:r.offset().left,width:r.outerWidth()})):r.css({position:"",top:"",left:"",width:""});var l=$(".core-point:nth-child(3)"),d=l.offset().top,h=l.find(".core-point-text");t>d&&r.css({position:"",top:"",left:"",width:""})}}$('a[href="/contact?inpage"]').click(function(t){t.preventDefault();var e=$(".button-wrap"),i=$(this).attr("shortcode");e.fadeOut(500),window.setTimeout(function(){$(".inpage-contact").removeClass("hidden").animate({opacity:1})},500)}),$("body").on("click",".add-file",function(t){t.preventDefault();var e=$(this).parent().parent().find(".extrafilewrap.hidden").first();e.removeClass("hidden").find("input")[0].click(),e.next(".extrafilewrap.hidden").length||$(this).addClass("disabled")}),$("body").on("click",".add-url",function(t){if(t.preventDefault(),!$(this).hasClass("disabled")){var e=$(this).parent().parent().find(".extraurlwrap.hidden").first();e.removeClass("hidden").find("input").focus(),e.next(".extraurlwrap.hidden").length||$(this).addClass("disabled")}}),$("body").on("click",".choose-file",function(t){t.preventDefault(),$(this).closest(".inputfilewrap").find("input")[0].click()}),$("body").on("change",'input[type="file"]',function(){var t=$(this).attr("name"),e=$(this).val().split("\\").pop();$('.filesrc[field="'+t+'"]').text(e)}),$("body").on("click",".delete-field",function(t){t.preventDefault();var e=$(this).parent().find("input");"file"==e.attr("type")?(e.removeAttr("value"),e.replaceWith(e=e.clone(!0)),e.closest(".extrainputwrap").addClass("hidden").find(".filesrc").text("No file chosen"),e.closest(".file-upload-wrap").find(".add-file").removeClass("disabled")):(e.removeAttr("value"),e.closest(".extrainputwrap").addClass("hidden"),e.replaceWith(e=e.clone(!0)),e.closest(".file-upload-wrap").find(".add-url").removeClass("disabled"))}),$("body").on("change",'.plan-switcher input[type="checkbox"]',function(){$(".plan-price").each(function(){var t=$(this).height();$(this).height(t)}),$(this).is(":checked")?($(".monthly-price, .yearly-price").animate({opacity:0},500),setTimeout(function(){$(".monthly-price").addClass("hidden"),$(".yearly-price").removeClass("hidden").animate({opacity:1},500)},500),$(".plan-switcher").addClass("annual-plan"),$(".plan-button").each(function(){var t=$(this),e=t.attr("href")+"-annual";t.attr("href",e)})):($(".monthly-price, .yearly-price").animate({opacity:0},500),setTimeout(function(){$(".yearly-price").addClass("hidden"),$(".monthly-price").removeClass("hidden").animate({opacity:1},500)},500),$(".plan-switcher").removeClass("annual-plan"),$(".plan-button").each(function(){var t=$(this),e=t.attr("href").replace("-annual","");t.attr("href",e)}))}),$("header nav").click(function(t){t.stopPropagation()}),$("body").click(function(){$("body").hasClass("showsidemenu")&&$("body").removeClass("showsidemenu")}),$(".sidemenubutton").click(function(t){$("body").hasClass("showsidemenu")?$("body").removeClass("showsidemenu"):$("body").addClass("showsidemenu"),t.stopPropagation()}),$(".closebutton").click(function(){$("body").hasClass("showsidemenu")&&$("body").removeClass("showsidemenu")});var o="ontouchstart"in window||navigator.msMaxTouchPoints>0;$(document).on("touchstart",function(){o&&$(".plan-item-has-tooltip span").hasClass("hover")&&$(".plan-item-has-tooltip span").removeClass("hover")}),$(".plan-item-has-tooltip span").click(function(){o&&($(this).addClass("hover"),e.stopPropagation())}),$(".plan-item-has-tooltip span").mouseover(function(){o||$(this).toggleClass("hover")}).mouseout(function(){o||$(this).toggleClass("hover")}),t(),$(document).scroll(function(e){t(),$("body").hasClass("page-template-page-home-php")&&i()}),$(window).resize(function(){t()})});