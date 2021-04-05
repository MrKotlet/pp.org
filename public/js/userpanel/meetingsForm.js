$('.form-toggler').click(()=>{
    $('.form-toggler').toggleClass('btn-success');
    $('.form-toggler').toggleClass('btn-outline-success')
    $('.form').toggleClass('d-none')
    $('#b2b').prop('checked', true)
})
$('.input-div').click(event=>{
    $(event.currentTarget).toggleClass('input-checked');
    $(event.currentTarget).children('i').toggleClass('d-none');

    if($(event.currentTarget).hasClass('input-checked')){
        $(event.currentTarget).children('.hour-input').prop('checked', true);
    }else {
        $(event.currentTarget).children('.hour-input').prop('checked', false);
    }


})
