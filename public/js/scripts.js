$(document).ready(function () {
    $(".comments__add").click(function (e) {
        e.preventDefault();
        $(".comments_form").slideToggle();
    });
    $("a.like").click(function () {
        var this_item = $(this);
        $.ajax({
            url: "/likes/" + $(this).data("code"),
            type: "post",
            dataType: "text",
            data: {_token: $(this).data("token")},
            success: function (ans) {
                this_item.addClass("active");
            }
        })
    });


    /* Hamburger main nav */
    $('.main-hamburger').click(function (e) {
        e.preventDefault();
        if ($(window).width() < 768) {
            $('.search__input').hide();
        }
        $(this).closest('.nav').find('.nav__list').toggle();
    });

    /* Search */
    if ($(window).width() < 1120) {
        $('.loupe').click(function (e) {
            e.preventDefault();
            if ($(window).width() < 768) {
                $('.nav__list').hide();
            }
            $(this).closest('.search__label').find('.search__input').show();
        });
    }

    if ($(window).width() < 768) {
        $('#head__search input[type="search"]').focus(function (e) {
            $(this).closest('.header').find('.header__slogan').css('visibility', 'hidden');
        });
        $('#head__search input[type="search"]').blur(function (e) {
            $(this).closest('.header').find('.header__slogan').css('visibility', 'visible');
        });
    }


    $(window).resize(function () {
        if ($(window).width() >= 768) {
            $('.header__slogan').css('visibility', 'visible');
            $('.nav__list').show();
        } else if ($(window).width() >= 1120) {
            $('.search__input').show();
        } else {
            $('.search__input').hide();
            $('.nav__list').hide();
        }
    });

    /* Categories sub-list */
    $('.categories__link').click(function (e) {
        // e.preventDefault();
        // $(this).siblings('.sub-categories').slideToggle();
    });

    /* Hamburger categories */
    $('.cat-hamburger').click(function (e) {
        e.preventDefault();
        $(this).siblings('.categories__list').slideToggle();
    });

    /* плавный скролл наверх */
    // $('.up').click(function () {
    //     $("html, body").animate({
    //         scrollTop: 0
    //     }, 600);
    //     return false;
    // });


});