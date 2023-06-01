import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
                body: ['Avenir',
                "Helvetica Neue",
                'Helvetica',
                'Arial',
                'Hiragino Sans',
                'ヒラギノ角ゴシック',
                'メイリオ',
                'Meiryo',
                'YuGothic',
                "Yu Gothic",
                "ＭＳ Ｐゴシック",
                "MS PGothic",
                'sans-serif',
                ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
