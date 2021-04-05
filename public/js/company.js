$('.gallery-img').children('.img-thumbnail').mouseenter(event=>{
    $(event.currentTarget).addClass('shadow-lg');
})
$('.gallery-img').children('.img-thumbnail').mouseleave(event=>{
    $(event.currentTarget).removeClass('shadow-lg');
})

$('.open-form').click(()=>{
    $('.create-meeting-div').addClass('div-positioning');
    $('#overlay-back').show();
})
$('.close-form, #overlay-back').click(event=>{
    event.preventDefault();
    $('#GalleryModal').addClass('d-none').children().addClass('d-none');
    $('#overlay-back').hide();
    $('.create-meeting-div').removeClass('div-positioning');
})
$('.form-container').click(event=>{

    $(event.currentTarget).removeClass('form-container-inactive').addClass('form-container-active');
    $(event.currentTarget).siblings('.form-container').addClass('form-container-inactive').removeClass('form-container-active');

    $data = $(event.currentTarget).attr("id");
    $data = "."+$data;
    $datas = $data+"s";
    $('.summary').removeClass('d-none');


    $($data).removeClass('d-none').children('div').removeClass('input-invisible');
    $($data).siblings().addClass('d-none').children('div').addClass('input-invisible')
    $($data).siblings().children('div').addClass('input-invisible')
    $($data).siblings().children('div').children('.fa-dot-circle').removeClass('d-none');
    $($data).siblings().children('div').children('.fa-check-circle').addClass('d-none');
    $($data).siblings().children('div').removeClass('selected-hour');
    $($datas).removeClass('d-none').siblings('.date').addClass('d-none');



})
$('.input-container').click(event=>{
    $data = $(event.currentTarget).attr("id");
    $data = "."+$data;
    $datas = $data+"h";
    $(event.currentTarget).toggleClass('selected-hour');
    $(event.currentTarget).siblings('.input-container').removeClass('selected-hour');
    $(event.currentTarget).siblings('.input-container').children('.fa-dot-circle').removeClass('d-none');
    $(event.currentTarget).siblings('.input-container').children('.fa-check-circle').addClass('d-none');
    $(event.currentTarget).children('i').toggleClass('d-none');
    $(event.currentTarget).children('#hours').prop('checked', true);
    $($datas).removeClass('d-none').siblings('.hour').addClass('d-none');
})


$('.gallery-img').children('.img-thumbnail').click(event=>{
    $data = $(event.currentTarget).attr("id");
    $data = "."+$data

    $('#GalleryModal').children($data).removeClass('d-none').addClass('current');


    $('.cross, .next, .prev').removeClass('d-none');

    if($('.current').is(':nth-child(4)')){

        $('.prev').addClass('d-none');

    }
    if($('.current').is(':last-child')){

        $('.next').addClass('d-none');

    }


    $('#GalleryModal').removeClass('d-none');
    $('#overlay-back').show();
})
$('.cross').click(()=>{
    $('#GalleryModal').addClass('d-none').children().addClass('d-none');
    $('#overlay-back').hide();
})

$('.next').click(()=>{

    $('.prev').removeClass('d-none');

    $('.current').addClass('d-none').removeClass('current').next('img').addClass('current').removeClass('d-none');

    if($('.current').is(':last-child')){

        $('.next').addClass('d-none');

    }


})
$('.prev').click(()=>{
    $('.next').removeClass('d-none');

    $('.current').addClass('d-none').removeClass('current').prev('img').addClass('current').removeClass('d-none')

    if($('.current').is(':nth-child(4)')){

        $('.prev').addClass('d-none');

    }



})
