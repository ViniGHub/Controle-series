let aside = document.querySelector('#sideBar');
let imgNav = document.querySelector('#imgNav');

function navbar() {
    if (aside.style.width == "25vw") {
        aside.style.width = "7vw";
        imgNav.style.position = "relative";
        imgNav.style.left = "0px";
        return;
    }

    imgNav.style.position = "absolute";
    imgNav.style.left = "100px";
    aside.style.width = "25vw";

}