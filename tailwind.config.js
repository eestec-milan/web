/** @type {import('tailwindcss').Config} */
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
        'gray': '#838383',
        'gray-light': '#ececec',
        'white':'#ffffff'
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
