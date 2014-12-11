var Handlebars = require('handlebars'),
    _ = require('underscore');

var err = function(e) {
  console.error(e);
};

module.exports = {
  /*
   * Create a caption with credit
   *
   * @caption: optional string
   * @credit: optional string
   *
   * @return: HTML for the caption or an empty string if @caption and @credit are falsy
   */
  'cutline': function(caption, credit) {
    var wrapCredit = function(credit) {
      return '<em class="pull-right">' + credit + '</em>';
    };

    if(caption && credit) {
      caption += ' ' + wrapCredit(credit);
    }
    else if(!caption && credit) {
      caption = wrapCredit(credit);
    }
    else if(!caption && !credit) {
      return '';
    }

    return new Handlebars.SafeString('<p class="caption clearfix">' + caption + '</p>');
  },

  /*
   * Generate a link to a social network's share window, with the corresponding
   * FontAwesome icon
   *
   * @url: string
   * @network: string
   */
  'share': function(url, network) {
    if(_.isUndefined(url) || _.isUndefined(network)) {
      err('url and network are required for the socialShareUrl helper');
      return null;
    }

    var networks = {
      facebook: {
        url: function(url) {
          return 'https://www.facebook.com/sharer.php?u=' + encodeURIComponent(url);
        },
        icon: '<i class="fa fa-facebook-square"></i>'
      },
      twitter: {
        url: function(url) {
          return 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(url) + '&related=@statesman';
        },
        icon: '<i class="fa fa-twitter"></i>'
      },
      gplus: {
        url: function(url) {
          return 'https://plus.google.com/share?url=' + encodeURIComponent(url);
        },
        icon: '<i class="fa fa-google-plus"></i>'
      }
    };

    if(!_.has(networks, network)) {
      err('Unrecognized social network in socialShareUrl helper:', network);
      return null;
    }

    return new Handlebars.SafeString(
      '<a target="_blank" href="' + networks[network].url(url) + '">' + networks[network].icon + '</a>'
    );
  },

  /*
   * Generate <li> nav links, intelligently adding the active class, URLs, etc.
   */
  'navLinks': function() {
    var links = '';

    // Make sure nav is an array
    if(_.isArray(this.options.nav)) {
      // Loop through all of the nav objects ...
      var navs = this.options.nav;
      _.each(navs, function(el) {
        // Make sure the page exists
        if(_.has(this.pages, el.file)) {
          // Make sure all required fields are present
          if(_.has(el, 'name')) {
            links += '<li' + (el.file === this.name ? ' class="active"' : '') + '><a href="' + el.file + '.html">' + el.name + '</a></li>';
          }
          else {
            err('The navLinks helper requires name for each object in the nav array.');
          }
        }
        else {
          err('The navLinks helper can\'t find a matching page for ' + nav);
        }
      }, this);
    }
    else {
      err('generator.TASK.options.nav in the Gruntfile must be an array to use the navLinks helper.');
    }

    return new Handlebars.SafeString(links);
  }

};
