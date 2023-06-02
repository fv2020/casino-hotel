jQuery(document).ready(function($) {
  // Smooth scrolling for buttons with the "smooth-scroll" class
  $(".smooth-scroll").on("click", function(event) {
    event.preventDefault();

    var target = $(this).attr("href");

    $("html, body").animate(
      {
        scrollTop: $(target).offset().top
      },
      800,
      "easeInOutExpo" // Replace with your desired easing function
    );
  });
});
