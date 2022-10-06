// START OF FADE IN ANIMATIONS
isInViewport = function (elem) {
    distance = elem.getBoundingClientRect();
    return (
        distance.top >= 0 &&
        distance.left >= 0 &&
        distance.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        distance.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};

// START OF FADE IN ANIMATIONS
isAtTop = function (elem) {
    bounding = elem.getBoundingClientRect();
    return (
        bounding.top <= 0
    );
};
isNotAtTop = function (elem) {
    bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0
    );
};

isActive = function (elem) {
    bounding = elem.getBoundingClientRect();
    return (
        bounding.bottom <= 0
    );
};

isAnchorAtTop = function (elem) {
    bounding = elem.getBoundingClientRect();
    return (
        bounding.top <= 200
    );
};
isAnchorNotAtTop = function (elem) {
    bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 200
    );
};

isAnchorActive = function (elem) {
    bounding = elem.getBoundingClientRect();
    return (
        bounding.bottom <= 200
    );
};

let scrollLength = window.scrollY;
window.addEventListener('scroll', function () {
    // fadeRight animation
    let fullHeight = document.querySelectorAll('.full-height');
    for (i = 0; i < fullHeight.length; i++) {

        id = fullHeight[i].getAttribute('id');
        anchor = document.querySelector('#anchor-' + id);
        // console.log(id);

        if (isAtTop(fullHeight[i])) {
            fullHeight[i].classList.add('active');
        }
        if (isNotAtTop(fullHeight[i])) {
            fullHeight[i].classList.remove('active');
        }
        if (isActive(fullHeight[i])) {
            fullHeight[i].classList.remove('active');
        }
        if (isAnchorAtTop(fullHeight[i])) {
            anchor.classList.add('active');
        }
        if (isAnchorNotAtTop(fullHeight[i])) {
            anchor.classList.remove('active');
        }
        if (isAnchorActive(fullHeight[i])) {
            anchor.classList.remove('active');
        }
    }

}, false);
// END OF FADE IN ANIMATIONS

// START OF TEXT ANIMATIONS

// Wrap every letter in a span

sectionPuristFoods = document.querySelector('#section-purist-foods .col');
section1950 = document.querySelector('#section-1950 .col');
section1960 = document.querySelector('#section-1960 .col');
section1970 = document.querySelector('#section-1970 .col');
section1980 = document.querySelector('#section-1980 .col');
section1990 = document.querySelector('#section-1990 .col');
section2000 = document.querySelector('#section-2000 .col');
sectionPresent = document.querySelector('#section-present .col');
// section1946 = document.querySelector('#section-1946 .col');
// section1957 = document.querySelector('#section-1957 .col');
// section1960s = document.querySelector('#section-1960s .col');
// sectionCustomerService = document.querySelector('#section-customer-service .col');
// sectionSincerely = document.querySelector('#section-sincerely .col');

let t = 0;
let a = 0;
let b = 0;
let c = 0;
let d = 0;
let e = 0;
let f = 0;
let g = 0;
let h = 0;

let j = 0;
let k = 0;
let l = 0;
let m = 0;