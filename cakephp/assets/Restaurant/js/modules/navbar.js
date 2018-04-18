function navbarSticky() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}

window.onscroll = function() {
    navbarSticky()
};

var navbar = document.getElementsByClassName('nav-bot')[0];
var sticky = navbar.offsetTop;
