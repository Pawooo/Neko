// Splide 
// window.location.href == 'neko.test' made it 2s faster, but still does not work with queries
// document.URL.length <= 17 does not work with queries
// In wordpress you can do it this way https://help.codesnippets.pro/article/42-can-i-run-my-snippet-on-just-one-page
// It would seem that adding a unique class to my page is the only way to go 

const h1top = document.querySelector('[data-page]');

if(h1top.dataset.page === "top-page") {
    document.addEventListener( 'DOMContentLoaded', function() {
      const splide = new Splide( '.splide', {
        type: 'loop',
        drag: 'free',
        focus: 'center',
        pagination: false,
        perPage: 3,
        direction: 'rtl',
        autoScroll: {
            speed: 1,
        }
      });
      splide.mount( window.splide.Extensions );
    } );
}