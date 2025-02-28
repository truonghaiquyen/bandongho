var swiper = new Swiper('.mySwiperImg', {
   slidesPerView: 1,
   centeredSlides: true,
   pagination: {
      el: '.swiper-pagination',
      type: 'fraction',
   },
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
});

var appendNumber = 4;
var prependNumber = 1;
document.querySelector('.prepend-2-slides').addEventListener('click', function (e) {
   e.preventDefault();
   swiper.prependSlide([
      '<div class="swiper-slide">Slide ' + --prependNumber + '</div>',
      '<div class="swiper-slide">Slide ' + --prependNumber + '</div>',
   ]);
});
function message() {
   alert('MỜI BẠN ĐĂNG NHẬP ĐỂ THÊM HÀNG');
}
