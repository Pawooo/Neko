
// Burger Menu 
// Burger Menu Lottie
const burger = document.querySelector('#burger-icon');
const burgerMenu = document.querySelector('#burger-menu');
const burgerMenuCloser = document.querySelector('#burger-menu-close');

// Burger Menu Display
burger.addEventListener('click', fadeIn);
burgerMenuCloser.addEventListener('click', fadeIn);

function fadeIn(){
    burgerMenu.classList.toggle('stealth');
    burger.classList.toggle('stealth');
    burgerMenuCloser.classList.toggle('stealth');
}

// Logo Lottie
const logoWh = document.querySelector('#logo');
const logoGr = document.querySelector('#dark-mode');

const logoWhAnim = bodymovin.loadAnimation({
    container: logoWh, // Required
    path: '/img/lottie/Pawnimation-white.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: false, // Optional
    name: "Logo anim left", // Name for future reference. Optional.
  })

const logoGrAnim = bodymovin.loadAnimation({
    container: logoGr, // Required
    path: '/img/lottie/Pawnimatioin-grey.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: false, // Optional
    name: "Logo anim right", // Name for future reference. Optional.
  })

logoWh.addEventListener('click', () => {
    logoWhAnim.play();
})

logoGr.addEventListener('click', () => {
    logoGrAnim.play();
})


