const colors = require('tailwindcss/colors')

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        blueGray: colors.blueGray,
        teal: colors.teal,
        fuchsia: colors.fuchsia,
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
