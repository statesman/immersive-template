# immersive-template

[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

This project is our go-to tool for generating multipage, off-platform immersive story presentations.

A few key features:
- a Grunt and Handlebars-driven generator that bakes out flat HTML files
- a Connect server for development with livereload
- ready-to-tweak Bootstrap styles and scripts, compiled with Grunt and linted with [Bootlint](https://github.com/twbs/bootlint)
- partials for often-used elements (photo blocks of various sizes, Brightcove videos, etc.)
- helpers for common tasks (nav and URL generation)
- easy deployment using FTP to our Cox infrastructure

## Requirements

- Node.js
- Grunt

## Setup

Download and unpack this repo:
```
$ curl -OL https://github.com/statesman/immersive-template/archive/master.zip
$ unzip master.zip -d YOUR_PROJECT_NAME
$ cd YOUR_PROJECT_NAME
```
Install dependencies:
```
$ npm install
```

## Usage

### Project structure

First things first, you should probably understand where everything lives and what all of these folders are for:

`helpers/`: contains Handlebars helpers, which are structured as Node.js modules (in the [CommonJS](http://wiki.commonjs.org/wiki/CommonJS) format).

`layouts/`: these are Handlebars templates that are used to wrap the content you create in the `pages/` folder

`pages/`: this is your content and everything that's in this folder will be automatically parsed by grunt and made available to users in the `public/` folder

`partials/`: these are little snippets, in the Handlebars partials format, that can be used to generate slideshows, inline photos, etc.

`tasks/`: this contains grunt tasks loaded by the Gruntfile.

`public/`: in production, this is the folder that actually serves the project (or it can be the only piece of the project you actually move to production)

`src/css/`: `less` files that Grunt will transpile into CSS in `public/dist/style.css`

`src/js/`: JavaScript files that Grunt will concatenate, Uglify and save in `public/dist/scripts.js`

`src/assets/`: This is where images, logos, etc. live. It's the only save place in `dist/` to put things because most everything else in that folder is auto-cleaned by Grunt.

### Adding content

We'll walk though the `pages/index.html` file to (try to) explain how to use this template.

Run `grunt` if you haven't already, which will start the local dev server and open project's home page in your default Web browser.

This tool uses [`grunt-generator`](https://github.com/clavery/grunt-generator) to bake out flat files based on the contents of the `pages/` directory. Each `.html` file in `pages/` is passed through the appropriate Handlebars template in `layouts/`, which, in the case of the [default `story.hbs` template](layouts/story.hbs), wraps it with a nav, Facebook and Twitter meta tags, advertising and drops in scripts and styles.

Because `index.html` is passed through `grunt-generator`, it's treated as a Handlebars template, which means any of the included partials and helpers can be used. Those are documented below.

Each `.html` file in the `pages/` directory also has "frontmatter", which is in JSON format. The following settings are **required** for each page:

```js
{
  "template" : "story", // sets the template from layouts/ to be used
  "title": "Starter template", // will be used as the page title, social share title and etc.
  "description": "This is a starter template", // used as the meta description and social share description
  "thumbnail": "assets/thumbnail.jpg" // a thumbnail for social
}
```

The frontmatter can also be used to create objects that can be passed to the Handlebars helpers. For example, in `index.html` a photo is defined in the frontmatter:

```js
"photo1": {
  "url": "assets/photo.jpg",
  "caption": "newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the.", // optional
  "credit": "Photographer / Statesman" // optional
}
```

then passed to a Handlebars helper farther down the page to be rendered out as a photo block by `grunt-generator`:

```html
{{> photo-block page.photo1}}
```

Note that in the JSON the context was given a key of `photo1`, then it was passed to the partial as `page.photo1`.

Add more pages by adding additional `.html` files, with the required frontmatter, to the `pages/` directory. Every time you add a page Grunt will automatically build it into a new page in the `public/` folder and refresh your browser.

### Configuring the nav

If you're using the included nav partials (`{{> navbar-thin}}` or `{{> navbar-super}}`) or helpers (`{{navLinks}}` or `{{subNavLinks}}`) you need to configure the nav links they generate by passing them some info in the Gruntfile.

When the nav is compiled, it'll automatically add an active class for the current page and validate each of the links. Watch the Grunt output for any warnings.

Here's an example configuration:

```js
nav: [
  {
    title: "Story 1", // This will be used as the link text
    subtitle: "Explaining story 1", // Optional, used in the super nav
    file: "index", // Should correspond to the file name in pubilc/, without the .html
    children: [ // These are structured the same way as their parent elements, just nested in the children array
      {
        title: "Sub-story 2",
        subtitle: "More on story 2",
        file: "page2"
      },
      {
        title: "Sub-story 3",
        subtitle: "And this is story 3",
        file: "page3"
      }
    ]
  },
  {
    title: "Story 2",
    subtitle: "More on story 2",
    file: "page2"
  }
]
```

### Adding video

#### Anvato

To add an Anvato video to a story or index in the [immersive-template](), you need to use the `video-block-anvato` or `video-full-anvato` partials (which also rely on the `video-ad.js` helper), and supply these values in the front matter:

```
  "videoUniqueName": {
    "anvatoInstance": "p0",
    "anvatoType": "video",
    "anvatoId": "3928772",
    "anvatoAd": "statesman"
  }
```

- The `anvatoInstance` is the unique name of the div and matching values for this video. It does not matter what the value is, but it cannot be the same as any other video on the page.
- `anvatoType` value is either `"video"`, which is used for a single video, or `"playlist"`, which is used to display a playlist.
- The `anvatoId` used depends on the `anvatoType` chosen above.
    +  If using for a single video, you would use the UPLOAD ID of the video gained from the [Anvato admin](http://mcp.anvato.com/cms/videos/1).
    +  If using for a playlist, you would use the the GROUP ID from the Anvato admin.
- The `anvatoAd` sets the proper ad tag in the player and has three possible values: "statseman", "austin360", "mystatesman". The mystatesman version removes the ad. If no `anvatoAd` value is set, it assumes "statesman".

Note you may need some additional javascript and css to have a playlist that displays as thumbnails.

#### Youtube

The YouTube `video-full-youtube` and `video-full-youtube` partials only require one value, the source of the url.

```
  "videoOverview": {
    "ytsrc": "https://www.youtube.com/embed/sggsXaCZNMs"
  },
```


### Changing styles

The project is structured so that only the Bootstrap styles you want are compiled into the final `public/dist/style.css` file. To add and remove Bootstrap Less modules, comment/uncomment the corresponding lines in `src/css/custom-bootstrap/bootstrap.less`. To override Bootstrap variables, edit `src/css/custom-bootstrap/variables.less`.

Custom Less modules can be written and stored in `src/css/` then imported into `src/css/style.less` and will have access to all of Bootstrap's mixins and variables.

See Bootstrap's [Using Less](http://getbootstrap.com/css/#less) for more.

### Using JavaScript

New libraries can be added using Bower. For example, to add tabletop:

```
$ bower add tabletop --save
```

Then, add the project's `.js` files to `Grunt.uglify.prod.files`, as we've already done for jQuery and a few other libraries:

```js
'public/dist/scripts.js': [
  'bower_components/jquery/dist/jquery.js',
  'bower_components/underscore/underscore.js',
  'bower_components/imagesloaded/imagesloaded.pkgd.js',
  'bower_components/Slides/source/jquery.slides.js',
  'src/js/call-time.js',
  'src/js/slider.js',
  'src/js/main.js'
]
```

The same applies if you'd like to add any of Bootstrap's JavaScript modules, which **aren't included by default**.

You can also write your own JavaScript modules and save them in `src/js/` and add them to the same Grunt array to have them packaged with the final build.

Everything in the `src/js/` folder is passed through [JSHint](http://jshint.com/). If you get a JShint warning that's unclear, you can look it up at [jslinterrors.com](https://jslinterrors.com/).

If you have some bespoke javascript

### Deploying

The included `deployS3` task will deploy the `public` folder to s3 at the path defined in `project.config.json` at the root of the project.

```json
{
  "sitePath": "news/immersive-template"
}
```

There is also a [grunt-slack-hook](https://github.com/pwalczyszyn/grunt-slack-hook) task configured to publish the url to slack once published. The URL to your slack hook is should be saved in a file called `.slack` in the root folder.

MAKE SURE `.slack` is included in the `.gitignore` for your project.

ALSO MAKE SURE to fill out the `cmg-footer-scripts.hbs` partial for hte project.

## Reference

### Included partials

*Partials can be included using the regular Handlebars convention: `{{> partial-name}}`. They can be passed an optional context, but assume the calling context if none is provided.*

*Any `.hbs` file saved to `partials/` will automatically be made available. The data required data documented below should unless noted be stored in a JavaScript object in the frontmatter and passed.*

---

#### `{{> banner-ad}}`

Markup for a 728px x 90px banner ad on large screens and a 320px x 50px on small screens. Includes Bootstrap classes to show/hide the banners.

---

#### `{{> blockquote context}}`

Markup for a Bootstrap `<blockquote>`

*Example context:*

```js
{
  "text": "Text of the long pull quote would go here.",
  "attribution": "Person of Organization"
}
```

---

#### `{{> cmg-footer-scripts}}`

Analytics code for SiteCatalyst, Quantcast and Chartbeat.

*Make sure you update these for each project*

---

#### `{{> cmg-header-scripts}}`

Google Ads code and analytics code for Quantacast and Chartbeat.

---

#### `{{> facebook context}}`

A Facebook post panel that includes the original post and a permalink to the original post.

*Example context:*

```js
{
  "name": "Austin American-Statesman",
  "screen_name": "statesman",
  "text": "Fifth U.S. Circuit Court of Appeals declines to take up UT's Fisher case en banc. Fisher's option is to appeal to the Supreme Court.",
  "id": "10152898814129208",
  "image": "https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpa1/v/t1.0-1/p48x48/1016320_10152241897839208_765057284_n.jpg?oh=b71da201658fa913d8b4f2565a740742&oe=55201378&__gda__=1424850128_0f95e0cf75fce1b453782a241786791c"
}
```

---

#### `{{> highlights}}`

Add a block of tweetable story highlights. Highlights will be pulled from the page data's highlights attribute. There's no need to pass the data explicitly.

*Example context:*

```js
{
  "highlights": [
    "Families of children who died of abuse and neglect often had long histories with state regulators.",
    "In many child abuse fatalities, CPS already had an open investigation when the death occurred.",
    "The Statesman found numerous cases in which a child had been previously removed and returned, only to die later."
  ]
}
```

---

#### `{{> linklist context}}`

A link list, rendered as an unordered list in a Bootstrap panel with FontAwesome list icons.

*Example context:*

```js
{
  "title": "Related stories",
  "links": [{
    "name": "Link 1",
    "url": "#"
  }, {
    "name": "Link 2",
    "url": "#"
  }, {
    "name": "Link 3",
    "url": "#"
  }]
}
```

---

#### `{{> meta}}`

Generates OpenGraph tags for Facebook, Twitter card tags for Twitter and canonical and description `<meta>` tags.

All needed data are pulled from the global context and compile time.

---

#### `{{> navbar-super}}`

A Bootstrap nav that's thicker, has descriptions for each link and by default disappears as the user scrolls.

*For more information on adding links to the nav, see **Configuring the nav**.*

---

#### `{{> navbar-thin}}`

A thin Bootstrap nav that's persistent (fixed to the top of the window) and includes share icons.

*For more information on adding links to the nav, see **Configuring the nav**.*

---

#### `{{> photo-block context}}`, `{{> photo-full context}}`

Pre-built photo panels that can be dropped into stories. You'll need to see that the photo is properly sized and stored in the `public/assets/` directory.

*Example context:*

```js
{
  "url": "assets/photo.jpg",
  "caption": "newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the.", // optional
  "credit": "Photographer / Statesman" // optional
}
```

---

#### `{{> scripts}}`

Our scripts, along with the concatenated and Uglify-ed Bower scripts.

---

#### `{{> slider}}`

A responsive slider that listens for touch events and has a display area for captions. This generates that markup required for the custom slider module in `src/js/slider.js`. It wraps it in a slider case, which `src/js/main.js` uses to initialize the slider.

*Example context:*

```js
{
  "images": [{
    "url": "assets/photo1.jpg",
    "caption": "newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the.",
    "credit": "Photographer / Statesman"
  }, {
    "url": "assets/photo2.jpg",
    "caption": "newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the.",
    "credit": "Photographer / Statesman"
  }, {
    "url": "assets/photo3.jpg",
    "caption": "newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the.",
    "credit": "Photographer / Statesman"
  }]
}
```

---

#### `{{> styles}}`

Project styles, compiled by Grunt.

---

#### `{{> tweet context}}`

An embedded Twitter status, with links that point to Twitter's [Web intents](https://dev.twitter.com/web/intents) URLs for replying, retweeting and favoriting.

*Example context:*

```js
{
  "name": "Ralph Haurwitz",
  "screen_name": "ralphhaurwitz",
  "image": "https://pbs.twimg.com/profile_images/1097015353/Picture_277.png",
  "text": "Fifth U.S. Circuit Court of Appeals declines to take up UT's Fisher case en banc. Fisher's option is to appeal to the Supreme Court.",
  "id": "532618297662242816"
}
```

### Included helpers

*Helpers can be used using the regular Handlebars convention: `{{helper context}}` for regular helpers and `{{#helper}}{{/helper}}` for block helpers. They can be passed an optional context, but have access to the global context if none is provided.*

*Any `.js` file saved to `helpers/` will automatically be made available. Helpers should be written in CommonJS format; they'll be automatically be registered by their filename. The data required data documented below should unless noted be stored in a JavaScript object in the frontmatter and passed.*

---

#### `{{copyrightYear}}`

Outputs the current year, as of that build, in the copyright block of the index page footer.

*Example usage:*
```html
{{copyrightYear}}
```

*Example output:*
```html
2016
```

---

#### `{{cutline caption credit}}`

Outputs a `<p>`-wrapped cutline, with a right-aligned, `<em>`-wrapped photo credit. This is used in the slideshow partial and all photo partials. Both caption and credit are optional.

*Example usage:*
```html
{{cutline 'Someone does something somewhere.' 'Photographer / Statesman'}}
```

*Example output:*
```html
<p class="caption clearfix">Someone does something somewhere. <em class="pull-right">Photographer / Statesman</em></p>
```

---

#### `{{#markdown}}{{/markdown}}`

A block helper that will render the wrapped markdown string into HTML.

*Example usage:*
```html
{{#markdown}}
  # Markdown for what
{{/markdown}}
```

*Example output:*
```html
<h1>Markdown for what</h1>
```

---

#### `{{navLinks}}`, `{{subNavLinks}}`

These are the helpers responsible for the navs and subnavs used in the nav partials above. They're a bit complex, so it's best to just check out their source for an understanding of how they work.

---

#### `{{projectUrl filename}}`

Generate an absolute URL to a project asset. This is mostly unnecessary because relative URLs will usually suffice, but it's used to generate URLs in places like social meta tags where absolute URLs are required.

*Example usage:*
```html
{{projectUrl 'assets/photo.jpg'}}
```

*Example output:*
```html
<!-- Assuming grunt.generator.TASK.options.base is set to http://projects.statesman.com/my-project/ -->
http://projects.statesman.com/my-project/assets/photo.jpg
```

---

#### `{{share network}}`

Generates a share button using a FontAwesome icon and the network's sharing URL.

*Example usage:*
```html
{{share 'facebook'}}
```

*Example output:*
```html
<a target="_blank" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Fprojects.statesman.com%2Ftemplates%2Fimmersive%2F">
  <i class="fa fa-facebook-square"></i>
</a>
```

## The wrap: metrics, meter and ads

There are a series of `cmg-` files in `/partials/` that comprise the "BigJ" wrap. They are used in different combinations depending your project needs.

### For a metered project

`/layouts/story.hbs` is set up for metered.

The head files should be pulled into your base template at the bottom of the `</head>`` in this order.

- `cmg-head-styles.hbs`: Styles for logins. No modifications needed.
- `cmg-head-ads.hbs`: Ad tag configurations. No modifications needed.
- `cmg-head-metadata.hbs`: Update content [based on your project](https://docs.google.com/spreadsheets/d/1_jJAlKcxF_QviB3lK29l3LG2cnYUYM-sEJttRJ5HPYA/edit#gid=0).
- `cmg-head-metrics`: Metric code. No modifications needed.

The body files come next:

- `cmg-body-modals.hbs`: Has modals (these fail bootlinting)
- `cmg-body-metrics.hbs`: Has metrics. No mods needed.
- `cmg-body-janrain.hbs`: 

The `cmg-body-modals` file causes to bootlint errors. There are two `<button>` tags that need `type="button"` added, [as noted here](https://github.com/twbs/bootlint/wiki/W007. This is already done.

The other error is throws is a [column children error E013](https://github.com/twbs/bootlint/wiki/E013), but I can't figure out how to fix that.

You also need additional CSS to fix some bootstrap conflicts on the login mode. Add this to your `styles.less` file:

```css
@import 'modals.less';
```

There is a `byline` node in the frontmatter of stories that fills a metadata value, which is then used for metrics. Keep that even if you don't use the `{{ page.byline }}` in your page.

#### overriding at the layout level
- There is an `index.hbs` layout that overrides the `contentType` and `meter` settings. That **could** be extrapolated to prematter.

### Wrap without a meter

`layouts/free.hbs` is set up for this, and page3.html is using it. Differences are:

- `cmg-head-style.hbs` is not needed.
- after calling `cmg-head-metadata.hbs`, the `<meta name="cmg:meter" content="true">` is overwritten to ensure it is `false`. You still need to update other metadata as needed.
- `cmg-body-modals` and `cmg-body-janrain` are not needed.
- `cmg-body-free-premetrics.hbs` is added before `cmg-body-metrics.hbs`. It may need modification based on your site.
- remove `@import modals.less;` from `styles.less`.

## Projects
These projects were built with the immersive template.

| Title  | Date | URL | Repo |
| -----  | ---  | :---:  | :---:  |
| Inheriting inequality | Jan. 2015  | [:page_facing_up:](http://projects.statesman.com/news/economic-mobility/) | [:octocat:](https://github.com/statesman/economic-mobility) |
| Missed Signs  | Jan. 2015  | [:page_facing_up:](http://projects.statesman.com/news/cps-missed-signs/) | [:octocat:](https://github.com/statesman/cps) |
| Paid to Prosecute  | Sept. 2015  | [:page_facing_up:](http://projects.statesman.com/news/paid-to-prosecute/) | [:octocat:](https://github.com/statesman/paid-to-prosecute) |
| Casualties of the Streets  | Nov. 2015  | [:page_facing_up:](http://projects.statesman.com/news/homeless-deaths/) | [:octocat:](https://github.com/statesman/homeless-deaths) |
| UT Tower 50th  | July 2016  | [:page_facing_up:](http://projects.statesman.com/news/ut-tower-shooting-50th-anniversary/) | [:octocat:](https://github.com/statesman/ut-tower-shooting-50th) |
| Silent majority  | Oct. 2016  | [:page_facing_up:](http://projects.statesman.com/news/latino-representation/) | [:octocat:](https://github.com/statesman/local-latino-representation) |
| The Talk  | Feb. 2017  | [:page_facing_up:](http://projects.statesman.com/news/the-talk/) | [:octocat:](https://github.com/statesman/police-relations) |


## Copyright

&copy; 2017 Austin American-Statesman
