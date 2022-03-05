/*  ---------------------------------------------------
    Template Name: Ogani
    Description:  Ogani eCommerce  HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

"use strict";

(function($) {
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function() {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $(".featured__controls li").on("click", function() {
            $(".featured__controls li").removeClass("active");
            $(this).addClass("active");
        });
        if ($(".featured__filter").length > 0) {
            var containerEl = document.querySelector(".featured__filter");
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function() {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    //Humberger Menu
    $(".humberger__open").on("click", function() {
        $(".humberger__menu__wrapper").addClass(
            "show__humberger__menu__wrapper"
        );
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on("click", function() {
        $(".humberger__menu__wrapper").removeClass(
            "show__humberger__menu__wrapper"
        );
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });

    /*-----------------------
        Categories Slider
    ------------------------*/
    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: [
            "<span class='fa fa-angle-left'><span/>",
            "<span class='fa fa-angle-right'><span/>",
        ],
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            },
        },
    });

    $(".hero__categories__all").on("click", function() {
        $(".hero__categories ul").slideToggle(400);
    });

    /*--------------------------
        Latest Product Slider
    ----------------------------*/
    $(".latest-product__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: [
            "<span class='fa fa-angle-left'><span/>",
            "<span class='fa fa-angle-right'><span/>",
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*-----------------------------
        Product Discount Slider
    -------------------------------*/
    $(".product__discount__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 2,
            },

            992: {
                items: 3,
            },
        },
    });

    /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
    $(".product__details__pic__slider").owlCarousel({
        loop: true,
        margin: 20,
        items: 4,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*-----------------------
        Price Range Slider
    ------------------------ */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data("min"),
        maxPrice = rangeSlider.data("max");
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function(event, ui) {
            minamount.val("$" + ui.values[0]);
            maxamount.val("$" + ui.values[1]);
        },
    });
    minamount.val("$" + rangeSlider.slider("values", 0));
    maxamount.val("$" + rangeSlider.slider("values", 1));

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*------------------
        Single Product
    --------------------*/
    $(".product__details__pic__slider img").on("click", function() {
        var imgurl = $(this).data("imgbigurl");
        var bigImg = $(".product__details__pic__item--large").attr("src");
        if (imgurl != bigImg) {
            $(".product__details__pic__item--large").attr({
                src: imgurl,
            });
        }
    });

    /*-------------------
        Quantity change
    --------------------- */
    var proQty = $(".pro-qty");
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on("click", ".qtybtn", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });
    $(function() {
        var owl = $(".banner__slider");
        owl.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
        });
    });

    $(".update-cart").on("click", function(e) {
        e.preventDefault();
        let quantity = 0;
        let url = $(this).data("url");
        if ($(".quantity-product")) {
            quantity = $(".quantity-product").val();
        }
        $.ajax({
            url: url,
            method: "post",
            dataType: "json",

            data: {
                _token: $("input[name='_token']").val(),
                id: $(this).data("id"),
                quantity: quantity,
            },

            success: function(data, status, XHR) {
                $(".cart-count").text(data.cart);
                $(".cart-total").text(data.total);
                console.log(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
    });
    $(".update-from-cart").on("change", function(e) {
        e.preventDefault();
        let ele = $(this);
        //console.log($("input[name='_token']").val());
        $.ajax({
            url: ele.data("url"),
            method: "patch",
            data: {
                _token: $("input[name='_token']").val(),
                id: ele.data("id"),
                quantity: ele.val(),
            },
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {
                alert("error");
            },
        });
    });
    $(".remove-from-cart").on("click", function(e) {
        e.preventDefault();

        let ele = $(this);

        if (confirm("Bạn có muốn xóa sản phẩm")) {
            $.ajax({
                url: ele.data("url"),
                method: "DELETE",
                data: {
                    _token: $("input[name='_token']").val(),
                    id: ele.data("id"),
                },
                success: function(response) {
                    window.location.reload();
                },
            });
        }
    });
    $(window).scroll(function(e) {
        if ($(window).scrollTop() > 633) {
            $(".header__bottom").addClass("header-show");

        } else {
            $(".header__bottom").removeClass("header-show");
        }
    });

    $(".humberger__open").on('click', function(e) {
        $(".header__bottom").removeClass("header-show");
    });
})(jQuery);