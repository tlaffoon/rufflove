/* __________________ SUPPORTS TOUCH OR NOT  __________________*/
/*!	Detects touch support and adds appropriate classes to html and returns a JS object  |  Copyright (c) 2013 Izilla Partners Pty Ltd  | http://www.izilla.com.au / Licensed under the MIT license  |  https://coderwall.com/p/egbgdw */

var supports = (function () {
    var a = document.documentElement,
        b = "ontouchstart" in window || navigator.msMaxTouchPoints;
    if (b) {
        a.className += " touch";
        return {
            touch: true
        }
    } else {
        a.className += " no-touch";
        return {
            touch: false
        }
    }
})();



/* __________________ RESPONSIVE EQUAL HEIGHTS __________________*/
/*! jquery.matchHeight-min.js v0.5.1   |   http://brm.io/jquery-match-height/   |   License: MIT  */

(function (b) {
    b.fn.matchHeight = function (a) {
        if ("remove" === a) {
            var d = this;
            this.css("height", "");
            b.each(b.fn.matchHeight._groups, function (b, a) {
                a.elements = a.elements.not(d)
            });
            return this
        }
        if (1 >= this.length) return this;
        a = "undefined" !== typeof a ? a : !0;
        b.fn.matchHeight._groups.push({
            elements: this,
            byRow: a
        });
        b.fn.matchHeight._apply(this, a);
        return this
    };
    b.fn.matchHeight._apply = function (a, d) {
        var c = b(a),
            e = [c];
        d && (c.css({
                display: "block",
                "padding-top": "0",
                "padding-bottom": "0",
                "border-top": "0",
                "border-bottom": "0",
                height: "100px"
            }),
            e = k(c), c.css({
                display: "",
                "padding-top": "",
                "padding-bottom": "",
                "border-top": "",
                "border-bottom": "",
                height: ""
            }));
        b.each(e, function (a, c) {
            var d = b(c),
                e = 0;
            d.each(function () {
                var a = b(this);
                a.css({
                    display: "block",
                    height: ""
                });
                a.outerHeight(!1) > e && (e = a.outerHeight(!1));
                a.css({
                    display: ""
                })
            });
            d.each(function () {
                var a = b(this),
                    c = 0;
                "border-box" !== a.css("box-sizing") && (c += f(a.css("border-top-width")) + f(a.css("border-bottom-width")), c += f(a.css("padding-top")) + f(a.css("padding-bottom")));
                a.css("height", e - c)
            })
        });
        return this
    };
    b.fn.matchHeight._applyDataApi = function () {
        var a = {};
        b("[data-match-height], [data-mh]").each(function () {
            var d = b(this),
                c = d.attr("data-match-height");
            a[c] = c in a ? a[c].add(d) : d
        });
        b.each(a, function () {
            this.matchHeight(!0)
        })
    };
    b.fn.matchHeight._groups = [];
    var g = -1;
    b.fn.matchHeight._update = function (a) {
        if (a && "resize" === a.type) {
            a = b(window).width();
            if (a === g) return;
            g = a
        }
        b.each(b.fn.matchHeight._groups, function () {
            b.fn.matchHeight._apply(this.elements, this.byRow)
        })
    };
    b(b.fn.matchHeight._applyDataApi);
    b(window).bind("load resize orientationchange",
        b.fn.matchHeight._update);
    var k = function (a) {
            var d = null,
                c = [];
            b(a).each(function () {
                var a = b(this),
                    g = a.offset().top - f(a.css("margin-top")),
                    h = 0 < c.length ? c[c.length - 1] : null;
                null === h ? c.push(a) : 1 >= Math.floor(Math.abs(d - g)) ? c[c.length - 1] = h.add(a) : c.push(a);
                d = g
            });
            return c
        },
        f = function (a) {
            return parseFloat(a) || 0
        }
})(jQuery);



/* __________________ MAIN MENU  __________________*/
/*! DC jQuery Vertical Accordion Menu - jQuery vertical accordion menu plugin  |  Copyright (c) 2011 Design Chemical
    Dual licensed under the MIT and GPL licenses: http://www.opensource.org/licenses/mit-license.php  | http://www.gnu.org/licenses/gpl.html */

