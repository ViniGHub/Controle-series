let aside = document.querySelector('#sideBar');
let imgNav = document.querySelector('#imgNav');
aside.style.width = "7vw";

function navbar() {
    $('aside > a, aside > form').hide();
    if (aside.style.width == "7vw") {
        aside.style.overflow = 'hidden';
        aside.style.width = "2vw";
        aside.style.minWidth = "40px";
        aside.classList.remove('p-4');
        imgNav.style.marginLeft = '0';
        $('.bars > i').show();
        
        return;
    }

    $('.bars > i').hide();
    aside.classList.add('p-4');
    aside.style.width = "7vw";
    aside.style.minWidth = "125px";
    $('aside > a, aside > form').show();

}

navbar();
