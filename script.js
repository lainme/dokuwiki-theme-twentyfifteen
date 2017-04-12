/**
 *
 * DokuWiki Twenty Fifteen Template
 *
 * @link     https://github.com/lainme/dokuwiki-theme-twentyfifteen
 * @author   Anika Henke <anika@selfthinker.org> (upstream)
 * @author   WordPress.org & Automattic.com (upstream)
 * @author   lainme <lainme993@gmail.com>
 * @license  GPLv2 (http://www.gnu.org/licenses/gpl.html)
 */

(function($) {
    var top = false, bottom = false, topOffset = 0, lastWindowPos = 0;
    var secondary, sidebar, button;

    function chattr() {
        if (955 > $(window).width()) {
            button.attr('aria-expanded', 'false');
            button.attr('aria-controls', 'secondary');
            secondary.attr('aria-expanded', 'false');
        } else {
            button.removeAttr('aria-expanded');
            button.removeAttr('aria-controls');
            secondary.removeAttr('aria-expanded');
        }
    }

    function resize() {
        if (955 > $(window).width()) {
            top = bottom = false;
            sidebar.removeAttr('style');
        }
    }

    function scroll() {
        var windowPos     = $(window).scrollTop();
        var windowWidth   = $(window).width();
        var windowHeight  = $(window).height();
        var bodyHeight    = $(document.body).height();
        var sidebarHeight = sidebar.height();

        if (955 > windowWidth) {
            return;
        }

        if (sidebarHeight > windowHeight) {
            if (windowPos > lastWindowPos) {
                if (top) {
                    top = false;
                    topOffset = (sidebar.offset().top > 0) ? sidebar.offset().top : 0;
                    sidebar.attr('style', 'top: ' + topOffset + 'px;');
                } else if (! bottom && windowPos + windowHeight > sidebarHeight + sidebar.offset().top && sidebarHeight < bodyHeight) {
                    bottom = true;
                    sidebar.attr('style', 'position: fixed; bottom: 0;');
                }
            } else if (windowPos < lastWindowPos) {
                if (bottom) {
                    bottom = false;
                    topOffset = (sidebar.offset().top > 0) ? sidebar.offset().top : 0;
                    sidebar.attr('style', 'top: ' + topOffset + 'px;');
                } else if (! top && windowPos < sidebar.offset().top) {
                    top = true;
                    sidebar.attr('style', 'position: fixed;');
                }
            } else {
                top = bottom = false;
                topOffset = (sidebar.offset().top > 0) ? sidebar.offset().top : 0;
                sidebar.attr('style', 'top: ' + topOffset + 'px;');
            }
        } else if (! top) {
            top = true;
            sidebar.attr('style', 'position: fixed;');
        }
        lastWindowPos = windowPos;
    }

    function changeLayout() {
        secondary = $('.secondary');
        sidebar   = $('.sidebar');
        button    = $('.secondary-toggle');

        $(window)
            .on('scroll.twentyfifteen', scroll)
            .on('load.twentyfifteen', chattr)
            .on('resize.twentyfifteen', function() {
                setTimeout(function() {resize(); scroll();}, 500);
                chattr();
            });

        sidebar.on('click.twentyfifteen', 'button', function() {resize(); scroll();});
    }

    function changeMenu() {
        var widgets = secondary.find('.widget-area');

        if (! secondary.length || ! button.length) {
            return;
        }

        if (! widgets.length) {
            button.hide();
            return;
        }

        button.on('click.twentyfifteen', function() {
            secondary.toggleClass('toggled-on');
            $(this).toggleClass('toggled-on');
            if ($(this, secondary).hasClass('toggled-on')) {
                $(this).attr('aria-expanded', 'true');
                secondary.attr('aria-expanded', 'true');
            } else {
                $(this).attr('aria-expanded', 'false');
                secondary.attr('aria-expanded', 'false');
            }
        } );
    }

    function changeToc() {
        var $toc = $('#dw__toc .toggle');
        if($toc.length) {
            $toc[0].setState(-1);
        }
    }

    $(document).ready(function() {
        changeLayout();
        changeMenu();
        changeToc();
    } );
})(jQuery);
