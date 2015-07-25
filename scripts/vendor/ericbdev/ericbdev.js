

/** Adapted from Eric B. Dev - Simple Grid Wordpress :: https://github.com/ericbdev/simpleGridWordPress **/


// INITS -----------------------------------------------------------------
function init_accordion(element) {
    $(element).on("click", function (e) {
        e.preventDefault();
        accordion($(this));
    });
}

function init_anchor_scroll(element) {
    $(element).on("click", 'a[href*=#]:not([href=#])', function (e) {
        anchorScroll(this, location, e);
    });
}


// FUNCTIONS -------------------------------------------------------------
function pageScroll(_tag) {
    if (typeof $(_tag) !== 'undefined') {
        var _totalScroll = $(_tag).offset().top;
        $('html,body').animate({
            scrollTop: _totalScroll
        }, 1000);
    }
}

function anchorScroll(_this, _location, _e) {
    if (_location.pathname.replace(/^\//, '') == _this.pathname.replace(/^\//, '') && _location.hostname == _this.hostname) {
        var _target = $(_this.hash);
        _target = _target.length ? _target : $('[name=' + _this.hash.slice(1) + ']');
        if (_target.length) {
            _e.preventDefault();
            pageScroll(_target.selector);
        }
    }
}

function accordion(_obj) {
    var _toShow = _obj.data('show'),
        _scrollTo = "#" + _obj.attr('id'),
        _jsToggleShowVisible = $('.js-toggle-show:visible');
    if ($(_toShow).is(':visible')) {
        $(_toShow).stop(true, true).slideUp({
            complete: function () {
                $('.active').each(function () {
                    $(this).removeClass('active');
                });
            }
        });
    } else {
        if (_jsToggleShowVisible.length == 0) {
            $(_toShow).stop(true, true).slideDown({
                start: function () {
                    $('.active').each(function () {
                        $(this).removeClass('active');
                    });
                    _obj.addClass('active');
                },
                complete: function () {
                    pageScroll(_scrollTo);
                }
            });
        } else {
            _jsToggleShowVisible.stop(true, true).slideUp({
                start: function () {
                    $('.active').each(function () {
                        $(this).removeClass('active');
                    });
                    _obj.addClass('active');
                },
                complete: function () {
                    $(_toShow).stop(true, true).slideDown();
                    pageScroll(_scrollTo);
                }
            });
        }
    }
}