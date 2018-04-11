import gulp from 'gulp';
import sass from 'gulp-sass';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import cleanCSS from 'gulp-clean-css';
import del from 'del';
/*
var Eyeglass = require("eyeglass").Eyeglass;

var eyeglass = new Eyeglass(
  // ... node-sass options

    importer: function(uri, prev, done) {
        done(sass.compiler.types.NULL);
    }

)

console.log(eyeglass);
// Disable import once with gulp until we
// figure out how to make them work together.
eyeglass.enableImportOnce = false
*/

const paths = {
    admin: {
        scripts: {
            src: 'assets/Admin/js/index.js',
            dest: 'webroot/js/'
        },
        styles: {
            sass: {
                src: 'assets/Admin/sass/*.sass',
                dest: 'assets/Admin/css/'
            },
            css: {
                src: 'assets/Admin/css/*.css',
                dest: 'webroot/css/'
            }
        }
    },
    restaurant: {
        scripts: {
            src: 'assets/Restaurant/js/index.js',
            dest: 'webroot/js/'
        },
        styles: {
            sass: {
                src: 'assets/Restaurant/sass/*.sass',
                dest: 'assets/Restaurant/css/'
            },
            css: {
                src: 'assets/Restaurant/css/*.css',
                dest: 'webroot/css/'
            }
        }
    },
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

function adminSass() {
    return gulp.src(paths.admin.styles.sass.src)
        .pipe(sass(/*eyeglass.sassOptions()*/).on('error', sass.logError))
        .pipe(gulp.dest(paths.admin.styles.sass.dest))
}

function adminStyles() {
    //TODO find a way to put sass at the end
    //[
    //'/src/**/!(foobar)*.js', // all files that end in .js EXCEPT foobar*.js
    //'/src/js/foobar.js',
    //]
    return gulp.src([paths.admin.styles.css.src, 'node_modules/bootstrap/dist/css/bootstrap.css'])
        .pipe(concat('admin.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(paths.admin.styles.css.dest));
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

/* Restaurant part */

function restaurantSass() {
    return gulp.src(paths.restaurant.styles.sass.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(paths.restaurant.styles.sass.dest))
}

function restaurantStyles() {
    //TODO find a way to put sass at the end
    //[
    //'/src/**/!(foobar)*.js', // all files that end in .js EXCEPT foobar*.js
    //'/src/js/foobar.js',
    //]
    return gulp.src([paths.restaurant.styles.css.src, 'node_modules/bootstrap/dist/css/bootstrap.css'])
        .pipe(concat('restaurant.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(paths.restaurant.styles.css.dest));
}

function restaurantScripts() {
    return gulp.src(paths.restaurant.scripts.src, {
            sourcemaps: true
        })
        .pipe(babel())
        .pipe(uglify())
        .pipe(rename({
            basename: 'restaurant',
            suffix: '.min'
        }))
        .pipe(gulp.dest(paths.restaurant.scripts.dest));
}

/*
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

const admin = gulp.series(adminSass, gulp.parallel(adminStyles, adminScripts))
const restaurant = gulp.series(restaurantSass, gulp.parallel(restaurantStyles, restaurantScripts))
const build = gulp.series(clean, gulp.parallel(admin, restaurant), copyFile);

/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);
