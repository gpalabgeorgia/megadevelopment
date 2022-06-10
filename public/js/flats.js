/*-------------------------
	Flats Page
---------------------------*/
const galleryThumbs = new Swiper('.gallery-thumbs', {
	spaceBetween: 10,
	slidesPerView: 5,
	freeMode: true,
	watchSlidesProgress: true,
});
const galleryTop = new Swiper('.gallery-top', {
 loop: true,
 effect: 'fade',
	autoplay: {
		delay: 2500,
		disableOnInteraction: false,
	},
	navigation: {
		 nextEl: '.swiper-button-next',
		 prevEl: '.swiper-button-prev',
	},
	thumbs: {
		 swiper: galleryThumbs
	}
});