/** @type {import('tailwindcss').Config} */
const colors =     require('tailwindcss/colors');

module.exports = {
    content: [
        "./resources/**/*.blade.php"
    ],
darkMode: 'class',
  theme: {
    colors: {
        'red': '#E52A30',
        'black':'#161616',
        'gray-dark': '#1f2122',
        'gray-light': '#ececec',
        'white':'#ffffff',
        gray: colors.gray,
        slate: colors.slate,
        green: colors.emerald,
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
