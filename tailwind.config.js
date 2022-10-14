/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/**/*.{html,js,php}"],
  theme: {
    extend: {
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
