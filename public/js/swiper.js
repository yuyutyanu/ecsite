var swiper = new Swiper('.swiper-container', {
       pagination: '.swiper-pagination',
       effect: 'coverflow',
       grabCursor: true,
       centeredSlides: true,
       slidesPerView: 'auto',
       coverflow: {
           rotate: 50,
           stretch: 0,
           depth: 100,
           modifier: 1,
           slideShadows : true
       },
       autoplay:3000,
       speed:1000,
       loop:true
   });
