var swiperimgHeading = new Swiper('.mySwiper', {
   spaceBetween: 20,
   centeredSlides: true,
   loop: true,
   pagination: {
      dynamicBullets: true,
      el: '.swiper-pagination',
      clickable: true,
   },
   autoplay: {
      delay: 2500,
      disableOnInteraction: false,
   },
});
var swiperimgInopiten = new Swiper('.swiperss', {
   slidesPerView: 5,
   spaceBetween: 10,
   direction: getDirection(),
   pagination: {
      dynamicBullets: true,
      el: '.swiper-pagination',
      clickable: true,
   },
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   autoplay: {
      delay: 5000,
      disableOnInteraction: false,
   },
   on: {
      resize: function () {
         swiperimgInopiten.changeDirection(getDirection());
      },
   },
});
function getDirection() {
   var windowWidth = window.innerWidth;
   var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

   return direction;
}
var swiperimgInopiten = new Swiper('.swiperSanPham', {
   slidesPerView: 6,
   spaceBetween: 0,
   direction: getDirection(),
   pagination: {
      dynamicBullets: true,
      el: '.swiper-pagination',
      clickable: true,
   },
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   autoplay: {
      delay: 3500,
      disableOnInteraction: false,
   },
   on: {
      resize: function () {
         swiperimgInopiten.changeDirection(getDirection());
      },
   },
});
function getDirection() {
   var windowWidth = window.innerWidth;
   var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

   return direction;
}
var swiperImg = new Swiper('.swiperImg', {
   slidesPerView: 4.5,
   spaceBetween: 20,
   direction: getDirection(),
   pagination: {
      // dynamicBullets: true,
      el: '.swiper-pagination',
      clickable: true,
   },
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   autoplay: {
      delay: 3000,
      disableOnInteraction: false,
   },
   on: {
      resize: function () {
         swiperimgInopiten.changeDirection(getDirection());
      },
   },
});
function getDirection() {
   var windowWidth = window.innerWidth;
   var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

   return direction;
}
