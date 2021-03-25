//  page preload------------------
$("#main").jpreLoader({
    loaderVPos: "50%",
    autoClose: true
}, function() {
    $(".left-colum").removeClass("vis-colum");
    $(".right-colum").removeClass("vis-colum2");
    $("#project-gallery  .swiper-slide img").each(function(a) {
        var b = $(this);
        setTimeout(function() {
            b.removeClass("vis-colum");
        }, 250 * a);
    });
    $(".page-title ul").animate({
        opacity: 1,
        top: "0"
    }, 500);
    contanimshow();
});
$("body").append('<div class="loader"><span></span></div>');
//  functions------------------
function initMontage() {
    "use strict";
	//  init swiper------------------
    var a = $(".swiper-wrapper .swiper-slide").length;
    var b = new Swiper("#vertical-slider", {
        speed: 1200,
        loop: false,
        preventLinks: true,
        grabCursor: true,
        mousewheelControl: true,
        mode: "vertical",
        pagination: ".pagination",
        paginationClickable: true,
        onSlideChangeEnd: function() {
            $("#vertical-slider .presSlidesActive").html(b.activeIndex + 1);
        }
    });
    $("#vertical-slider .presSlidesActive").html("1");
    $("#vertical-slider .presSlidesFrom").html(a);
    $(".ver a.arrow-left").on("click", function(a) {
        a.preventDefault();
        b.swipePrev();
    });
    $(".ver a.arrow-right").on("click", function(a) {
        a.preventDefault();
        b.swipeNext();
    });
    var c = new Swiper("#horizontal-slider", {
        speed: 1200,
        loop: false,
        preventLinks: true,
        grabCursor: true,
        mousewheelControl: true,
        mode: "horizontal",
        pagination: ".pagination",
        paginationClickable: true,
        onSlideChangeEnd: function() {
            $("#horizontal-slider .presSlidesActive").html(c.activeIndex + 1);
        }
    });
    $("#horizontal-slider .presSlidesActive").html("1");
    $("#horizontal-slider .presSlidesFrom").html(a);
    $(".hor a.arrow-left").on("click", function(a) {
        a.preventDefault();
        c.swipePrev();
    });
    $(".hor a.arrow-right").on("click", function(a) {
        a.preventDefault();
        c.swipeNext();
    });
    var d = new Swiper("#slideshow-slider", {
        speed: 2200,
        loop: true,
        autoplay: 5000,
        mode: "vertical"
    });
    $(".slide-title a").hover(function() {
        $(".swiper-slide").find("div.overlay").animate({
            opacity: .1
        }, 500);
        $(".slide-title span.title-date , .slide-title h3").addClass("scale-bg5");
    }, function() {
        $(".swiper-slide").find("div.overlay").animate({
            opacity: .5
        }, 500);
        $(".slide-title span.title-date , .slide-title h3").removeClass("scale-bg5");
    });
    var e = $("#project-gallery").swiper({
        slidesPerView: "auto",
        watchActiveIndex: true,
        centeredSlides: false,
        mousewheelControl: true,
        paginationClickable: true,
        resizeReInit: true,
        keyboardControl: true,
        grabCursor: true,
        onImagesReady: function() {
            f();
        },
        onSlideChangeStart: function() {
            if ($(".pag2").hasClass("swiper-slide-visible")) $(".swipe-info").animate({
                opacity: .1
            }, 500); else $(".swipe-info").animate({
                opacity: 1
            }, 500);
        }
    });
    function f() {
        var a = $("#project-gallery .swiper-slide img").width();
        if (a + 10 > $(window).width()) a = $(window).width() - 20;
        $("#project-gallery .swiper-slide").css("width", a + 20);
    }
    f();
    $(".portfolio-options.arrow-left").on("click", function(a) {
        a.preventDefault();
        e.swipePrev();
    });
    $(".portfolio-options.arrow-right").on("click", function(a) {
        a.preventDefault();
        e.swipeNext();
    });
    var g = $("#project-gallery2").swiper({
        watchActiveIndex: true,
        centeredSlides: true,
        mousewheelControl: true,
        resizeReInit: true,
        keyboardControl: true,
        grabCursor: true,
        onSlideChangeEnd: function() {
            $("#project-gallery2 .presSlidesActive").html(g.activeIndex + 1);
        },
        onImagesReady: function() {
        var a = $("#project-gallery2 .swiper-slide img").width();
        if (a + 10 > $(window).width()) imgWidth = $(window).width() - 20;
        $("#project-gallery2 .swiper-slide").css("width", $("#project-gallery2 .swiper-slide img") + 20);
        }
    });
    $("#project-gallery2 .presSlidesActive").html("1");
    $("#project-gallery2 .presSlidesFrom").html(a);
 
    $(".portfolio-options2.arrow-left2").on("click", function(a) {
        a.preventDefault();
        g.swipePrev();
    });
    $(".portfolio-options2.arrow-right2").on("click", function(a) {
        a.preventDefault();
        g.swipeNext();
    });
 
    $(".swipe-info").on("click", function(a) {
        a.preventDefault();
        e.swipeTo($(".pag2").index(), 500, false);
        $(this).animate({
            opacity: .1
        }, 500);
    });
    $(".call-fixed-info").bind("click", function(a) {
        a.preventDefault();
        if ($(this).hasClass("not-vis")) {
            $(".fixed-info").animate({
                left: 0,
                opacity: 1
            }, 300);
            setTimeout(function() {
                $(".swiper-container").addClass("scale-bg4");
            }, 450);
            $(this).removeClass("not-vis");
        } else {
            $(this).addClass("not-vis");
            $(".fixed-info").animate({
                left: "-350px",
                opacity: 0
            }, 300);
            setTimeout(function() {
                $(".swiper-container").removeClass("scale-bg4");
            }, 450);
        }
        return false;
    });
 
	         $(".inner img").css({
            "margin-top": - $(".inner img").height() / 2 + "px"
        });
    $(window).bind("resize", function() {
  
	         $(".inner img").css({
            "margin-top": - $(".inner img").height() / 2 + "px"
        });
    });
	
function initIsotope() {
	
		//  isotop------------------
    if ($(".gallery-items").length) {
        var i = $(".gallery-items").isotope({
            singleMode: true,
            columnWidth: ".grid-sizer,.grid-sizer-second,.grid-sizer-three",
            itemSelector: ".gallery-item, .gallery-item-second, .gallery-item-three"
        });
		i.imagesLoaded(function() {
                i.isotope("layout");
        });
        $(".gallery-filters").on("click", "a", function(a) {
            a.preventDefault();
            $(".count-folio div.num-album").shuffleLetters({});
            var b = $(this).attr("data-filter");
            i.isotope({
                filter: b
            });
            $(".gallery-filters a").removeClass("gallery-filter_active");
            $(this).addClass("gallery-filter_active");
        });
        i.isotope("on", "layoutComplete", function(a, b) {
            var c = b.length;
            $(".num-album").html(c);
        });
    }
	
	}	
	
	initIsotope();

    $(window).load(function() {
		initIsotope();
    });
    var j = $(".gallery-item").length;
    $(".all-album , .num-album").html(j);
    $(".filter-button").click(function() {
        $(".fixed-filters").toggleClass("vis-filter");
    });
	//  magnificPopup------------------
    $(".image-popup").magnificPopup({
        type: "image",
        closeOnContentClick: false,
        removalDelay: 600,
        mainClass: "my-mfp-slide-bottom",
        image: {
            verticalFit: false
        }
    });
    $(".popup-gallery").magnificPopup({
        delegate: "a",
        type: "image",
        fixedContentPos: true,
        fixedBgPos: true,
        tLoading: "Loading image #%curr%...",
        removalDelay: 600,
        closeBtnInside: true,
        zoom: {
            enabled: true,
            duration: 700
        },
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [ 0, 1 ]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });
    $(".popup-gallery2").magnificPopup({
        delegate: "a",
        type: "image",
        fixedContentPos: true,
        fixedBgPos: true,
        tLoading: "Loading image #%curr%...",
        removalDelay: 600,
        closeBtnInside: true,
        mainClass: "my-mfp-slide-bottom",
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [ 0, 1 ]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        },
        callbacks: {
            buildControls: function() {
                this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
            }
        }
    });
	//  window scroll------------------
 
    $(".info-wrapper").css("margin-top", -$(".info-wrapper").height() / 2 + "px");
    $(".scroll-link").on("click", function() {
        var a = 100;
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") || location.hostname == this.hostname) {
            var b = $(this.hash);
            b = b.length ? b : $("[name=" + this.hash.slice(1) + "]");
            if (b.length) {
                $("html,body").animate({
                    scrollTop: b.offset().top - a
                }, {
                    queue: false,
                    duration: 600,
                    easing: "easeOutSine"
                });
                return false;
            }
        }
    });
    window.sr = new scrollReveal({
        reset: true,
        move: "50px",
        mobile: false
    });
    $(".sidebar").scrollToFixed({
        marginTop: 120,
        minWidth: 1024
    });
    $(".blog-holder").css({
        marginTop: $(".blog-header").outerHeight(true)
    });
	//  contact form ------------------
    $("#contactform").submit(function() {
        var a = $(this).attr("action");
        $("#message").slideUp(750, function() {
            $("#message").hide();
            $("#submit").attr("disabled", "disabled");
            $.post(a, {
                name: $("#name").val(),
                email: $("#email").val(),
                comments: $("#comments").val()
            }, function(a) {
                document.getElementById("message").innerHTML = a;
                $("#message").slideDown("slow");
                $("#submit").removeAttr("disabled");
                if (null != a.match("success")) $("#contactform").slideDown("slow");
            });
        });
        return false;
    });
    $("#contactform input, #contactform textarea").keyup(function() {
        $("#message").slideUp(1500);
    });
	//  responsive video ------------------
    $(".video-holder").height($(".media-container").height());
    if ($(window).width() > 1024) {
        if ($(".video-holder").size() > 0) if (($(".media-container").height() + 150) / 9 * 16 > $(".media-container").width()) {
            $("iframe , #player").height($(".media-container").height() + 150).width(($(".media-container").height() + 150) / 9 * 16);
            $("iframe , #player").css({
                "margin-left": -1 * $("iframe").width() / 2 + "px",
                top: "-75px",
                "margin-top": "0px"
            });
        } else {
            $("iframe , #player").width($(window).width()).height($(window).width() / 16 * 9);
            $("iframe , #player").css({
                "margin-left": -1 * $("iframe").width() / 2 + "px",
                "margin-top": -1 * $("iframe").height() / 2 + "px",
                top: "50%"
            });
        }
    } else if ($(window).width() < 760) {
        $(".video-holder").height($(".media-container").height());
        $("iframe , #player").height($(".media-container").height());
    } else {
        $(".video-holder").height($(".media-container").height());
        $("iframe , #player").height($(".media-container").height());
    }	
	 var $f = $("iframe.vimeo"),
      url = $f.attr('src');

  if ( window.addEventListener )
      window.addEventListener('message', onMessageReceived, false);
  else
      window.attachEvent('onmessage', onMessageReceived, false);

  function onMessageReceived(e) {

    var data = JSON.parse(e.data);

    switch (data.event) {
        case 'ready':
          var data = { method: 'setVolume', value: '100' };
          $f[0].contentWindow.postMessage(JSON.stringify(data), url);
          break;
    }

  }
	// IMPORTANT   INIT YOUR FUNCTIONS HERE ------------------
	
	
	
	
	
	
	
	//
}
//  detect mobile ------------------
function initanim() {
    var a = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return a.Android() || a.BlackBerry() || a.iOS() || a.Opera() || a.Windows();
        }
    };
    trueMobile = a.any();
    if (trueMobile) {
        $(".video-holder iframe").remove();
        $(".mob-bg").fadeIn(10);
    }
    if (null == trueMobile) {
        var b = $(".folio-content").kinetic({
            filterTarget: function(a, b) {
                if (!/down|start/.test(b.type)) return !/area|a|input/i.test(a.tagName);
            },
            maxvelocity: 1290,
            moved: function() {
                $(".kinekt-wrapper").css({
                    cursor: "-webkit-grabbing"
                });
            },
            stopped: function() {
                $(".kinekt-wrapper").css({
                    cursor: "-webkit-grab"
                });
            }
        });
        $("#menu a span  , .gallery-filters a span").hover(function() {
            $(this).shuffleLetters({});
        });
    }
}
//  quick view ------------------
$(".open-project").click(function(a) {
    a.preventDefault();
    $("#project-page-holder").fadeIn(400).addClass("vis-bg");
    hideShare();
    if ($(this).hasClass("visproject")) {
        var b = $("a.open-project").attr("href") + " .item-data";
        $("#project-page-data").load(b);
        $("#project-page-data").animate({
            opacity: 1
        }, 400);
        $("#project-page-data").fadeIn("slow", function() {
            $(".open-project").removeClass("visproject");
            showProjectlist();
            $("#list_close").click(function(a) {
                a.preventDefault();
                hideprojectlist();
            });
        });
        return false;
    }
});
function showProjectlist() {
    setTimeout(function() {
        $(".elem-list").each(function(a) {
            var b = $(this);
            setTimeout(function() {
                b.addClass('vis-list');
            }, 100 * a);
        });
    }, 350);
}
function hideprojectlist() {
    $(".open-project").addClass("visproject");
    $("#project-page-data").find(".project-list li").fadeOut();
    $("#project-page-holder").fadeOut().removeClass("vis-bg");
}
function contanimshow() {
    $(".elem").removeClass("scale-bg2");
    setTimeout(function() {
        $(".left-colum").removeClass("vis-colum");
        $(".right-colum").removeClass("vis-colum2");
        $("#project-gallery  .swiper-slide img").each(function(a) {
            var b = $(this);
            setTimeout(function() {
                b.removeClass("vis-colum");
            }, 250 * a);
        });
    }, 1450);
    setTimeout(function() {
        $(".page-title ul").animate({
            opacity: 1,
            top: "0"
        }, {
            queue: false,
            duration: 250
        });
    }, 1650);
}
function contanimhide() {
    $(".page-title ul").animate({
        opacity: 0,
        top: "126px"
    }, 250);
    setTimeout(function() {
        $(".elem").addClass("scale-bg2");
    }, 650);
}
//  menu ------------------
$("#menu").css("margin-top", - $("#menu").height() / 2 + "px");
$("#menu").menu();
var cm = $(".call-menu");
var nh = $(".nav-holder");
var lh = $(".logo-holder");
var ap = $("#audio-player ");
var ww = $(window).width();
var shrcn = $(".share-container");
function showmenu() {
    cm.animate({
        left: "304px"
    }, 200);
    if (ww < 756) lh.animate({
        left: "-26px"
    }, 200); else lh.animate({
        left: "-56px"
    }, 200);
    hideprojectlist();
    nh.removeClass("isDown");
    nh.animate({
        left: "0"
    }, 200);
    $("#menu a.no-vismen").each(function(a) {
        var b = $(this);
        setTimeout(function() {
            b.animate({
                right: "0",
                opacity: 1
            }, 200);
        }, 150 * a);
    });
}
function hidemenu() {
    cm.animate({
        left: "0"
    }, 200);
    lh.animate({
        left: "0"
    }, 200);
    nh.addClass("isDown");
    nh.animate({
        left: "-300px"
    }, 200);
    $("#menu a.no-vismen").each(function(a) {
        var b = $(this);
        setTimeout(function() {
            b.animate({
                right: "-180px",
                opacity: 0
            }, 10);
        }, 10 * a);
    });
}

