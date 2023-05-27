/** @type {import('tailwindcss').Config} */
const colors =     require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php"
    ],
    safelist:[
        'paginate_button',
        'current',
        'disabled',
        'odd',
        'even',
        'dataTable',
        'dataTables_filter',
        'dataTables_wrapper',
        'dataTables_paginate',
        'dataTables_info',
        'sorting_disabled',
        'bg-blue-600'
    ],
    darkMode: 'class',
    theme: {
        colors: {
            'red': '#E52A30',
            'red-light': '#E64E53',
            'black':'#161616',
            'gray-dark': '#1f2122',
            'gray-light': '#ececec',
            'white':'#ffffff',
            gray: colors.gray,
            slate: colors.slate,
            green: colors.emerald,
            blue: colors.blue,
            purple: colors.violet,
            yellow: colors.amber,
            pink: colors.fuchsia,

        },
        fontFamily: {
            sans: ['Inter', 'sans-serif']
        }
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms')
    ],
}