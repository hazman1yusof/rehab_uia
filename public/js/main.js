$(document).ready(function() {
    // $('.ui.sidebar').sidebar({
    //         onHide: function() {
    //           console.log('on hidden');
    //         }
    //     })
    $('#showSidebar').click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });

    $('.ui.dropdown').dropdown()

    $('.ui.left.fixed.vertical.icon.menu a').popup({position:'right center'});

    /* Back to top fade */
	$(window).scroll(function (event) {
		var scroll = $(window).scrollTop();
	    $('#toTop').hide();
	    if (scroll > 200) {
	    	$('#toTop').show();
	    } else {
	    	$('#toTop').hide();
	    }

	    if (scroll == 0) {
	    	$('.fixed.top.menu').removeClass('slide up');
	    }
	});

	/* Scroll Event*/
    $('a[data-slide="slide"]').on('click', function(e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 90
        }, 900, 'swing');
    });

    if($('#navbar_hide').val() == 'navbar'){
        $('a#showSidebar').hide();
    }

    $('#file_show').click(function(){
        if($('#file_menu').is(":visible")){
            $('#file_menu').hide();
        }else{
            $('#file_menu').show();
        }
    });

    $('#security_show').click(function(){
        if($('#security_menu').is(":visible")){
            $('#security_menu').hide();
        }else{
            $('#security_menu').show();
        }
    });

    $('#charges_show').click(function(){
        if($('#charges_menu').is(":visible")){
            $('#charges_menu').hide();
        }else{
            $('#charges_menu').show();
        }
    });

});

function disableCloseButton(){
    if($('div#mysidebar').hasClass('visible')){
        $('.ui.sidebar').sidebar('toggle');
    }
}