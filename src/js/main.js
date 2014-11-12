(function($) {

  "use strict";

  $(function() {

    var introIn = TweenMax.fromTo("#intro", 2,
      {top: -75},
      {top: 0}
    );

    var heroOut = TweenMax.to("#hero", 1,
  		{opacity: 0}
  	);

    var introOut = TweenMax.to("#intro", 1.5,
      {top: -150, opacity: 0}
    );

    var storyIn = TweenMax.fromTo("#main", 1.5,
      {opacity: 0},
      {opacity: 1}
    );

    var controller = new ScrollMagic();

    /* Page load animations */
    introIn.play();

    /* Animations for when a user scrolls past the hero */
    var scene = new ScrollScene({
        triggerElement: "#hero-fadeout"
      })
      .setTween(introOut)
      .addTo(controller);

    var scene2 = new ScrollScene({
        triggerElement: "#hero-fadeout"
      })
      .setTween(heroOut)
      .addTo(controller);

    var scene3 = new ScrollScene({
        triggerElement: "#hero-fadeout"
      })
      .setTween(storyIn)
      .addTo(controller);

    $('.sider-tweet').on('click', 'a', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      window.open(url, "_blank", "width=555, height=520");
    });
  });

}(jQuery));
