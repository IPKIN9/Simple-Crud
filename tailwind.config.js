/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/**/*.vue"
  ],
  theme: {
    extend: {
      colors: {
        outline: "#F6F6F8",
        write  : "#0A0B12",
        writeSecondary: "#717077",
      },
    },
  },
  plugins: [],
}

