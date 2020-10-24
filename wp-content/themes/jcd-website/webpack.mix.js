const mix = require('laravel-mix');

// TODO: Use config or env var for URL
// TODO: Watch PHP files?
mix.setPublicPath('dist').browserSync('givewpnew.test');

mix.sass('assets/styles/main.scss', 'styles').version();

// TODO: Compile JS
