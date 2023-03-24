/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        primary: '#5b21b6',
        doujinshi: '#CE0370',
        manhwa: '#1303CE',
        hot: '#EB2308',
        bgDark: '#0B0A0A',
        twitter: '#00acee',
        facebook: '#3b5998',
        telegram: '#0088cc',
        whatsapp: '#25D366',
        dashboard: '#eee',
        dashform: '#F9F9F9',
        secondary: '#C103E0'
      },
    },
  },
  plugins: [],
}
