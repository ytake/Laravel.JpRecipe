module.exports = function (grunt) {
    'use strict';
    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        uglify: {
            options:{
                mangle: false
            },
            markdown: {
                files: {

                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-bower-task');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['uglify']);
};