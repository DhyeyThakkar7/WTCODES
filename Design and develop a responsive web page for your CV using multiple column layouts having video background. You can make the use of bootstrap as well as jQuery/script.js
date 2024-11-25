$(document).ready(function() {
    // Smooth scrolling for navigation links
    $('a.nav-link').on('click', function(event) {
        var target = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(target).offset().top - 70 // Adjust for navbar height
        }, 1000);
        event.preventDefault();
    });

    // Highlight active nav link on scroll
    $(window).on('scroll', function() {
        var scrollPos = $(document).scrollTop();
        $('a.nav-link').each(function() {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos + 70 && refElement.position().top + refElement.height() > scrollPos) {
                $('a.nav-link').removeClass("active");
                currLink.addClass("active");
            }
            else {
                currLink.removeClass("active");
            }
        });
    });
});
