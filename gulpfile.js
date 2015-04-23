var gulp = require('gulp'),     
    notify = require("gulp-notify"), 
    livereload = require('gulp-livereload'),
    usemin = require('gulp-usemin'),
    replace = require('gulp-replace'),
    uglify = require('gulp-uglifyjs');
    autoprefixer = require('gulp-autoprefixer'),
    less = require('gulp-less'),
    svgSprite = require('gulp-svg-sprite'),
    svgo = require('gulp-svgo'),
    gulpIgnore = require('gulp-ignore');

var config = {
     base_path: './library/',
}


// The libs & App Controller
// var libs = [
// config.base_path +'js/scripts.js',
// config.base_path +'js/libs/socialtimeline/jquery.magnific-popup.min.js',
// ];

// gulp.task('uglify', function() {
//   gulp.src(libs)
//     .pipe(uglify('app.min.js'))
//     .pipe(gulp.dest(config.base_path + 'js/'))
// });

// SVG Spriting
sprite_config       = {
    "mode": {
        "css": {
            "render": {
                "less": true
            },
            "dest" : "./less",
            "layout":"diagonal"
        }
    }
};

gulp.task('create-sprite', function() {
  gulp.src(config.base_path +'images/svg/*.svg')
      .pipe(svgo())
      .pipe(svgSprite(sprite_config))
      .pipe(gulp.dest(config.base_path));
});

gulp.task('sprite', ['create-sprite'],function (){
    gulp.src(config.base_path +'less/svg/*.svg')
        .pipe(gulp.dest(config.base_path +'css/svg/'));
});

gulp.task('less', function () {

  gulp.src(config.base_path + 'less/**/*.less')
    .pipe(less())
    .on("error", notify.onError(function (error) {
        return "Error: " + error.message;
  }))
    .pipe(autoprefixer({
    browsers: ['last 2 versions','ie 9','ie 8']
    }))
    .pipe(gulp.dest(config.base_path + 'css/'))
    .pipe(notify("LESS Build ok!"));
});


 gulp.task('watch', function() {
	var server = livereload.listen();
   gulp.watch(config.base_path + 'less/**/*.less', ['less']);
  gulp.watch(config.base_path + 'css/**/*.css').on('change',livereload.changed);
});

  gulp.task('default', ['watch']);
