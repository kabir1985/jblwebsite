$(function () {
	
	$("a.highlight").closest("li").closest("ul").closest("li").children("a").addClass('active');			
	$("ul.art-vmenu a.highlight").closest("li").closest("ul").css("display","block");
	
    var items = $('#v-nav>ul>li').each(function () {
        $(this).click(function () {
            //remove previous class and add it to clicked tab
            items.removeClass('current');
            $(this).addClass('current');

            //hide all content divs and show current one
            //$('#v-nav>div.tab-content').hide().eq(items.index($(this))).show();

            //$('#v-nav>div.tab-content').hide().eq(items.index($(this))).fadeIn(100);    

            $('#v-nav>div.tab-content').hide().eq(items.index($(this))).show();
            window.location.hash = $(this).attr('tab');
        });
    });
	
	/****************************************************************/

 $('#my_accordion li').css( "list-style-type", "none" );
   var items2 = $('#my_accordion>li>a').each(function () {
        $(this).click(function () {
    
    if ($(this).attr('class') != 'active'){
      $('#my_accordion li ul').slideUp();
      $(this).next().slideToggle();
      $('#my_accordion li a').removeClass('active');
      $(this).addClass('active');
	   //$(this).closest('ul').next().find('.ch').slideToggle();  
    }
     });
    });

	
	/*************************************************************/

    if (location.hash) {
        showTab(location.hash);
    }
    else {
        showTab("tab1");
    }

    function showTab(tab) {
        $("#v-nav ul li:[tab*=" + tab + "]").click();
    }

    // Bind the event hashchange, using jquery-hashchange-plugin
    $(window).hashchange(function () {
        showTab(location.hash.replace("#", ""));
    })

    // Trigger the event hashchange on page load, using jquery-hashchange-plugin
    $(window).hashchange();
});