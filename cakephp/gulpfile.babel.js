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

function clean() {
    return del(['webroot']);
}

function adminSass() {
    return gulp.src(paths.admin.styles.sass.src)
        .pipe(sass().on('error', sass.logError))
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


function watch() {
    gulp.watch([paths.admin.scripts.src, paths.restaurant.scripts.src], scripts);
    gulp.watch([paths.admin.styles.sass.src, paths.admin.styles.css.src, "!assets/Restaurant/css/default.css" , paths.restaurant.styles.sass.src, paths.restaurant.styles.css.src, "!assets/Admin/css/default.css"], styles);
}


function copyFile() {
    return gulp.src(paths.assets.src, {
            dot: true
        })
        .pipe(gulp.dest(paths.assets.dest));
}

function copyNodeModules() {
    return gulp.src(['node_modules/bootstrap/**', 'node_modules/jquery/**'], { "base" : "." })
        .pipe(gulp.dest('webroot/'));
}

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */

exports.clean = clean;
exports.watch = watch;
exports.copyNodeModules = copyNodeModules

const styles = gulp.parallel(gulp.series(adminSass, adminStyles), gulp.series(restaurantSass, restaurantStyles))
const scripts = gulp.parallel(restaurantScripts, adminScripts)

const admin = gulp.series(adminSass, gulp.parallel(adminStyles, adminScripts))
const restaurant = gulp.series(restaurantSass, gulp.parallel(restaurantStyles, restaurantScripts))
const build = gulp.series(clean, gulp.parallel(admin, restaurant), copyFile, copyNodeModules);

/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);
