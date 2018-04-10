import gulp from 'gulp';
import sass from 'gulp-sass';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import cleanCSS from 'gulp-clean-css';
import del from 'del';

const paths = {
    admin: {
        scripts: {
            src: 'assets/Admin/js/index.js',
            dest: 'webroot/js/'
        },
        styles: {
            src: 'assets/Admin/css/**.css',
            dest: 'webroot/css/'
        }
    },
    /*
    restaurant: {
        sass: {
            src: 'assets/sass/*.sass',
            dest: 'webroot/css/'
        },
        styles: {
            src: ['assets/sass/*.sass', 'assets/css/cake.css'],
            dest: 'webroot/css/'
        },
        scripts: {
            src: 'assets/js/*.js',
            dest: 'webroot/js/'
        }
    },
    */
    assets: {
        src: 'assets/copy/**',
        dest: 'webroot/'
    }
};

/* Not all tasks need to use streams, a gulpfile is just another node program
 * and you can use all packages available on npm, but it must return either a
 * Promise, a Stream or take a callback and call it
 */
function clean() {
    // You can use multiple globbing patterns as you would with `gulp.src`,
    // for example if you are using del 2.0 or above, return its promise
    return del(['webroot']);
}

/*
 * Define our tasks using plain functions
 */
 function adminStyles() {
     return gulp.src(paths.admin.styles.src)
         .pipe(sass().on('error', sass.logError))
         .pipe(cleanCSS())
         // pass in options to the stream
         .pipe(rename({
             basename: 'admin',
             suffix: '.min'
         }))
         .pipe(gulp.dest(paths.admin.styles.dest));
 }

 function adminScripts() {
     return gulp.src(paths.admin.scripts.src, {
             sourcemaps: true
         })
         .pipe(babel())
         .pipe(uglify())
         .pipe(rename({
             basename: 'admin',
             suffix: '.min'
         }))
         .pipe(gulp.dest(paths.admin.scripts.dest));
 }

/*
function sassTask() {
    return gulp.src(paths.sass.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(paths.sass.dest));
}

function watch() {
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.styles.src, styles);
}
*/

function copyFile() {
    return gulp.src(paths.assets.src, {
            dot: true
        })
        .pipe(gulp.dest(paths.assets.dest));
}

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
/*
exports.clean = clean;
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
*/
/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var admin = gulp.parallel(adminStyles, adminScripts)
var build = gulp.series(clean, admin, copyFile);

/*
 * You can still use `gulp.task` to expose tasks
 */
gulp.task('build', build);

/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);
