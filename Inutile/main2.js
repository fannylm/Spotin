/*
 Arcana by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
 */

/*(function($) {
 skel.breakpoints({
 wide: '(max-width: 1680px)',
 normal: '(max-width: 1280px)',
 narrow: '(max-width: 980px)',
 narrower: '(max-width: 840px)',
 mobile: '(max-width: 736px)',
 mobilep: '(max-width: 480px)'
 });
 $(function() {
 var	$window = $(window),
 $body = $('body');
 // Disable animations/transitions until the page has loaded.
 $body.addClass('is-loading');
 $window.on('load', function() {
 $body.removeClass('is-loading');
 });
 // Fix: Placeholder polyfill.
 $('form').placeholder();
 // Prioritize "important" elements on narrower.
 skel.on('+narrower -narrower', function() {
 $.prioritize(
 '.important\\28 narrower\\29',
 skel.breakpoint('narrower').active
 );
 });
 // Dropdowns.
 $('#nav > ul').dropotron({
 offsetY: -15,
 hoverDelay: 0,
 alignment: 'center'
 });
 // Off-Canvas Navigation.
 // Title Bar.
 $(
 '<div id="titleBar">' +
 '<a href="#navPanel" class="toggle"></a>' +
 '<span class="title">' + $('#logo').html() + '</span>' +
 '</div>'
 )
 .appendTo($body);
 // Navigation Panel.
 $(
 '<div id="navPanel">' +
 '<nav>' +
 $('#nav').navList() +
 '</nav>' +
 '</div>'
 )
 .appendTo($body)
 .panel({
 delay: 500,
 hideOnClick: true,
 hideOnSwipe: true,
 resetScroll: true,
 resetForms: true,
 side: 'left',
 target: $body,
 visibleClass: 'navPanel-visible'
 });
 // Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
 if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
 $('#titleBar, #navPanel, #page-wrapper')
 .css('transition', 'none');
 });
 })(jQuery); */


/*
 Hyperspace by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
 */

(function($) {

    skel.breakpoints({
        xlarge:	'(max-width: 1680px)',
        large:	'(max-width: 1280px)',
        medium:	'(max-width: 980px)',
        small:	'(max-width: 736px)',
        xsmall:	'(max-width: 480px)'
    });

    $(function() {

        var	$window = $(window),
            $body = $('body'),
            $sidebar = $('#sidebar');

        // Hack: Enable IE flexbox workarounds.
        if (skel.vars.IEVersion < 12)
            $body.addClass('is-ie');

        // Disable animations/transitions until the page has loaded.
        if (skel.canUse('transition'))
            $body.addClass('is-loading');

        $window.on('load', function() {
            window.setTimeout(function() {
                $body.removeClass('is-loading');
            }, 100);
        });

        // Forms.

        // Fix: Placeholder polyfill.
        //$('form').placeholder();

        // Hack: Activate non-input submits.
        /*$('form').on('click', '.submit', function(event) {
         // Stop propagation, default.
         event.stopPropagation();
         event.preventDefault();
         // Submit form.
         $(this).parents('form').submit();
         });*/

        // Prioritize "important" elements on medium.
        skel.on('+medium -medium', function() {
            $.prioritize(
                '.important\\28 medium\\29',
                skel.breakpoint('medium').active
            );
        });

        // Sidebar.
        if ($sidebar.length > 0) {

            var $sidebar_a = $sidebar.find('a');

            $sidebar_a
                .addClass('scrolly')
                .on('click', function() {

                    var $this = $(this);

                    // External link? Bail.
                    if ($this.attr('href').charAt(0) != '#')
                        return;

                    // Deactivate all links.
                    $sidebar_a.removeClass('active');

                    // Activate link *and* lock it (so Scrollex doesn't try to activate other links as we're scrolling to this one's section).
                    $this
                        .addClass('active')
                        .addClass('active-locked');

                })
                .each(function() {

                    var	$this = $(this),
                        id = $this.attr('href'),
                        $section = $(id);

                    // No section for this link? Bail.
                    if ($section.length < 1)
                        return;

                    // Scrollex.
                    $section.scrollex({
                        mode: 'middle',
                        top: '-20vh',
                        bottom: '-20vh',
                        initialize: function() {

                            // Deactivate section.
                            if (skel.canUse('transition'))
                                $section.addClass('inactive');

                        },
                        enter: function() {

                            // Activate section.
                            $section.removeClass('inactive');

                            // No locked links? Deactivate all links and activate this section's one.
                            if ($sidebar_a.filter('.active-locked').length == 0) {

                                $sidebar_a.removeClass('active');
                                $this.addClass('active');

                            }

                            // Otherwise, if this section's link is the one that's locked, unlock it.
                            else if ($this.hasClass('active-locked'))
                                $this.removeClass('active-locked');

                        }
                    });

                });

        }

        // Scrolly.
        $('.scrolly').scroll({
            speed: 1000,
            offset: function() {

                // If <=large, >small, and sidebar is present, use its height as the offset.
                if (skel.breakpoint('large').active
                    &&	!skel.breakpoint('small').active
                    &&	$sidebar.length > 0)
                    return $sidebar.height();

                return 0;

            }
        });

        // Spotlights.
        $('.spotlights > section')
            .scrollex({
                mode: 'middle',
                top: '-10vh',
                bottom: '-10vh',
                initialize: function() {

                    // Deactivate section.
                    if (skel.canUse('transition'))
                        $(this).addClass('inactive');

                },
                enter: function() {

                    // Activate section.
                    $(this).removeClass('inactive');

                }
            })
            .each(function() {

                var	$this = $(this),
                    $image = $this.find('.image'),
                    $img = $image.find('img'),
                    x;

                // Assign image.
                $image.css('background-image', 'url(' + $img.attr('src') + ')');

                // Set background position.
                if (x = $img.data('position'))
                    $image.css('background-position', x);

                // Hide <img>.
                $img.hide();

            });

        // Features.
        if (skel.canUse('transition'))
            $('.features')
                .scrollex({
                    mode: 'middle',
                    top: '-20vh',
                    bottom: '-20vh',
                    initialize: function() {

                        // Deactivate section.
                        $(this).addClass('inactive');

                    },
                    enter: function() {

                        // Activate section.
                        $(this).removeClass('inactive');

                    }
                });

    });

})(jQuery);