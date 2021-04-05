$('#fil1').click(() => {
    $ft = $('.filter-tag').length;

    $m = $ft % 4;

    if ($ft < 4) {
        $ft = 0;
    } else {
        $ft -= $m;
        $ft /= 4;
    }
    if ($m) {
        $h = 70 + ($ft + 1) * 50;
    } else {
        $h = 70 + $ft * 50;
    }
    console.log($h);

    if ($('#filter').css("height") === "62px") {
        $('#filter').css("height", $h)
    } else {
        $('#filter').css("height", 62)
    }


    $('.fa-sort-down').toggleClass('rotate');
})

$('.filter-tag').click(event => {

    $data = $(event.currentTarget).attr("id");
    $data = "." + $data;
    console.log($data);


    if ($(event.currentTarget).hasClass('filter-checked')) {


        $($data).hide();


    } else {
        $('.company').not($data).hide();
        $($data).addClass('visible')
    }





    $(event.currentTarget).toggleClass('filter-checked');
    let $check = $('.filter-checked');

    console.log($check.length);

    if ($check.length === 0) {
        $('.company').show().removeClass('visible');
    }

})
$('.reset').click(() => {
    $('.company').show().removeClass('visible');
    $('.filter-tag').removeClass('filter-checked');
})

