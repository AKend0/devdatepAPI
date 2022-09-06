/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
        colors: {
            devdatep: {
              'azul': '#092046',
              'verde': '#acebb7',
              3: '#668e89',
              2: '#497572',
              4: '#85b4a8',
              5: '#95c2b6',
              1: '#467564',
              'gris': '#5c6c94',
              7: '#7cac94',
              6: '#74ac8c',
            },
        },
    },
  },
  plugins: [],
}
