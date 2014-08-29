"use strict";

module.exports = function(grunt){

 	var taskName;
	var pkg = grunt.file.readJSON("package.json");
	for(taskName in pkg.devDependencies) {
		if(taskName.substring(0, 6) == "grunt-") {
			grunt.loadNpmTasks(taskName);
		}
	}

	grunt.initConfig({

		//package.jason
		pkg: pkg,
		banner: '/*\n* Theme name: <%= pkg.name %>\n* Version: <%= pkg.version %>\n* Author: <%= pkg.author %>\n* Description: <%= pkg.description %>\n*/\n',

		// watch for changes and trigger compass, jshint, uglify and livereload
		watch: {
			options: {
				spawn: true
			},
			html: {
				files: ["wp-content/themes/ecokaishu/**/*.{php,html}"],
				tasks: []
			},
			compass: {
				files: ["wp-content/themes/ecokaishu/_scss/**/*.scss"],
				tasks: ["compassMultiple", "cssmin"]
			},
			js: {
				files: "wp-content/themes/ecokaishu/**/*.js",
				tasks: ["uglify"]
			}
		},

		// compass and scss
		compassMultiple: {
			options : {
				environment: "development",
				outputStyle: "nested",
				javascriptsDir: "wp-content/themes/ecokaishu/assets/js",
				imagesDir: "wp-content/themes/ecokaishu/assets/img",
				fontsDir: "wp-content/themes/ecokaishu/assets/fonts",
				time: true
			},
			common: {
				options: {
					sassDir: "wp-content/themes/ecokaishu/_scss",
					cssDir: "wp-content/themes/ecokaishu/assets/css"
				}
			}
		},

		//cssmin
		cssmin: {
				options: {
					banner: '<%= banner %>'
				},
				files: {
					src: ["wp-content/themes/ecokaishu/assets/css/style.css", "wp-content/themes/ecokaishu/assets/css/plugins/**/*.{scss,css,sass}"],
					dest: "wp-content/themes/ecokaishu/style.css"
				}
		},

		// combine-media-queries メディアクエリをまとめる
		// cmq: {
		// 	options: {
		// 		log: false
		// 	},
		// 	dev: {
		// 		files: {
		// 			"css/": ["css/*.css"]
		// 		}
		// 	}
		// },

		// csscomb CSSプロパティを整理
		// csscomb: {
		// 	dev: {
		// 		expand: true,
		// 		cwd: "",
		// 		src: ["style.css"],
		// 		dest: ""
		// 	}
		// },


		// clean 不要ファイルを削除
		// clean: {
			// 最初にreleaseディレクトリ内を削除
		// 	deleteReleaseDir: {
		// 		src: "www/"
		// 	}
		// },

		// uglify to concat, minify, and make source maps
		uglify: {
			main: {
				src: [
					"wp-content/themes/ecokaishu/assets/js/jquery-2.1.1.min.js",
					"wp-content/themes/ecokaishu/assets/js/html5shiv.min.js",
					"wp-content/themes/ecokaishu/assets/js/d3.min.js",
					"wp-content/themes/ecokaishu/assets/js/owl.carousel.min.js",
					"wp-content/themes/ecokaishu/assets/js/masonry.pkgd.min.js",
					"wp-content/themes/ecokaishu/assets/js/imagesloaded.pkgd.min.js"
				],
				dest: "wp-content/themes/ecokaishu/script.min.js"
			}
		},

		mocha: {
  all: ['http://localhost:3501/index.html']
},

	});

	// register task
	grunt.registerTask("default", ["watch"]);

	// register task
	//grunt.registerTask("release", ["wp-content/themes/ecokaishu/clean:deleteReleaseDir","copy"]);


};


