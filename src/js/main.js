(function($) {

  "use strict";

  $(function() {

    var heroIn = TweenMax.fromTo("#hero", 1.5,
      {opacity: 0},
      {opacity: 1}
    );

    var introIn = TweenMax.fromTo("#intro", 2,
      {top: -75},
      {top: 0}
    );

    var heroOut = TweenMax.to("#hero", 1,
  		{opacity: 0}
  	);

    var introOut = TweenMax.to("#intro", 1.5,
      {top: -150}
    );

    var controller = new ScrollMagic();

    /* Page load animations */
    heroIn.play();
    introIn.play();

    /* Animations for when a user scrolls past the hero */
    var scene = new ScrollScene({
        triggerElement: "#main"
      })
      .setTween(introOut)
      .addTo(controller);

    var scene2 = new ScrollScene({
        triggerElement: "#main"
      })
      .setTween(heroOut)
      .addTo(controller);
  });

}(jQuery));
