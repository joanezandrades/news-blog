$('#slider-homepage').slick({
    dots: true,
    arrows: true
});

$('#slider-sct3').slick({
   
    responsive: [
        {
            breakpoint: 992,
            settings: {
                dots: true,
                arrows: false,
                slideToShow: 4,
                slideToScroll: 4
            },

            breakpoint: 576,
            settings: {
                dots: true,
                arrows: false,
                slideToShow: 1,
            }            
        }
    ]
})