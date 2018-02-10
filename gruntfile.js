module.exports = function( grunt ) {
    
    grunt.initConfig({

        // Clean Files
        clean: {
            css: ['libs/css/main-style.css']
        },

        // Compilar Sass
        sass: {
            dist: {
                files: [{
                    expand: true,
                    cwd: 'libs/css/sass',
                    src: ['main-style.sass'],
                    dest: 'libs/css',
                    ext: '.css'
                }],
                style: 'compressed'
            }
        }
    });

    // Load plugins
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-sass');

    // Register Tasks
    grunt.registerTask( 'default', ['clean', 'sass'] );
}