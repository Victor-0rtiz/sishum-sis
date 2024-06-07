import { src, dest, watch, series } from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import terser from 'gulp-terser';
import plumber from 'gulp-plumber';
import notify from 'gulp-notify';

const sass = gulpSass(dartSass);

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js'
};

export function css(done) {
    src(paths.scss, { sourcemaps: true })
        .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })) // Maneja errores con gulp-notify
        .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
        .pipe(dest('./public/build/css', { sourcemaps: '.' }));
    done();
}

export function js(done) {
    src(paths.js, { sourcemaps: true })
        .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })) // Maneja errores con gulp-notify
        .pipe(terser().on('error', function (err) { notify.onError(err.toString())(err); this.emit('end'); }))
        .pipe(dest('./public/build/js', { sourcemaps: '.' }));
    done();
}

export function dev() {
    watch(paths.scss, css);
    watch(paths.js, js);
}

export default series(js, css, dev);