cm.bind("click", function() {
    if (nh.hasClass("isDown")) {
        showmenu();
        hideShare();
    } else hidemenu();
});
//  share -  add your social link's here ------------------
$(".shareSelector").socialShare({
    social: "facebook,twitter,google,pinterest,linkedin",
    whenSelect: true,
    selectContainer: ".shareSelector",
    blur: false
});
function showShare() {
    shrcn.fadeIn();
    shrcn.removeClass("isShare");
    setTimeout(function() {
        $(".arthref").addClass("inshare");
        $(".arthref .icon-container ul li").each(function(a) {
            var b = $(this);
            setTimeout(function() {
                b.animate({
                    opacity: 1,
                    right: 0
                }, 150);
            }, 150 * a);
        });
    }, 400);
}
function hideShare() {
    shrcn.addClass("isShare");
    shrcn.fadeOut();
    $(".arthrefSocialShare").find("ul").removeClass("active");
    setTimeout(function() {
        $(".arthrefSocialShare").remove();
    }, 300);
    $(".arthref .icon-container ul li").each(function(a) {
        var b = $(this);
        setTimeout(function() {
            b.animate({
                opacity: 0,
                top: "150px"
            }, 10);
        }, 10 * a);
    });
}
$(".selectMe").bind("click", function(a) {
    a.preventDefault();
    if ($(".share-container").hasClass("isShare")) {
        showShare();
        hidemenu();
        hideprojectlist();
    } else hideShare();
});
var copyTimer;
$(document).on("contextmenu", '.gallery-item , .swiper-slide',function(a) {
    clearTimeout(copyTimer);
    $("#body-copyright").show(10).css("top", a.screenY - 90).css("left", a.screenX + 10).removeClass("scale-bg5");
    copyTimer = setTimeout(function() {
        $("#body-copyright").addClass("scale-bg5").fadeOut(250);
    }, 2e3);
    return false;
});
//  init  core ------------------
$(function() {
    $.templateCore({
        templateItem: "#wrapper",
        outDuration: 150,
        inDuration: 50,
        loadErrorMessage: "404 page not found.", // 404 Message text 
        loadErrorBacklinkText: "Back to the last page",  // Back link Text
    });
    readyFunctions();
    $(document).on({
        templateCallback: function() {
            readyFunctions();
        }
    });
});
//  global init  ------------------
function readyFunctions() {
    initMontage();
    initanim();
}