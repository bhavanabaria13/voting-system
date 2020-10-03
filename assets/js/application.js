// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR OUR DOCS!
// ++++++++++++++++++++++++++++++++++++++++++

/*!
 * JavaScript for Bootstrap's docs (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under the Creative Commons Attribution 3.0 Unported License. For
 * details, see http://creativecommons.org/licenses/by/3.0/.
 */


!function ($) {

  $(function () {

    // IE10 viewport hack for Surface/desktop Windows 8 bug
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
      var msViewportStyle = document.createElement('style')
      msViewportStyle.appendChild(
        document.createTextNode(
          '@-ms-viewport{width:auto!important}'
        )
      )
      document.querySelector('head').appendChild(msViewportStyle)
    }
    var createCookie = function(n, v, d) {
		if (d) {
			var date = new Date();
			date.setTime(date.getTime() + (d * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
		} else var expires = "";
		document.cookie = n + "=" + v + expires + "; path=/";
	}

    $(document).on('click.theme', '[data-toggle="theme"]', function(e){
		e.preventDefault();
		if ($(this).parent().hasClass('active')){
			return false;
		}
		var href = $(this).attr('href'), $switcher = $('#theme_switcher');
		href = href.replace(/.*(?=#[^\s]+$)/, '').substr(1);
		if ( $switcher.length ){
			var oldurl = $switcher.attr('href');
			var newurl = oldurl.replace(/(theme\/)[a-z-]+(\/bootstrap\.min\.css)/ig, '$1'+href+'$2');
			$switcher.attr('href', newurl);
			$('#current_theme').text( $(this).text() );
			createCookie('current_theme', href, 1);
		}
	});
 
  })

}(jQuery)
