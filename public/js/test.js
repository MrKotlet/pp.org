

document.querySelectorAll('.company').forEach(item => {
    item.addEventListener('mouseenter',event => {
        event.target.style.borderColor = '#bc3034';

        event.target.style.borderWidth = '2px';
        event.target.querySelector('.compname').style.color = '#bc3034';
        event.target.querySelector('.opis').style.opacity = '1';


    });
    item.addEventListener('mouseleave',event => {
        event.target.style.borderColor = '#5b5b5b';
        event.target.style.borderWidth = '1px';
        event.target.querySelector('.compname').style.color = 'black';
        event.target.querySelector('.opis').style.opacity = '0';

    });
})
document.querySelectorAll('.event-d').forEach(item =>{
    item.addEventListener('mouseenter', event => {
        event.target.style.color = '#bc3034';
    });
    item.addEventListener('mouseleave', event => {
        event.target.style.color = 'black';
    })
})

const filter = document.getElementById('filter');


function colorChange(){
    filter.style.borderColor = '#bc3034';

}
function colorBack(){
    test.style.color = 'white';
    test.style.fontSize = '3em';
};

const yt = document.getElementById('player');

function embed(){
    yt.className = 'embed-responsive';
}




filter.onmouseover = colorChange();

yt.onload = embed;

