'use strict';

module.exports = function(grunt) {

    // load all grunt tasks
  

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
         /*==
        |   php V
        |   concat V
        |   uglify V
        |   imagemin V
         \==*/

        php: {
            dist: {
                options: {
                    port: 8080,
                    base: 'web',
                    open: true,
                    keepalive: true
                }
            }
        },
        
        concat: {
            // 2. Configuration for concatinating files goes here.
            dist: {
                src: [
                    'wordpress/wp-content/themes/alphatheme/bootstrap-sass/assets/javascripts/bootstrap/*.js', // All JS in the libs folder
                    'wordpress/wp-content/themes/alphatheme/dev/js/global.js'  // This specific file
                ],
            dest: 'wordpress/wp-content/themes/alphatheme/dev/js/production.js',
            }
        },

        uglify: {
            build: {
                src: 'wordpress/wp-content/themes/alphatheme/dev/js/production.js',
                dest:'wordpress/wp-content/themes/alphatheme/dev/js/production.min.js'
            }
        },

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'wordpress/wp-content/themes/alphatheme/dev/images/',
                    src: ['wordpress/wp-content/themes/alphatheme/dev/**/*.{png,jpg,gif}'],
                    dest: 'wordpress/wp-content/themes/alphatheme/dev/images/min'
                }]
            }
        },

        watch: {

             /*==
            |   scripts     V
            |   css         X
            |   html        V
            |   livereload  V
            |   compass     V
            |   sass
            |   php
            |   options
            |
             \==*/

            scripts: {
                files: ['wordpress/wp-content/themes/alphatheme/bootstrap-sass/assets/javascripts/bootstrap/*.js',
                        'wordpress/wp-content/themes/alphatheme/dev/js/global.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },

            html: {
                files: ['**/*.html', '!**/node_modules/**'],
                options: {
                    nospawn: true
                }
            },

            livereload: {
                files: ['**/*.html', '**/*.php', 'wordpress/wp-content/themes/alphatheme/dev/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            },

            compass: {
                files: ['/**/*.{scss,sass}'],
                taskts: ['compass:dev']
            },


            sass: {
                files: ['dev/**/*.sass'],
                tasks: ['sass:dev'],
                compass: true,
                options: {
                    livereload: 35729
                } 
            },

            php: {
                files: ['*.php','wordpress/wp-includes/{,*/}*.php'],
                options: {
                    livereload: 35729
                }
            },

            options: {
                livereload: true,
                spawn: false
            }
        },

        sass: {
          dev: {
            options: {
              style: 'expanded',
              banner: '<%= tag.banner %>',
              compass: true
            },
            files: {
              '<%= project.assets %>/css/style.css': '<%= project.css %>'
            }
          },
          dist: {
            options: {
              style: 'compressed',
              compass: true
            },
            files: {
              '<%= project.assets %>/css/style.css': '<%= project.css %>'
            }
          }
        },

        compass: {
            dev: {
                options: {
                    sassDir: 'wordpress/wp-content/themes/alphatheme/dev/sass/',
                    cssDir: 'wordpress/wp-content/themes/alphatheme/dev/css/',
                    fontsDir: 'wordpress/wp-content/themes/alphatheme/dev/fonts/',
                    javascriptsDir: 'wordpress/wp-content/themes/alphatheme/dev/js/',
                    imagesDir: 'wordpress/wp-content/themes/alphatheme/dev/images/',
                    relativeAssets: true,
                    environment: 'development',
                }
            },
            prod: {
                 options: {              
                    sassDir: ['wordpress/wp-content/themes/alphatheme/prod/sass/'],
                    cssDir: ['wordpress/wp-content/themes/alphatheme/prod/css/'],
                    environment: 'production'
                }
            }

        },
        project: {
          app: 'app',
          assets: '<%= project.app %>/assets',
          src: '<%= project.assets %>/src',
          css: [
            '<%= project.src %>/scss/style.scss'
          ],
          js: [
            '<%= project.src %>/js/*.js'
          ]
        },

        tag: {
             banner: '/*!\n' +
                  ' * <%= pkg.name %>\n' +
                  ' * <%= pkg.title %>\n' +
                  ' * @author <%= pkg.author %>\n' +
                  ' * @version <%= pkg.version %>\n' +
                  ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' +
                  ' */\n'
        },

        connect: {
            server: {
                options: {
                    livereload: true,
                     port: 8080,
                     base: 'public'
                }
            }
        }  
    });

    // 3. Where we tell Grunt we plan to use this plug-in.

     /*==
    |   contrib-concat      V
    |   contrib-uglify      V
    |   contrib-imagemin    V
    |   contrib-watch       V
    |   contrib-sass
    |   contrib-php         V
    |   contrib-compass
    |   contrib-connect     V
    |   contrib-less
    |   
    |   
     \==*/

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-connect');

    

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.

    grunt.registerTask('default', ['watch', 'connect']);
    grunt.registerTask('dev', ['compass:dev']);
    grunt.registerTask('prod', ['compass:prod']);


};