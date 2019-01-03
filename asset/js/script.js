$(document).ready(function () {
    $(window).on('scroll', function () {
        var yposisi=window.pageYOffset;
        if(yposisi>200){
            $('.navbar').addClass('sticky-top');   
        }
        else{
            $('.navbar').removeClass('sticky-top');  
        }
     });
});