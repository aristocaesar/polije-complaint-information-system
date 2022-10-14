/** @type {import('tailwindcss').Config} */

const BaseUrl = "http://localhost/polije-complaint-information-system/";

module.exports = {
  content: ["./app/**/*.{html,js,php}"],
  theme: {
    container: {
      center : true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    extend: {
      backgroundImage : {
          "polije" : `url('${BaseUrl}/public/images/politeknik-negeri-jember.png')`
      },
      colors: {
        blue: {
          50: "#f1f8fe",
          100: "#e2f1fc",
          200: "#bfe2f8",
          300: "#86caf3",
          400: "#46afea",
          500: "#1d95da",
          600: "#1077b9",
          700: "#0e5f96",
          800: "#0f4c75",
          900: "#134467",
        },
      },
    },
  },
  plugins: [],
};
