/* SCROLL ANIMATION HOME PAGE*/
const firstView = document.getElementById('scroll');
const secondView = document.getElementById('video');
let scrolling = 0;

window.onscroll = function() {

    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > scrolling) {
        secondView.scrollIntoView({ behavior: "smooth" });
    }
    else {
        firstView.scrollIntoView({ behavior: "smooth" });
    }
    scrolling = scrollTop <= 0 ? 0 : scrollTop;
};

const clicker = document.getElementById('clic');

clicker.addEventListener('click', function() {
    if(window.matchMedia("(min-width: 1024px)").matches) {
    secondView.scrollIntoView({ behavior: "smooth"});
    } else {
        document.location.href="project";
    }
});

