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
        green: {
          700: '#6a8e61',
          800: '#4a6741',
        },
        yellow: {
          200: '#e0d0a8',
          300: '#d0c098',
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}