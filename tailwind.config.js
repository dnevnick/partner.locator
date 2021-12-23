const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['OpenSans', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                '10-15': ['10px', '15px'],
            },
            colors:{
                'gray-main':'#5c5c5c',
            },
            spacing: {
                '22.5': '90px',
                '72': '288px'
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
