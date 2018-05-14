'use strict' //Включаем строгий режим.
// Подключаем плагины.
var gulp = require('gulp'),
    del = require ('del'),
    pug = require ('gulp-pug'),
    csso = require('gulp-csso'),
    less = require('gulp-less'),
    sass = require('gulp-sass'),
    cache = require ('gulp-cache'),
    concat = require('gulp-concat'),
    svgMin = require('gulp-svgmin'),
    notify = require('gulp-notify'),
    replace = require('gulp-replace'),
    cheerio = require('gulp-cheerio'),
    plumber = require('gulp-plumber'),
    tinypng = require('gulp-tinypng'),
    cssunit = require('gulp-css-unit'),
    browserSync = require('browser-sync'),
    svgSprite = require('gulp-svg-sprite'),
    autoprefixer = require('gulp-autoprefixer');

//  PUG.
gulp.task('pug', function () {
  return gulp.src('app/pug/**/*.pug')
  .pipe(plumber({
    errorHandler: notify.onError(function(err){
      return {
        title: 'PUG',
          message: err.message
      }
    })
  }))
  .pipe(pug({
    pretty:true
  }))
  .pipe(gulp.dest('app/'))
  .pipe(browserSync.stream())
});

//  LESS.
gulp.task('less', function () {
  return gulp.src('app/less/**/*.less')
    .pipe(plumber({
      errorHandler: notify.onError(function(err){
        return {
          title: 'LESS',
            message: err.message
        }
      })
    }))
    .pipe(less())
    .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8'], { cascade: true }))
    .pipe(cssunit({
      type: "px-to-rem",
      rootSize: 16
    }))
    .pipe(gulp.dest('app/css'))
    .pipe(browserSync.stream())
});

//  SASS.
gulp.task('sass', function () {
  return gulp.src('app/sass/**/*.+(scss|sass)')
    .pipe(plumber({
      errorHandler: notify.onError(function(err){
        return {
          title: 'SASS',
            message: err.message
        }
      })
    }))
    .pipe(sass({ outputStyle: 'expanded' }))
    .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8'], { cascade: true }))
    .pipe(cssunit({
      type: "px-to-rem",
      rootSize: 16
    }))
    .pipe(gulp.dest('app/css'))
    .pipe(browserSync.stream())
});

// JS
gulp.task('scripts', function () {
  return gulp.src('app/js/main.js')
  .pipe(browserSync.stream())
});

//  DEL. Удоляем папку dist если такая существует.
gulp.task ('del', function(){
  return del.sync('./dist');
});

// CLEAR. Чистим кэш.
gulp.task ('clear', function(){
  return cache.clearAll();
});

//  IMG - image compression. Ключ брать сдесь >>> https://tinypng.com/developers
gulp.task('img', function () {
  return gulp.src('app/img_original/**/*.{png,jpg,gif}')
  .pipe(tinypng('2aMLKQ6ECQ33iyqaRf3-emWU0BEF8suR')) //<<< KEY / КЛЮЧ
  .pipe(gulp.dest('app/img/'));
});

//  SVG. Создаёт SVG спрайт удоляя из него атрибуты: fill, stroke и style. 
  gulp.task('svg', () => {
    return gulp.src('./app/svg/*.svg')
      .pipe(svgMin({
        js2svg: {
          pretty: true
        }
      }))
      .pipe(cheerio({
        run: function($) {
          $('[fill]').removeAttr('fill');
          $('[stroke]').removeAttr('stroke');
          $('[style]').removeAttr('style');
        },
        parserOptions: { xmlMode: true }
      }))
      .pipe(replace('&gt;', '>'))
      .pipe(svgSprite({
        mode: {
          symbol: {
            sprite: "sprite.svg"
          }
        }
      }))
      .pipe(gulp.dest('app/svg/'));
  });

//  LIBS - JavaScript minimized libraries
gulp.task('libs', function () {
  return gulp.src(['node_modules/jquery/dist/jquery.min.js'])
  .pipe(concat('libs.min.js'))
  .pipe(gulp.dest('app/js/'))
  .pipe(browserSync.reload({
    stream:true
  }));
});

//  SERVER. Запускает BrowserSync на 3000 порте.
gulp.task('server', ['watch'], function() {
  browserSync.init({
      server: {
          baseDir: "./app"
      }
  });
});

//  WATCH.
gulp.task("watch", ['less', 'sass', 'pug', 'scripts'], function () {
	gulp.watch('app/pug/**/*.pug', ['pug'] );
	gulp.watch('app/js/**/*.js', ['scripts'] );
  gulp.watch('app/less/**/*.less', ['less'] );
  gulp.watch('app/sass/**/*.+(scss|sass)', ['sass'] );
  gulp.watch('app/**/*.html').on('change', browserSync.reload);
  });
  
//  DEFAULT. Задача по умолчанию.
gulp.task('default', ['server']);

gulp.task ('build',['del','pug','less','sass','scripts','libs'], function(){

  var buildCss = gulp.src([
      'app/css/main.css',
      'app/css/libs.min.css',
  ])
  .pipe(gulp.dest('dist/css'));

  var buildJs = gulp.src('app/js/**/*')
  .pipe(gulp.dest('dist/js'));

  var buildHtml = gulp.src('app/*.html')
  .pipe(gulp.dest('dist'));

  // var buildHtml = gulp.src('app/*.php')
  // .pipe(gulp.dest('dist'));

  var buildHtml = gulp.src('app/*.tpl')
  .pipe(gulp.dest('dist'));

  var buildFonts = gulp.src('app/fonts/**/*')
  .pipe(gulp.dest('dist/fonts'));

  var buildSVG = gulp.src('app/svg/**/*')
  .pipe(gulp.dest('dist/svg'));

  var buildImg = gulp.src('app/img/**/*')
  .pipe(gulp.dest('dist/img'));
});