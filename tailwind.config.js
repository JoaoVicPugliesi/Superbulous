import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                oswald: ['Oswald', 'serif'],
                barlow: ['Barlow Condensed', 'serif'],
            },

            colors: {
                color1: '#11001C',
                color2: '#1A0129',
                color3: '#220135',
                color4: '#3A025B',
                color5: '#520380',
                color6: '#656565'
            },

            screens: {
                'max-500px': { max: '500px' },
                'max-350px': { max: '350px' },
            }
        },
    },
    plugins: [],
};
