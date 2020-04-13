const purgecss = require('@fullhuman/postcss-purgecss')({
    content: ['./**/*.html', 'build/*.js'],
    whitelistPatterns: [/uk-animation-/],
    defaultExtractor: content => content.match(/[\w-/:@]+(?<!:)/g) || []
});


module.exports = {
    plugins: [
        require('tailwindcss'),
        require('autoprefixer'),
        ...process.env.NODE_ENV === 'production' ? [purgecss] : []
    ]
}