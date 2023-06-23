/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/**/*.{php,js}",
    "./index.php"
  ],
  theme: {
    fontFamily: {
      sans: ['Rubik', 'sans-serif']
    },
    extend: {
      colors: {
        'primary': '#02aa14',
        'dark-gray': '#1a1a1d',
        'secondary': '#cceed0'
      }
    },
  },
  plugins: [],
}