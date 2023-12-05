/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{php,html,js}"],
  theme: {
    extend: {
      fontFamily: {
        "poppin": ['Poppins', 'sans-serif'] ,
        "vnpro": ['Be Vietnam Pro', 'sans-serif'] ,
        "grad": ['Graduate', 'serif'] 
      }
    },
  },
  plugins: [
    require('tailwindcss-animated')
  ],
}