(function ($) {
    $.fn.dcAccordion = function (options) {
        var defaults = {
            classParent: 'dcjq-parent',
            classActive: 'active',
            classArrow: 'dcjq-icon',
            classCount: 'dcjq-count',
            classExpand: 'dcjq-current-parent',
            eventType: 'click',
            hoverDelay: 300,
            menuClose: true,
            autoClose: true,
            autoExpand: false,
            speed: 'slow',
            saveState: true,
            disableLink: true,
            showCount: false,
            cookie: 'dcjq-accordion'
        };
        var options = $.extend(defaults, options);
        this.each(function (options) {
            var obj = this;
            setUpAccordion();
            if (defaults.saveState == true) {
                checkCookie(defaults.cookie, obj)
            }
            if (defaults.autoExpand == true) {
                $('li.' + defaults.classExpand + ' > a').addClass(defaults.classActive)
            }
            resetAccordion();
            if (defaults.eventType == 'hover') {
                var config = {
                    sensitivity: 2,
                    interval: defaults.hoverDelay,
                    over: linkOver,
                    timeout: defaults.hoverDelay,
                    out: linkOut
                };
                $('li a', obj).hoverIntent(config);
                var configMenu = {
                    sensitivity: 2,
                    interval: 1000,
                    over: menuOver,
                    timeout: 1000,
                    out: menuOut
                };
                $(obj).hoverIntent(configMenu);
                if (defaults.disableLink == true) {
                    $('li a', obj).click(function (e) {
                        if ($(this).siblings('ul').length > 0) {
                            e.preventDefault()
                        }
                    })
                }
            } else {
                $('li a', obj).click(function (e) {
                    $activeLi = $(this).parent('li');
                    $parentsLi = $activeLi.parents('li');
                    $parentsUl = $activeLi.parents('ul');
                    if (defaults.disableLink == true) {
                        if ($(this).siblings('ul').length > 0) {
                            e.preventDefault()
                        }
                    }
                    if (defaults.autoClose == true) {
                        autoCloseAccordion($parentsLi, $parentsUl)
                    }
                    if ($('> ul', $activeLi).is(':visible')) {
                        $('ul', $activeLi).slideUp(defaults.speed);
                        $('a', $activeLi).removeClass(defaults.classActive)
                    } else {
                        $(this).siblings('ul').slideToggle(defaults.speed);
                        $('> a', $activeLi).addClass(defaults.classActive)
                    } if (defaults.saveState == true) {
                        createCookie(defaults.cookie, obj)
                    }
                })
            }

            function setUpAccordion() {
                $arrow = '<span class="' + defaults.classArrow + '"></span>';
                var classParentLi = defaults.classParent + '-li';
                $('> ul', obj).show();
                $('li', obj).each(function () {
                    if ($('> ul', this).length > 0) {
                        $(this).addClass(classParentLi);
                        $('> a', this).addClass(defaults.classParent).append($arrow)
                    }
                });
                $('> ul', obj).hide();
                if (defaults.showCount == true) {
                    $('li.' + classParentLi, obj).each(function () {
                        if (defaults.disableLink == true) {
                            var getCount = parseInt($('ul a:not(.' + defaults.classParent + ')', this).length)
                        } else {
                            var getCount = parseInt($('ul a', this).length)
                        }
                        $('> a', this).append(' <span class="' + defaults.classCount + '">(' + getCount + ')</span>')
                    })
                }
            }

            function linkOver() {
                $activeLi = $(this).parent('li');
                $parentsLi = $activeLi.parents('li');
                $parentsUl = $activeLi.parents('ul');
                if (defaults.autoClose == true) {
                    autoCloseAccordion($parentsLi, $parentsUl)
                }
                if ($('> ul', $activeLi).is(':visible')) {
                    $('ul', $activeLi).slideUp(defaults.speed);
                    $('a', $activeLi).removeClass(defaults.classActive)
                } else {
                    $(this).siblings('ul').slideToggle(defaults.speed);
                    $('> a', $activeLi).addClass(defaults.classActive)
                } if (defaults.saveState == true) {
                    createCookie(defaults.cookie, obj)
                }
            }

            function linkOut() {}

            function menuOver() {}

            function menuOut() {
                if (defaults.menuClose == true) {
                    $('ul', obj).slideUp(defaults.speed);
                    $('a', obj).removeClass(defaults.classActive);
                    createCookie(defaults.cookie, obj)
                }
            }

            function autoCloseAccordion($parentsLi, $parentsUl) {
                $('ul', obj).not($parentsUl).slideUp(defaults.speed);
                $('a', obj).removeClass(defaults.classActive);
                $('> a', $parentsLi).addClass(defaults.classActive)
            }

            function resetAccordion() {
                $('ul', obj).hide();
                $allActiveLi = $('a.' + defaults.classActive, obj);
                $allActiveLi.siblings('ul').show()
            }
        });

        function checkCookie(cookieId, obj) {
            var cookieVal = $.cookie(cookieId);
            if (cookieVal != null) {
                var activeArray = cookieVal.split(',');
                $.each(activeArray, function (index, value) {
                    var $cookieLi = $('li:eq(' + value + ')', obj);
                    $('> a', $cookieLi).addClass(defaults.classActive);
                    var $parentsLi = $cookieLi.parents('li');
                    $('> a', $parentsLi).addClass(defaults.classActive)
                })
            }
        }

        function createCookie(cookieId, obj) {
            var activeIndex = [];
            $('li a.' + defaults.classActive, obj).each(function (i) {
                var $arrayItem = $(this).parent('li');
                var itemIndex = $('li', obj).index($arrayItem);
                activeIndex.push(itemIndex)
            });
            $.cookie(cookieId, activeIndex, {
                path: '/'
            })
        }
    }
})(jQuery);
        
        
/* __________________ INITIALIZATIONS  __________________*/
        
        
$(document).ready(function () {


    /* ----------  equal height columns   -------- */
    $('.footer [class*="footer-col-"]').matchHeight();
    $('.equal-height-col [class*="col-"]').matchHeight();


    /* ----------  .title inner wrapper -------- */
    $('.title').wrapInner("<span></span>");


    /* ----------  .custom button -------- */
    $('.btn-custom').wrapInner("<span></span>");


    /* ----  tooltips and popover (bootstrap.min.js)  -------- */
    if ($('html').hasClass('no-touch')) { // hover doesn't work on touch, so don't use

        /* ----  hover tooltip -------- */
        $('.tooltip-hover').tooltip({
            trigger: 'hover',
            container: 'body'
        });

        /* ----  hover popover -------- */
        $('.popover-hover').popover({
            trigger: 'hover'
        });
    } // end if html has class no-touch


    /* ----  click tooltip -------- */
    $('.tooltip-click').tooltip({
        trigger: 'click',
        container: 'body'
    });

    /* ----  click popover -------- */
    $('.popover-click').popover({
        trigger: 'click'
    });


    /* ----------  .primary-nav   -------- */
    $('.primary-nav').dcAccordion({
        saveState: false,
        autoClose: true,
        disableLink: true,
        speed: "fast",
        showCount: false,
        autoExpand: false
    });


    /* ----------  hide navigation when clicked or tapped off  -------- */
    $(document).click(function (a) {
        if ($(a.target).parents().index($("#nav")) == -1) {
            $("#nav ul ul").slideUp("fast", function () {
                if ($("#nav ul ul").is(":visible")) {}
                $("#nav ul a").removeClass("active")
            })
        }
    });
    $(document).on("touchstart", function (a) {
        if ($(a.target).parents().index($("#nav")) == -1) {
            $("#nav ul ul").slideUp("fast", function () {
                if ($("#nav ul ul").is(":visible")) {}
                $("#nav ul a").removeClass("active")
            })
        }
    });


    /* ----------   toggle-menu   -------- */
    $('.toggle-menu').click(function () {
        $('html').toggleClass('menu-open');
        $('html').removeClass('login-open signup-open search-open social-open');
        $('.login-panel,.search-panel,.signup-panel,.sub-bar .sb-social-wrapper').hide();
    });


    /* ----------   toggle-search   -------- */
    $('.toggle-search').click(function () {
        $('.search-panel').slideToggle();
        $('html').toggleClass('search-open');
        $('html').removeClass('menu-open signup-open login-open social-open');
        $('.login-panel,.signup-panel').hide();
    });


    /* ----------   toggle-login   -------- */
    $('.toggle-login').click(function () {
        $('.login-panel').slideToggle();
        $('.signup-panel').slideUp();
        $('html').toggleClass('login-open');
        $('html').removeClass('signup-open search-open');
        $('.search-panel').hide();
    });


    /* ----------   toggle-signup   -------- */
    $('.toggle-signup').click(function () {
        $('.signup-panel').slideToggle();
        $('.login-panel').slideUp();
        $('html').toggleClass('signup-open');
        $('html').removeClass('login-open search-open');
        $('.search-panel').hide();
    });


    /* ----------   toggle-social on small viewports   -------- */
    $('.toggle-social').click(function () {
        $('.sub-bar .sb-social-wrapper').slideToggle();
        $('html').toggleClass('social-open');
    });
    $('.sub-bar .sb-social-wrapper .closeMe').click(function () {
        $('.sb-social-wrapper').slideUp();
        $('html').removeClass('social-open');
    });


    /* ----------   close various panels when clicked or tapped off-------- */
    $(document).click(function (a) {
        if ($(a.target).parents().index($(".nav-wrapper")) == -1) {
            $('.search-panel,.login-panel,.signup-panel').slideUp('fast');
            $('html').removeClass('search-open login-open signup-open');
        }
    });

    $(document).on("touchstart", function (a) {
        if ($(a.target).parents().index($(".nav-wrapper")) == -1) {
            $('.search-panel,.login-panel,.signup-panel').slideUp('fast');
            $('html').removeClass('search-open login-open signup-open');
        }
    });


}); // end document ready


