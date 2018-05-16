'use strict';
import yargs from 'yargs';

import gulp from 'gulp';
import autoprefixer from 'gulp-autoprefixer';
import cleanCss from 'gulp-clean-css';
import gulpIf from 'gulp-if';
import imagemin from 'gulp-imagemin';
import notify from 'gulp-notify';
import rename from 'gulp-rename';
import sass from 'gulp-sass';
import sassLint from 'gulp-sass-lint';
import sourcemaps from 'gulp-sourcemaps';
import uglify from 'gulp-uglify';
import gutil from 'gulp-util';
import htmllint from 'gulp-htmllint';

const PRODUCTION = !!(yargs.argv.production);

// Lint first-party Sass
gulp.task('sass-lint', () => {
  // All first-party Sass should be written in partials (file name should start with an _) and imported within app.scss
  return gulp.src('user/themes/lucy-theme/css/src/**/_*.scss')
      .pipe(sassLint({
        configFile: 'sass-lint.json'
      }))
      .pipe(sassLint.format())
      .pipe(sassLint.failOnError())
});

// Build Sass into CSS
gulp.task('sass-build', () => {
  return gulp.src('user/themes/lucy-theme/css/src/app.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        style: 'expanded',
        includePaths: [
          "node_modules/foundation-sites/scss"
        ]
      }).on('error', notify.onError((error) => {
        return "Problem file : " + error.message;
      })))
      .pipe(autoprefixer({ browsers: [
        "last 2 versions",
        "ie >= 9",
        "ios >= 7"
      ]}))
      .pipe(cleanCss())
      .pipe(rename({ suffix: '.min' }))
      .pipe(gulpIf(!PRODUCTION, sourcemaps.write()))
      .pipe(gulp.dest('user/themes/lucy-theme/css/dist'))
      .pipe(notify({ message: 'Sass built to dist/app.min.css' }));
});

// Lint then Build Sass into CSS
gulp.task('sass', (callback) => {
  return gulp.series('sass-lint', 'sass-build')(callback);
});

gulp.task('build', gulp.parallel('sass'));

// If given no command, run the build task
gulp.task('default', gulp.series('build'));

// Watch for changes to files. When a change is detected, re-run specific build tasks based on the file type.
gulp.task('watch', () => {
  gulp.watch('node_modules/**/*').on('all', gulp.series('build'));
  gulp.watch('user/themes/lucy-theme/css/src/**/*.scss').on('all', gulp.series('sass'));
});

// Build and then watch for changes to source files
gulp.task('build:watch', gulp.series('build', 'watch'));
