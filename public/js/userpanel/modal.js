$('.modal-toggle').on("click",e=>{
    let id = $(e.currentTarget).attr("data-modal");
    console.log(id);
    $(id).fadeIn()
    $('#overlay-back').show()
})
$('#overlay-back, .modal-close').click(e=>{
    console.log(e.currentTarget);
    $('#overlay-back, .my-modal').hide()
})
