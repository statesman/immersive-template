var ENV_STAGE = process.env.ENV_STAGE || 's:/projects/';
var fs = require("fs");
var request = require("request");

module.exports = function(grunt) {
  'use strict';

  /*
    ~~~ set configuration here ~~~

    - site_dir: the site section to publish to
      e.g., "news" in http://projects.statesman.com/news/cps-missed-signs/

    - site_path: the URL endpoint to publish to
      e.g., "cps-missed-signs" in http://projects.statesman.com/news/cps-missed-signs/

    - slack_username: what slack username do you want to use

    - slack_icon_emoji: what slack icon do you want to use
      reference: http://www.emoji-cheat-sheet.com/
      (don't forget to bracket with colons)

  */

  var config = {
    site_dir: "news",
    site_path: "immersive-template",
    slack_username: "NeckbeardBot",
    slack_icon_emoji: ":neckbeard:"
  };

  // Project configuration.
  grunt.initConfig({

    // Clean files from dist/ before build
    clean: {
      css: ["public/dist/*.css", "public/dist/*.css.map"],
      js: ["public/dist/*.js", "public/dist/*.js.map"],
      fonts: ["public/fonts/**"],
      pages: ["public/**.html"]
    },

    // Copy FontAwesome/slick files to the fonts/ directory
    copy: {
       fonts: {
        src: [
          'node_modules/font-awesome/fonts/**',
          'node_modules/slick-carousel/slick-carousel/fonts/**'
        ],
        dest: 'public/fonts/',
        flatten: true,
        expand: true
      }
    },

    // Transpile LESS
    less: {
      options: {
        sourceMap: true,
        sourceMapFilename: 'public/dist/style.css.map',
        sourceMapURL: 'style.css.map',
        sourceMapRootpath: '../',
        paths: ['node_modules/bootstrap/less']
      },
      prod: {
        options: {
          compress: true,
          yuicompress: true
        },
        files: {
          "public/dist/style.css": [
              "node_modules/slick-carousel/slick/slick.less",
              "src/css/style.less"
          ]
        }
      }
    },

    // Run our JavaScript through JSHint
    jshint: {
      js: {
        src: ['src/js/**.js']
      }
    },

    // Lint our Bootstrap usage
    bootlint: {
      options: {
        relaxerror: ['W005']
      },
      files: 'public/**.html',
    },

    // Use Uglify to bundle up a pym file for the home page
    uglify: {
      options: {
        sourceMap: true
      },
      prod: {
        files: {
          'public/dist/scripts.js': [
            'node_modules/jquery/dist/jquery.js',
            'node_modules/underscore/underscore.js',
            'node_modules/imagesloaded/imagesloaded.pkgd.js',
            'node_modules/slick-carousel/slick/slick.js',
            'src/js/slider.js',
            'src/js/main.js'
          ]
        }
      }
    },

    // Watch for changes in LESS and JavaScript files,
    // relint/retranspile when a file changes
    watch: {
      options: {
        livereload: true,
      },
      templates: {
        files: ['pages/**/*', 'layouts/*', 'helpers/**', 'partials/*'],
        tasks: ['build:html']
      },
      scripts: {
        files: ['src/js/**.js'],
        tasks: ['build:js']
      },
      styles: {
        files: ['src/css/**.less', 'src/css/**/**.less'],
        tasks: ['build:css']
      }
    },

    // A simple little development server
    connect: {
      server: {
        options: {
          hostname: 'localhost',
          base: 'public',
          keepalive: true,
          livereload: true,
          open: true
        }
      }
    },

    // A tool to run the webserver and livereloader simultaneously
    concurrent: {
      options: {
        logConcurrentOutput: true
      },
      dev: ['connect', 'watch']
    },

    // Bake out static HTML of our pages
    generator: {
      prod: {
        files: [{
          cwd: 'pages',
          src: ['**/*'],
          dest: 'public'
        }],
        options: {
          partialsGlob: 'partials/*.hbs',
          templates: 'layouts',
          templateExt: 'hbs',
          base: 'http://projects.statesman.com/templates/immersive/',
          helpers: require('./helpers'),
          nav: [
            {
              title: "Index",
              subtitle: "Overview",
              file: "index",
              children: [
                {
                  title: "Sub-story 1",
                  subtitle: "Explaining story 1",
                  file: "page1"
                },
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
              title: "Story 1",
              subtitle: "More on story 1",
              file: "page1"
            },
            {
              title: "Story 2",
              subtitle: "More on story 2",
              file: "page2"
            },
            {
              title: "Story 3",
              subtitle: "And this is story 3",
              file: "page3",
              children: [
                {
                  title: "Sub-story 4",
                  file: "page4"
                }
              ]
            }
          ]
        }
      }
    },

    // stage path needs to be set
    ftpush: {
      stage: {
        auth: {
          host: 'host.coxmediagroup.com',
          port: 21,
          authKey: 'cmg'
        },
        src: 'public',
        dest: ['/stage_aas/projects', config.site_dir, config.site_path].join("/"),
        exclusions: ['dist/tmp','Thumbs.db','.DS_Store'],
        simple: false,
        useList: false
      },
      // prod path will need to change
      prod: {
        auth: {
          host: 'host.coxmediagroup.com',
          port: 21,
          authKey: 'cmg'
        },
        src: 'public',
        dest: ['/prod_aas/projects', config.site_dir, config.site_path].join("/"),
        exclusions: ['dist/tmp','Thumbs.db','.DS_Store'],
        simple: false,
        useList: false
      }
    },

  });

  // Load the task plugins
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-generator');
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-concurrent');
  grunt.loadNpmTasks('grunt-bootlint');
  grunt.loadNpmTasks('grunt-ftpush');

// register a custom task to hit slack
grunt.registerTask('slack', function(where_dis_go) {

    // first, check to see if there's a .slack file
    // (this file has the webhook endpoint)
    if(grunt.file.isFile('.slack')) {

        // homeboy here runs async, so
        var done = this.async();

        // prod or stage?
        var ftp_path = where_dis_go === "prod" ? ["http://projects.statesman.com", config.site_dir, config.site_path].join("/") : ["http://stage.host.coxmediagroup.com/aas/projects", config.site_dir, config.site_path].join("/");

        var payload = {
            "text": "hello yes i am pushing code to *" + config.site_path +  "*: " + ftp_path,
            "channel": "@cjwinchester",
            "username": config.slack_username,
            "icon_emoji": config.slack_icon_emoji
        };

        // send the request
        request.post(
            {
                url: fs.readFileSync('.slack', {encoding: 'utf8'}),
                json: payload
            },
            function callback(err, res, body) {
                done();
                if (body !== "ok") {
                    return console.error('upload failed:', body);
                }
            console.log('we slacked it up just fine people, good work');
        });
    }
    // if no .slack file, log it
    else {
        grunt.log.warn('No .slack file exists. Skipping Slack notification.');
    }
});

  // Assorted build tasks
  grunt.registerTask('build:html', ['clean:pages', 'generator', 'bootlint']);
  grunt.registerTask('build:css', ['clean:css', 'clean:fonts', 'copy', 'less']);
  grunt.registerTask('build:js', ['clean:js', 'jshint', 'uglify']);
  grunt.registerTask('build', ['build:html', 'build:css', 'build:js']);

  // Publishing tasks
  grunt.registerTask('stage', ['build', 'ftpush:stage','slack:stage']);

  // A dev task that runs a build then launches a dev server w/ livereload
  grunt.registerTask('default', ['build', 'concurrent']);
};
