/*!
 * jQuery Display Message Plugin
 *
 * Copyright 2010, Andrey Voev
 * http://www.andreyvoev.com
 *
 * Date: Fri Dec 12 16:12 2010 -0800
 */

(function( $ ){

   // Default configuration properties.
   var defaults = {
            error         : 'Error message',
            color         : '#FFFFFF',
            background    : '#363636',
            speed         : 'slow',
            skin          : 'plain'
   }

   $.fn.displayMessage = function(options) {

        var options = $.extend( defaults, options );

        return this.each(function() {

        $(this).append('<span></span>').hide().css('color',options.color).html(options.error).fadeIn('slow');;
            //$(this).find('span').hide().css('color',options.color).html(options.error).fadeIn('slow');
          $(this).css('background', options.background);

          $(this).slideDown(options.speed ,function(){
             $(this).find('a').animate({"opacity": "show"});
             var close_button = ($(this).find('a').attr('id')) ? "#"+$(this).find('a').attr('id') : "."+$(this).find('a').attr('class');
             var parent = ($(this).attr('id')) ? "#"+$(this).attr('id') : "."+$(this).attr('class');
             var script = '<script>$(document).ready(function(){$("'+parent+">"+close_button+'").click(function (event) {event.preventDefault();$("'+parent+">"+close_button+'").animate({"opacity": "hide"}, function(){$("'+parent+'>span").fadeOut("slow").html(""); $("'+parent+">"+close_button+'").parent().slideUp("'+options.speed+'");});});});';
             $('body').append(script);
      });

   });

   };
})( jQuery );
