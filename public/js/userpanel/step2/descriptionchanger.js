$('.slide').children('button').click(()=>{
    $('.desc-form').show();
    $('.slide').hide()
})
$('.switch').children('button').click(()=>{
    $('.description').hide()
    $('.desc-form').show();
    $('.switch').hide()
})
$('.cancel-desc').click(event=>{
    event.preventDefault();
    $('.description').show()
    $('.desc-form').hide();
    $('.switch').show()
    $('.slide').show()
})

