$('.modal-toggle').on("click",e=>{
    let id = $(e.currentTarget).attr("data-modal");
    console.log(id);
    $(id).fadeIn()
    $('#overlay-back').show()
})
$('#overlay-back, .modal-close, .confirmation-close').click(e=>{
    console.log(e.currentTarget);
    $('#overlay-back, .my-modal').fadeOut()
})
$('.meet-cancel').on("click",e=>{
    let id = $(e.currentTarget).attr("data-modal");
    console.log(id)
    let $modal = $('.confirmation')
    console.log("/meetnope/"+id);
    $('.delete').attr("href","/meetnope/"+id) ;


    console.log($('.delete').attr("href"));

    $('.confirmation').fadeIn()
    $('#overlay-back').show()
})
