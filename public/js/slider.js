$(document).ready(function(){
    $('.slider-front').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        centerMode: true,
        dots: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: false
                }
            }
        ]
    });
});