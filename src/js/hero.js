(function($, _) {

  $(function() {

    // Grab the stuff we're going to be using often that won't change so we
    // don't have to requery every time
    var hero = $('#hero'),
        heroImg = hero.find('img'),
        heroImgRatio = heroImg.width() / heroImg.height();

    // Set the hero height so it fills all the available space in the viewport
    // and update it every time the window is resized
    var sizeHero = function() {
      // Get the sizes of all the related els
      var winHeight = $(window).height(),
          navHeight = $('.navbar.navbar-default').outerHeight(),
          heroHeight = winHeight - navHeight,
          heroWidth = $(window).width(),
          heroRatio = heroWidth / heroHeight;

      // Set the hero height
      hero.outerHeight(heroHeight);

      // Set the image height/width so it fills the space
      if(heroRatio >= heroImgRatio) {
        heroImg.width('100%');
        heroImg.height('auto');
      }
      else {
        heroImg.height('100%');
        heroImg.width('auto');
      }

      // Size the intro text's top margin to the negative of half its height
      // so it's vertically centered
      hero.find('#intro').css('margin-top', function() {
          return '-' + ($(this).outerHeight() / 2).toString() + 'px';
      });
    };

    sizeHero();
    $(window).resize(_.debounce(sizeHero, 250));

  });

}(jQuery, _));
