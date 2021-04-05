$('.name-display').children('button').click(()=>{
    $('.name-display').hide();
    $('.name-form').removeClass('d-none')
})
$('.cancel-name').click(event=>{
    event.preventDefault();
    $('.name-display').show();
    $('.name-form').addClass('d-none')

})