/* __________________ SCROLL TO TOP __________________*/

if ($("html").hasClass("ie8")) { // avoid IE8 bug

    $('#toTop').hide();
}

if ($("html").hasClass("boxshadow")) { // avoid IE8 bug

    $(document).ready(function () {

        $('#toTop').hide();

        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });

        //Click event to scroll to top
        $('#toTop').click(function () {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

    });

}


/* __________________ SCROLL MENU CLONE __________________*/

if ($("html").hasClass("no-touch")) { // avoid IE8 bug


    $(document).ready(function () {

        $('#scroll-menu').hide();
        $('.primary-nav').clone().removeClass('primary-nav').addClass('scroll-nav').appendTo('#menu-clone');

        $('.scroll-nav').dcAccordion({
            saveState: false,
            autoClose: true,
            disableLink: true,
            showCount: false,
            autoExpand: false
        });


        $(window).scroll(function () {
            if ($(this).scrollTop() > 130) {
                $('#scroll-menu').fadeIn();
            } else {
                $('#scroll-menu').fadeOut();
            }
        });

        $('#scroll-menu .scroll-menu-toggle').click(function (e) {
            $('html').toggleClass('scroll-menu-open');
            e.preventDefault();

        });

    });

    $(document).click(function (a) {
        if ($(a.target).parents().index($("#scroll-menu")) == -1) {
            $('html').removeClass('scroll-menu-open');
        }
    });

    $(document).on("touchstart", function (a) {
        if ($(a.target).parents().index($("#scroll-menu")) == -1) {
            $('html').removeClass('scroll-menu-open');
        }
    });


} // close if html has class no-touch




