/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        primary:'#10b981',
        'primary-dark': '#059669',
        secondary:'#213448',
        softgreen: '#f1fcf3',
        cream:'#faf8ef'
      },
    },
  },
  plugins: [],
}