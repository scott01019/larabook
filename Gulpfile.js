var gulp = require('gulp');

var sass = require('gulp-sass');

var autoprefiexer = require('gulp-autoprefixer');

gulp.task('css', function()
{
	gulp.src('app/assets/sass/main.scss')
		.pipe(sass())
		.pipe(autoprefiexer('last 10 versions'))
		.pipe(gulp.dest('public/css'))
});

gulp.task('watch', function()
{
	gulp.watch('app/assets/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);