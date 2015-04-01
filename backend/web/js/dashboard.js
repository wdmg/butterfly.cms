
/* Init butterfly preloader */
$(window).load(function() {
    $('.preloader').animate({'opacity':0},1000,
        function (){
            $(this).css('display','none');
            $(this).remove();
        });
});
    
/* Sidebar resize*/
$(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show');
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide');
});

$(document).ready(function() {
    /* Add stripped animation to button on submit */
    $("button[type='submit']").click(function(e){
        var $button = $(e.target);
        $button.addClass('btn-striped').addClass('btn-active');
        setInterval(function(e){
            $button.removeClass('btn-striped').removeClass('btn-active'); 
        }, 1000);
    });
    
    /* Init tooltips */
    $('[rel=tooltip]').tooltip();
        
    /* Toggle sitebar */
    var sidebarWidth = $('.sidebar').outerWidth();
    $('.sidebar').click(function(e){
        if($(this).hasClass('off')) {
            if(e.offsetX > $(this).outerWidth() - 10) {
                $(this).stop(true).animate({width:sidebarWidth},function(){
                    $(this).removeClass('off');
                    $('.content').removeClass('col-sm-12 col-md-12 col-lg-12').addClass('col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3');
                });
            };
        } else {
            if(e.offsetX > $(this).outerWidth() - 6) {
                $(this).stop(true).animate({width:6},function(){
                    $(this).addClass('off');
                    $('.content').removeClass('col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3').addClass('col-sm-12 col-md-12 col-lg-12');
                });
            };
        };
        e.preventDefault();
    });
});