/* __________________ PLACEHOLDER SUPPORT FOR OLDER BROWSERS __________________*/

$(document).ready(function() {
if(!Modernizr.input.placeholder){
  $("input").each(
  function(){
    var inputField = $(this);
    if(inputField.val()=="" && inputField.attr("placeholder")!=""){
    
      inputField.val(inputField.attr("placeholder"));
      
      inputField.focus(function(){
        if(inputField.val()==inputField.attr("placeholder")){ inputField.val(""); }
      });
      
      inputField.blur(function(){
        if(inputField.val()==""){ inputField.val(inputField.attr("placeholder")); }
      });
      
      $(inputField).closest('form').submit(function(){
        var form = $(this);
        if(!form.hasClass('placeholderPending')){
          $('input',this).each(function(){
            var clearInput = $(this);
            if(clearInput.val()==clearInput.attr("placeholder")){ clearInput.val(""); }
          });
          form.addClass('placeholderPending');
        }
      });
    
    }
  });
}
});



/* __________________ RENDER ICONS ON IE 8 __________________*/

if ($("html").hasClass("ie8")) {

var head = document.getElementsByTagName('head')[0],
style = document.createElement('style');
style.type = 'text/css';
style.styleSheet.cssText = ':before,:after{content:none !important';
head.appendChild(style);
setTimeout(function(){
head.removeChild(style);
}, 0);

} // end if ie8






