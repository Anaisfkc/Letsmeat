$(document).ready(function(){
    $(".dropdown").on("mouseover", function(event){
        $(".dropdown-menu").stop().slideDown(200);
    });    
});

$(".dropdown").on("mouseleave", function(event){
    $(".dropdown-menu").stop().slideUp(200);
});