var Handlebars = require('handlebars'),
    _ = require('underscore');

/*
 * Generate <li> nav links, intelligently adding the active class, URLs, etc.
 *
 * @type: optional string
 */
module.exports = function(type) {
  // Make sure nav is an array
  if(!_.isArray(this.options.nav)) {
    console.error('generator.TASK.options.nav in the Gruntfile must be an array to use the navLinks helper.');
    return null;
  }

  var links = '';

  // Loop through all of the nav objects ...
  _.each(this.options.nav, function(el) {

    // Make sure the page exists
    if(!_.has(this.pages, el.file)) {
      console.error('The navLinks helper can\'t find a matching page for ' + nav);
      return;
    }

    // Make sure all required fields are present
    if(!_.has(el, 'title')) {
      console.error('The navLinks helper requires name for each object in the nav array.');
      return
    }

    var linktext = '';
    if(type === 'super') {
      linktext = '<strong>' + el.title + '</strong><br />';
      if(_.has(el, 'subtitle')) {
        linktext += el.subtitle
      }
    }
    else {
      linktext = el.title;
    }

    links += '<li' + (el.file === this.name ? ' class="active"' : '') + '><a href="' + el.file + '.html">' + linktext + '</a></li>';

  }, this);

  return new Handlebars.SafeString(links);
};
