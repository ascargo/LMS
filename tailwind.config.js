import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                deepteal: "#143642", // dark teal-blue for backgrounds
                teal: "#0F8B8D", // vibrant teal for buttons and highlights
                sunshine: "#F9DC5C", // warm yellow accent
            },
        },
    },

    plugins: [forms],
};
