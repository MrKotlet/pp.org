

$('#logo-place').click(()=>{
    $('#ex5').show();
})

$('[href="#ex3"]').click(()=>{
    $('#ex3').show();

})
$('[href="#ex4"]').click(()=>{
    $('#ex4').show();

})

$('#logo-place').mouseenter(()=>{
    $('#logo-place').addClass('logo-cir');
    $('.pic-div').removeClass('pic-div-red');

    $('#logo-place').children('img').addClass('d-none');
    $('#logo-place').children('i').removeClass('d-none');
    $('#logo-place').children('p').removeClass('d-none');
})


$('#logo-place').mouseleave(()=>{
    $('#logo-place').removeClass('logo-cir');
    $('.pic-div').addClass('pic-div-red');


    if($('#logo-place').children('img').hasClass('w-100')){
        $('#logo-place').children('img').removeClass('d-none');
        $('#logo-place').children('i').addClass('d-none');
        $('#logo-place').children('p').addClass('d-none');
    }
})


$('.pic-div').mouseenter(()=>{

    $('.pic-div').addClass('pic-div-hidden');

    $('.pic-div').addClass('pic-div-red');

})


$('.pic-div').mouseleave(()=>{
    $('.pic-div').removeClass('pic-div-red');

    $('.pic-div').removeClass('pic-div-hidden');

})
