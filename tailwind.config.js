/** @type {import('tailwindcss').Config} */
// module.exports = {
//   content: [],
//   theme: {
//     extend: {},
//   },
//   plugins: [],
// }
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: 
    {
      fontFamily:{
        'montserrat': ['Montserrat'],
        'secular one': ['Secular One']
      },
      textColor:{
        'pingki':'#E84A5F',
        'dongker':'#123C69'
      },
      backgroundColor:{
        'pingki':'#E84A5F',
        'dongker':'#123C69',
        'tipis':'#F2F6FB',
        'abu':'#F6F6F6',
        'pantone' : '#2AA64B'
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/line-clamp')
  ],
}