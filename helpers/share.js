var Handlebars = require('handlebars'),
    _ = require('underscore');

/*
 * Generate a link to a social network's share window, with the corresponding
 * FontAwesome icon
 *
 * @url: string
 * @network: string
 */
module.exports = function(url, network) {
  if(_.isUndefined(url) || _.isUndefined(network)) {
    console.error('url and network are required for the socialShareUrl helper');
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
    console.error('Unrecognized social network in socialShareUrl helper:', network);
    return null;
  }

  return new Handlebars.SafeString(
    '<a target="_blank" href="' + networks[network].url(url) + '">' + networks[network].icon + '</a>'
  );
};
