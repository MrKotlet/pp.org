$('.home-link').mouseover(event=>{
    $(event.currentTarget).addClass('home-link-active');
    $(event.currentTarget).children('.link').addClass('home-a-active');
});
$('.home-link').mouseleave(event=>{
    $(event.currentTarget).removeClass('home-link-active');
    $(event.currentTarget).children('.link').removeClass('home-a-active');
});
$('.menu-toggle').click(()=>{
    $('.nav-div').toggleClass('active');
    $('#overlay-back').toggle();
    if($('.nav-div').hasClass('active')){
        $('.menu-toggle').text("close");
    }else{
        $('.menu-toggle').text("menu");
    }
})
