
window.addEventListener('DOMContentLoaded', (event) => {
    // select navigation element
    const elNavMain = document.querySelector("#header");
    // construct an instance of Headroom, passing the element
    const headroom = new Headroom(elNavMain);
    // initialise
    headroom.init();
});
