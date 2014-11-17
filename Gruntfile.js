'use strict';

module.exports = function(grunt) {

    // load all grunt tasks
  
    require('load-grunt-tasks')(grunt);

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
                    'js/libs/*.js', // All JS in the libs folder
                    'js/global.js'  // This specific file
                ],
            dest: 'js/build/production.js',
            }
        },

        uglify: {
            build: {
                src: 'js/build/production.js',
                dest: 'js/build/production.min.js'
            }
        },

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'images/build/'
                }]
            }
        },

        watch: {
            scripts: {
                files: ['js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },

            css: {
                files: ['**/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            },

            html: {
                files: ['**/*.html', '!**/node_modules/**'],
                options: {
                    nospawn: true
                }
            },

            livereload: {
                files: ['**/*.html', '**/*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            },

            compass: {
                files: ['scss/{,*/}*.{scss,sass}'],
                taskts: ['compass:dev']
            },

            sass: {
                files: ['sass/**/*.sass'],
                tasks: ['sass:dev'],
                options: {
                    livereload: 35729
                } 
            },

            php: {
                files: ['*.php','includes/{,*/}*.php'],
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
                files: [
                    {
                        src:['**/*.sass','!**/_*.sass'],
                        cwd: 'sass',
                        dest:'css',
                        ext:'.css',
                        expand:true
                    }
                ],
                options: {
                    style:'expanded',
                    compass:true
                }
            }
        },

        compass: {
            dev: {
                options: {
                    require: 'susy', // optional if you don't use Susy. But you should!
                    sassDir: 'dev/scss',
                    cssDir: 'dev/css',
                    fontsDir: 'dev/fonts',
                    javascriptsDir: 'dev/js',
                    imagesDir: 'dev/images',
                    relativeAssets: true,
                }
            }
        },

        less: {
            development: {
                options: {
                    paths: ['stylesheets/css']
                },
                files: {
                    "path/to/results.css": "path/to/source.less"
                }
            },

            production: {
                options: {
                    paths: ['stylesheets/css'],
                    cleancss: true,
                    modifyVars: {
                        imgPath: 'path/to/images',
                        bgColor: 'red'
                    }
                },
                files: {
                    'path/to/results.css': 'path/to/source.less'
                }
            }
        }
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
    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('load-grunt-tasks');
    grunt.loadNpmTasks('grunt-contrib-compass');
    //grunt.loadNpmTasks('grunt-phpcs');
    //grunt.loadNpmTasks('grunt-phplint');
    //grunt.loadNpmTasks('grunt-phpunit');
    //grunt.loadNpmTasks('grunt-php-analyzer');
    

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    // grunt.registerTask('precommit' ['phplint:all','phpunit:unit']);
    // grunt.registerTask('default', ['phplint:all','phpcs','phpunit:unit','php_analyzer:application']);
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('server' ['php']);


};