// JS OBFUSCATED

(function(_0xcc9ex1) {
    'use strict';
    _0xcc9ex1(window)['on']('load', function() {
        _0xcc9ex1('[data-loader="circle-side"]')['fadeOut']();
        _0xcc9ex1('#preloader')['delay'](350)['fadeOut']('slow');
        _0xcc9ex1('body')['delay'](350);
        var _0xcc9ex2 = _0xcc9ex1('#hero_in');
        _0xcc9ex2['find']('h1, form')['addClass']('animated');
        _0xcc9ex1('.hero_single, #hero_in')['addClass']('start_bg_zoom');
        _0xcc9ex1(window)['scroll']()
    });
    var _0xcc9ex3 = _0xcc9ex1('.header');
    _0xcc9ex1(window)['on']('scroll', function() {
        if (_0xcc9ex1(this)['scrollTop']() > 1) {
            _0xcc9ex3['addClass']('sticky')
        } else {
            _0xcc9ex3['removeClass']('sticky')
        }
    });
    _0xcc9ex1('#sidebar')['theiaStickySidebar']({
        additionalMarginTop: 150
    });
    var _0xcc9ex4 = _0xcc9ex1('nav#menu')['mmenu']({
        "\x65\x78\x74\x65\x6E\x73\x69\x6F\x6E\x73": ['pagedim-black'],
        counters: false,
        keyboardNavigation: {
            enable: true,
            enhance: true
        },
        navbar: {
            title: 'MENU'
        },
        navbars: [{
            position: 'bottom',
            content: ['<a href="#0">\xA9 2018 Digital Coin</a>']
        }]
    }, {
        clone: true,
        classNames: {
            fixedElements: {
                fixed: 'menu_2',
                sticky: 'sticky'
            }
        }
    });
    var _0xcc9ex5 = _0xcc9ex1('#hamburger');
    var _0xcc9ex6 = _0xcc9ex4['data']('mmenu');
    _0xcc9ex5['on']('click', function() {
        _0xcc9ex6['open']()
    });
    _0xcc9ex6['bind']('open:finish', function() {
        setTimeout(function() {
            _0xcc9ex5['addClass']('is-active')
        }, 100)
    });
    _0xcc9ex6['bind']('close:finish', function() {
        setTimeout(function() {
            _0xcc9ex5['removeClass']('is-active')
        }, 100)
    });
    _0xcc9ex1('a[href^="#"].btn_explore')['on']('click', function(_0xcc9ex7) {
        _0xcc9ex7['preventDefault']();
        var _0xcc9ex8 = this['hash'];
        var _0xcc9ex9 = _0xcc9ex1(_0xcc9ex8);
        _0xcc9ex1('html, body')['stop']()['animate']({
            "\x73\x63\x72\x6F\x6C\x6C\x54\x6F\x70": _0xcc9ex9['offset']()['top']
        }, 800, 'swing', function() {
            window['location']['hash'] = _0xcc9ex8
        })
    });
    var _0xcc9exa = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true,
        callback: function(_0xcc9exb) {},
        scrollContainer: null
    });
    _0xcc9exa['init']();
    if (_0xcc9ex1(window)['width']() >= 768) {
        _0xcc9ex1('.revealed')['footerReveal']({
            shadow: false,
            zIndex: 0
        })
    };
    _0xcc9ex1('.video')['magnificPopup']({
        type: 'iframe'
    });
    _0xcc9ex1('.magnific-gallery')['each'](function() {
        _0xcc9ex1(this)['magnificPopup']({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            },
            removalDelay: 500,
            callbacks: {
                beforeOpen: function() {
                    this['st']['image']['markup'] = this['st']['image']['markup']['replace']('mfp-figure', 'mfp-figure mfp-with-anim');
                    this['st']['mainClass'] = this['st']['el']['attr']('data-effect')
                }
            },
            closeOnContentClick: true,
            midClick: true
        })
    });
    _0xcc9ex1('[data-toggle="tooltip"]')['tooltip']();
    var _0xcc9exc = _0xcc9ex1('.panel-group');

    function _0xcc9exd(_0xcc9ex7) {
        _0xcc9ex1(_0xcc9ex7['target'])['prev']('.card-header')['find']('i.indicator')['toggleClass']('ti-minus ti-plus')
    }
    _0xcc9ex1('.accordion_2')['on']('hidden.bs.collapse shown.bs.collapse', _0xcc9exd);

    function _0xcc9exe(_0xcc9ex7) {
        _0xcc9ex1(_0xcc9ex7['target'])['prev']('.panel-heading')['find']('.indicator')['toggleClass']('ti-minus ti-plus')
    }
    _0xcc9exc['on']('hidden.bs.collapse', _0xcc9exe);
    _0xcc9exc['on']('shown.bs.collapse', _0xcc9exe);
    (function() {
        if (!String['prototype']['trim']) {
            (function() {
                var _0xcc9exf = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String['prototype']['trim'] = function() {
                    return this['replace'](_0xcc9exf, '')
                }
            })()
        };
        []['slice']['call'](document['querySelectorAll']('input.input_field, textarea.input_field'))['forEach'](function(_0xcc9ex10) {
            if (_0xcc9ex10['value']['trim']() !== '') {
                classie['add'](_0xcc9ex10['parentNode'], 'input--filled')
            };
            _0xcc9ex10['addEventListener']('focus', _0xcc9ex11);
            _0xcc9ex10['addEventListener']('blur', _0xcc9ex13)
        });

        function _0xcc9ex11(_0xcc9ex12) {
            classie['add'](_0xcc9ex12['target']['parentNode'], 'input--filled')
        }

        function _0xcc9ex13(_0xcc9ex12) {
            if (_0xcc9ex12['target']['value']['trim']() === '') {
                classie['remove'](_0xcc9ex12['target']['parentNode'], 'input--filled')
            }
        }
    })();
    _0xcc9ex1('#carousel')['owlCarousel']({
        center: true,
        items: 2,
        loop: true,
        margin: 10,
        responsive: {
            0: {
                items: 1,
                dots: false
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    _0xcc9ex1('#reccomended')['owlCarousel']({
        center: false,
        items: 2,
        loop: true,
        margin: 0,
        responsive: {
            0: {
                items: 3
            },
            767: {
                items: 4
            },
            1000: {
                items: 6
            },
            1300: {
                items: 8
            }
        }
    });
    var _0xcc9ex14 = _0xcc9ex1('ul#cat_nav');
    _0xcc9ex1('#faq_box a[href^="#"]')['on']('click', function() {
        if (location['pathname']['replace'](/^\//, '') == this['pathname']['replace'](/^\//, '') || location['hostname'] == this['hostname']) {
            var _0xcc9ex8 = _0xcc9ex1(this['hash']);
            _0xcc9ex8 = _0xcc9ex8['length'] ? _0xcc9ex8 : _0xcc9ex1('[name=' + this['hash']['slice'](1) + ']');
            if (_0xcc9ex8['length']) {
                _0xcc9ex1('html,body')['animate']({
                    scrollTop: _0xcc9ex8['offset']()['top'] - 185
                }, 800);
                return false
            }
        }
    });
    _0xcc9ex14['find']('li a')['on']('click', function() {
        _0xcc9ex14['find']('li a.active')['removeClass']('active');
        _0xcc9ex1(this)['addClass']('active')
    })
})(window['jQuery'])