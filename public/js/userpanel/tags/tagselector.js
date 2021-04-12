$('.tag-i').click(event => {

    $(event.currentTarget).toggleClass('tag-active');
    $(event.currentTarget).toggleClass('tag-non');

    if ($(event.currentTarget).hasClass('tag-active')) {
        $(event.currentTarget).siblings('.form-control').prop('checked', true);
        $(event.currentTarget).children('.fas').removeClass('d-none');
    } else {
        $(event.currentTarget).siblings('.form-control').prop('checked', false);
        $(event.currentTarget).children('.fas').addClass('d-none');
    }
});
