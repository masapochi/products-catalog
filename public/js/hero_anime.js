/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/*!************************************!*\
  !*** ./resources/js/hero_anime.js ***!
  \************************************/


var heroTl = gsap.timeline({
  defaults: {
    duration: .7,
    ease: 'power3.out'
  }
});
heroTl.from('.layered-image', {
  scale: 1.3,
  transformOrigin: '50% 50%',
  filter: 'grayscale(100%)',
  delay: .2
});
gsap.utils.toArray(['.layered-text', '.layered-title', '.layered-desc', '.layered-button']).forEach(function (elm) {
  heroTl.from(elm, {
    autoAlpha: 0,
    y: 150
  });
});
/******/ })()
;
//# sourceMappingURL=hero_anime.js.map