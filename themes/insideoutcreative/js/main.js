let imgParallax = document.querySelectorAll('.img-parallax-custom');

// for (i = 0; i < imgParallax.length; i++) {
//     console.log(imgParallax[i])
// }

// console.log('testing this');

let parallaxLength = 0

// var oldScrollY = window.scrollY;

window.onscroll = function (e) {
    console.log(window.scrollY); // Value of scroll Y in px

    for (i = 0; i < imgParallax.length; i++) {
        // console.log(imgParallax[i]);
        // console.log(window.scrollY * .1 + ' inside for loop');

        // // previousScrollY = scrollY - 1
        // console.log(`${oldScrollY} this is the previous scroll`)
        // console.log(`${scrollY} this is the current scroll`)
        // if (oldScrollY < scrollY) {
        //     console.log(`it's scrolling down ${scrollY}`)
        // }

        // parallaxLength -= 1
        // console.log(`${parallaxLength / 100} parallax length`)

        // imgParallax[i].style.transform = `translate(0px, ${parallaxLength / 100}%)`;
        imgParallax[i].style.transform = `translate(0px, ${-scrollY / 150}%)`;

        // menuItems[i].addEventListener('click', closeMenu);
        // console.log('menu item clicked');
    }
};
