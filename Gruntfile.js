module.exports = function(grunt) {
  'use strict';

  // Project configuration.
  grunt.initConfig({

    // Clean files from dist/ before build
    clean: {
      css: ["dist/*.css", "dist/*.css.map"],
      js: ["dist/*.js", "dist/*.js.map"],
      fonts: ["fonts/**"]
    },

    // Copy FontAwesome files to the fonts/ directory
    copy: {
       fonts: {
        src: [
          'bower_components/font-awesome/fonts/**'
        ],
        dest: 'fonts/',
        flatten: true,
        expand: true
      }
    },

    // Transpile LESS
    less: {
      options: {
        sourceMap: true,
        sourceMapFilename: 'dist/style.css.map',
        sourceMapURL: 'style.css.map',
        sourceMapRootpath: '../',
        paths: ['bower_components/bootstrap/less']
      },
      prod: {
        options: {
          compress: true,
          yuicompress: true
        },
        files: {
          "dist/style.css": "src/css/style.less"
        }
      }
    },

    // Run our JavaScript through JSHint
    jshint: {
      js: {
        src: ['src/js/**.js']
      }
    },

    // Use Uglify to bundle up a pym file for the home page
    uglify: {
      options: {
        sourceMap: true
      },
      homepage: {
        files: {
          'dist/scripts.js': [
            'bower_components/jquery/dist/jquery.js',
            'bower_components/underscore/underscore.js',
            'bower_components/imagesloaded/imagesloaded.pkgd.js',
            'bower_components/Slides/source/jquery.slides.js',
            'bower_components/gsap/src/uncompressed/TweenMax.js',
            'bower_components/ScrollMagic/js/jquery.scrollmagic.js',
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
      markup: {
        files: ['index.php']
      },
      scripts: {
        files: ['src/js/**.js'],
        tasks: ['jshint', 'clean:js', 'uglify']
      },
      styles: {
        files: ['src/css/**.less', 'src/css/**/**.less'],
        tasks: ['clean:css', 'less']
      }
    }

  });

  // Load the task plugins
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.registerTask('default', ['jshint', 'clean', 'less', 'copy', 'uglify', 'watch']);

};
