$(document).ready(function() {
    /* Add stripped animation to button on submit */
    $("button[type='submit']").click(function(e){
        var $button = $(e.target);
        $button.addClass('btn-striped').addClass('btn-active');
        setInterval(function(e){
            $button.removeClass('btn-striped').removeClass('btn-active'); 
        },1000);
    });
});