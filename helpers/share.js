var Handlebars = require('handlebars'),
    _ = require('underscore');

/*
 * Generate a link to a social network's share window, with the corresponding
 * FontAwesome icon. If no URL is passed, the current page is used.
 *
 * @network: string
 * @url: optional string
 */
module.exports = function(network) {
  var err = this.options.grunt.log.error || console.error;

  // Get the page's frontmatter so we can use it to build tweets later
  var pageMeta = _.findWhere(this.pages, {name: this.name});

  if(_.isUndefined(network)) {
    err('network is required for the socialShareUrl helper');
    return;
  }

  // Make sure baseUrl is set so we can actually calculate the URL
  if(!_.has(this.options, 'base')) {
    err('The share helper requires grunt.generator.TASK.options.base to be set');
    return;
  }

  // Generate a URL to the current page
  var url = this.options.base;
  if(this.name !== 'index') {
    url += this.name + '.html';
  }

  var networks = {
    facebook: {
      url: function() {
        return 'https://www.facebook.com/dialog/share?app_id=135078579956731&display=page&href=' + encodeURIComponent(url);
      },
      icon: '<i class="fa fa-facebook-square"></i>'
    },
    twitter: {
      url: function() {
        return 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(pageMeta.title) + '&url=' + encodeURIComponent(url) + '&related=@aasinteractive';
      },
      icon: '<i class="fa fa-twitter"></i>'
    }
  };

  if(!_.has(networks, network)) {
    err('Unrecognized social network in socialShareUrl helper: %s', network);
    return null;
  }

  return new Handlebars.SafeString(
    '<a target="_blank" href="' + networks[network].url() + '" title="Share on ' + network + '">' + networks[network].icon + '</a>'
  );
};
