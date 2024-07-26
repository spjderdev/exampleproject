/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.php", "./components/**/*.php"],
  theme: {
    extend: {
      colors: {
        customBlack: "#060506",
        redCustom: "#ff4654",
        backgroundColor: "#101823",
      },
      width: {
        defaultLogo: "5rem",
      },
      fontFamily: {
        custom: ["ValorantFont", "sans-serif"],
        poppins: ["Poppins", "sans-serif"],
        big: ["TungstenFont", "san-serif"],
      },
    },
  },
  plugins: [],
};
