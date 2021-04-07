







$(window).scroll(() => {
    let ws = window.scrollY;
    let wh = window.innerHeight;
    const $jumbo = $('.jumbotron')
    const $jo = $jumbo.offset().top;
    const $jh = $jumbo.height();
    if (ws === 0) {
        $jumbo.css("left", "-100%")
    }
    if(ws+wh > $jo + $jh){
        $jumbo.css("left", "0%")
    }
    if (wh + ws >= $jo & wh + ws <= $jo + $jh) {
        let dif = wh + ws - $jo - $jh;
        let percentage = Math.floor(dif / $jh * 100)

        $jumbo.css("left", percentage + "%")
    }
})

$(window).resize(()=>{

})

$('.event-small').on("click", function(){

    if(window.innerWidth<=450){

    const $a = $(this).siblings('.event-big').children('a').attr('href');
    window.location.assign("https://polishparts.org/"+$a)

    }else{
        const $p = $(this).parent()
        $p.toggleClass('active');
        if($p.hasClass('active')){
console.log($p.hasClass('active'))
            $p.siblings('.calendar-event').animate({
                height: 0,
                padding: 0,
            },400);
        }else{
            console.log($p.hasClass('active'))
            $p.siblings('.calendar-event').delay(800).animate({
                height: "100%",
                padding: "10px",
            }, 400);
        }

    }


})
