'use strict';

module.exports = function(grunt) {

    // load all grunt tasks
  
    //require('load-grunt-tasks')(grunt);

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

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
        /*
        phpcs: {
            application: {
                dir: 'src'
            },
            options: {
                bin: 'phpcs',
                standard: 'PSR-MOD'
            }
        },
        
        phplint: {
            options: {
                swapPath: '/tmp'
            },
            all: ['src/*.php', 'src/base/*.php', 'src/config/*.php', 'src/controller/*.php', 'src/model/*.php']
        },
       
        phpunit: {
            unit: {
                dir: 'tests/unit'
            },
            options: {
                bin: 'phpunit',
                bootstrap: 'tests/Bootstrap.php',
                colors: true,
                testdox: true
            }
        },
        
        php_analyzer: {
            application: {
                dir: 'src'
            }
        },
        */
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
            scripts: {
                files: ['wordpress/wp-content/themes/alphatheme/bootstrap-sass/assets/javascripts/bootstrap/*.js',
                        'wordpress/wp-content/themes/alphatheme/dev/js/global.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },

            css: {
                files: ['wordpress/wp-content/themes/alphatheme/**/*.scss',
                        'wordpress/wp-content/themes/alphatheme/**/*.sass'],
                tasks: ['compass'],
                options: {
                    spawn: false,
                    livereload: true,
                }
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
                files: ['/**/{,*/}*.{scss,sass}'],
                taskts: ['compass:dev']
            },

            sass: {
                files: ['dev/**/*.sass'],
                tasks: ['sass:dev'],
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
                dist: {
                   files: [{
                        expand: true,
                        cwd: 'sass/',
                        src:['/wordpress/wp-content/themes/alphatheme/**/*.sass','!**/_*.sass'],
                        dest:'/wordpress/wp-content/themes/alphatheme/dev/css/',
                        ext:'.css' 
                    }]
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
                }
            }
        }
         ,

       
        less: {
            development: {
                options: {
                    paths: ['wordpress/wp-content/themes']
                },
                files: {
                    "/alphatheme/dev/css/global.css": "/sass/global.sass",
                    "/alphatheme/dev/css/bootstrap-style.css": "/bootstrap-sass/template/project/style.sass",
                }
            },
        
            production: {
                options: {
                    paths: ['wordpress/wp-content/themes/alphatheme/prod/css/'],
                    cleancss: true,
                    modifyVars: {
                        imgPath: 'wordpress/wp-content/themes/alphatheme/images/'
                        
                    }
                },
                files: {
                    'wordpress/wp-content/themes/alphatheme/prod/css/production.css': 'wordpress/wp-content/themes/alphatheme/prod/sass/production.sass'
                }
            }
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
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-contrib-compass');

    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-contrib-less');
    // grunt.loadNpmTasks('load-grunt-tasks');
    // grunt.loadNpmTasks('grunt-concat-css');
    // grunt.loadNpmTasks('grunt-phpcs');
    // grunt.loadNpmTasks('grunt-phplint');
    // grunt.loadNpmTasks('grunt-phpunit');
    // grunt.loadNpmTasks('grunt-php-analyzer');
    

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    // grunt.registerTask('precommit' ['phplint:all','phpunit:unit']);
    // grunt.registerTask('default', ['phplint:all','phpcs','phpunit:unit','php_analyzer:application']);
    grunt.registerTask('default', ['watch', 'connect']);
    //grunt.registerTask('server' ['php']);


};