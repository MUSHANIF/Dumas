// require("./bootstrap");

$(window).on("load", function () {
    var nav = $("#navbar")[0];
    var navHome = $("#navHome")[0];
    var navTataCara = $("#navTataCara")[0];
    var navAbout = $("#navAbout")[0];

    function activeNavbar() {
        if (window.scrollY >= 520 && window.scrollY < 1390) {
            navHome.classList.remove("active");
            navAbout.classList.remove("active");

            navTataCara.classList.add("active");
        } else if (window.scrollY >= 1390) {
            navHome.classList.remove("active");
            navTataCara.classList.remove("active");

            navAbout.classList.add("active");
        } else {
            navTataCara.classList.remove("active");
            navAbout.classList.remove("active");

            navHome.classList.add("active");
        }
    }

    $(window)
        .on("resize", function () {
            if ($(window).width() >= 975) {
                window.onscroll = function () {
                    nav.classList.remove("bg-light-transparent");
                    nav.classList.add("bg-transparent");
                    if (window.scrollY > 0) {
                        nav.classList.remove("bg-transparent");
                        nav.classList.add("shadow", "bg-light-blur");
                    } else {
                        nav.classList.remove("shadow", "bg-light-blur");
                        nav.classList.add("bg-transparent");
                    }

                    activeNavbar();
                };
            } else {
                nav.classList.remove("shadow", "bg-light-blur");
                nav.classList.add("bg-transparent");
                window.onscroll = function () {
                    if (window.scrollY > 0) {
                        nav.classList.add("bg-light-transparent");
                        nav.classList.remove("bg-transparent");
                    } else {
                        nav.classList.remove("bg-light-transparent");
                        nav.classList.add("bg-transparent");
                    }

                    activeNavbar();
                };
            }
        })
        .resize();

    $(".navscroll").click(function (e) {
        var href = $(this).attr("href");
        var sectionTujuan = $(href)[0];
        var jarakTujuan = $(sectionTujuan).offset().top;
        $("html, body").animate({ scrollTop: jarakTujuan - 70 }, 40);

        e.preventDefault();
    });
});
