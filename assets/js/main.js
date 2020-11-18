$(document).ready(function(){
    let altura = $(".menu").offset().top;
    
    $(window).on("scroll", function(){
        if($(window).scrollTop() > altura){
            $(".menu").addClass("sticky-top");
        }else{
            $(".menu").removeClass("sticky-top");
        }
    })
})


