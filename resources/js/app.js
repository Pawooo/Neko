
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
    renderer: 'svg/canvas/html', // Required
    loop: true, // Optional
    autoplay: false, // Optional
    name: "Logo anim left", // Name for future reference. Optional.
  })

const logoGrAnim = bodymovin.loadAnimation({
    container: logoGr, // Required
    path: '/img/lottie/Pawnimatioin-grey.json', // Required
    renderer: 'svg/canvas/html', // Required
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


// Apply for cat dialogue
// anchor link that is converted into a button
const catApplyTrigger = document.querySelector('.neko-browse');
// selects whole dialog 
const catApplyInput = document.getElementById('cat-apply');
const catApplySubmit = document.getElementById('cat-apply-submit-btn');
const catCloseDialog = document.querySelector('[data-dialog-close]');

catApplyTrigger.addEventListener('click', catApplyDialogue);
catApplyInput.addEventListener('close', catSubmitResults);
catApplySubmit.addEventListener('click', catApplySubmitFun);
catCloseDialog.addEventListener('click', closeDialog);

function catApplyDialogue() {
  catApplyInput.showModal();
}

function catSubmitResults() {
  // cat
  console.log(catApplyInput.returnValue);
}

function catApplySubmitFun() {
  // catApplyInput.preventDefault();
  catApplyInput.close(returnValue);
  console.log(returnValue);
}

// closeDialog() => catApplyInput.close();
// Shorthand doesn't work because I'm using a method? 
function closeDialog() {
  catApplyInput.setAttribute('close', '');
  // setTimeout(() => {
  //   catApplyInput.removeAttribute('close');
  //   catApplyInput.close();
  // }, 1000);

  catApplyInput.addEventListener('animationend', () => {
    catApplyInput.removeAttribute('close');
    catApplyInput.close();
  }, {once: true});
  // You can do setTimeout() here as well
  // catApplyInput.close();
}