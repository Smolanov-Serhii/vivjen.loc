$(document ).ready(function() {
    if($('#banner-slider').length){
        var swiper = new Swiper("#banner-slider", {
            navigation: {
                nextEl: ".banner .next",
                prevEl: ".banner .prev",
            },
        });
    }

    if($('section.faq').length){
        $( ".faq__item-header" ).click(function() {
            $('.faq__item-content').fadeOut(300);
            $(this).closest('.faq__item').find('.faq__item-content').fadeIn(300);
            $('.horizontal').fadeIn(300);
            $(this).closest('.faq__item').find('.horizontal').fadeOut(300)
        });
    }

    if($('#header').length){
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            /*Если сделали скролл на 100px задаём новый класс для header*/
            if(height > 100){
                $('header').addClass('header-fixed');
            } else{
                /*Если меньше 100px удаляем класс для header*/
                $('header').removeClass('header-fixed');
            }
        });
    }


    if($('.teathers').length){
        var teathers = new Swiper(".teathers .swiper-container", {
            slidesPerView: 3,
            centeredSlides: true,
            // loop: true,
            spaceBetween: 30,
            navigation: {
                nextEl: ".teathers .next img",
                prevEl: ".teathers .prev img",
            },
        });
        teathers.slideTo(1, false,false);
    }

    if($('section.tasks').length){
        console.log('taska')
        var tasks = new Swiper("section.tasks .swiper-container", {
            slidesPerView: 1,
            effect: "fade",
            loop: true,
            pagination: {
                el: "section.tasks .swiper-pagination",
                clickable: true,
            },
        });
    }


    if($('.feedback').length){
        var feedback = new Swiper(".feedback .swiper-container", {
            slidesPerView: 2,
            spaceBetween: 50,
            navigation: {
                nextEl: ".feedback .next",
                prevEl: ".feedback .prev",
            },
        });
    }
});