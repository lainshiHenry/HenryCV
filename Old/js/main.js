// smooth scrolling
$(document).ready(function() {
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function() {
                window.location.hash = hash;
            });
        }
    });
})

// slide-in 
$(window).scroll(function() {
    $(".slideanim").each(function() {
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
            $(this).addClass("slide");
        }
    });
});

// Tooltip
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});