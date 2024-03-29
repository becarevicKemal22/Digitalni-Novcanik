import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

        },

        colors: {
            ...colors,
            'accent': '#7555D3', // ljubicasta
            'normal': '#E1DDEE', // sivkasto bijela
            'background': '#211C28', // tamna za pozadinu
            'siva': '#37313F',
            'zelena': '#95F000', // zelena za prilive
            'crvena': '#F94848', // crvena za odlive
        }
    },

    plugins: [forms],
};
