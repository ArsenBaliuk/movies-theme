import gulp from 'gulp';
import imagemin from 'gulp-imagemin';
import sass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';
import browserSync from 'browser-sync';
import sassCompiler from 'sass';

const sassModule = sass(sassCompiler);

const browserSyncInstance = browserSync.create();

gulp.task('images', () => {
    return gulp.src('src/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('dist/img'));
});

gulp.task('styles', function() {
    return gulp.src('src/scss/**/*.scss')
        .pipe(concat('styles.scss'))
        .pipe(sassModule().on('error', sassModule.logError))
        .pipe(autoprefixer('last 2 versions'))
        .pipe(cleanCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('dist/css'))
        .pipe(browserSyncInstance.reload({
            stream: true
        }));
});

gulp.task('scripts', function() {
    return gulp.src('src/js/*.js')
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('dist/js'))
        .pipe(browserSyncInstance.reload({
            stream: true
        }));
});

gulp.task('watch', function() {
    browserSyncInstance.init({
        proxy: "http://localhost:8888"
    });
    gulp.watch('src/img/**/*', gulp.series('images'));
    gulp.watch( 'src/scss/**/*.scss', gulp.series( 'styles' ) );
    gulp.watch( 'src/js/*.js', gulp.series( 'scripts' ) );
    gulp.watch( '**/*.php' ).on( 'change', browserSyncInstance.reload) ;
});

gulp.task( 'default', gulp.parallel( 'images', 'styles', 'scripts', 'watch' ) );
