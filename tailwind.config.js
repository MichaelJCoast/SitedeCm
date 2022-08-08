const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/vendor/backpack/**/**/*.blade.php',
        './resources/views/*.blade.php',
        './resources/js/components/*.vue',
        './resources/js/views/*.vue',
    ],
    
    media: false,

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
