/** @type {import('tailwindcss').Config} */
const colors =     require('tailwindcss/colors');

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js"
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
      },
  },
  plugins: [
      require('@tailwindcss/typography'),
      require('@tailwindcss/forms')
  ],
}
