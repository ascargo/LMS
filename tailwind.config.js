import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "media",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#143642", // deep teal (dominant)
                secondary: "#0F8B8D", // vibrant teal
                accent: "#F9DC5C", // sunshine yellow
                soft: "#537C8B", // light tone for forms and login backgrounds
            },

            fontFamily: {
                sans: ["Lato", ...defaultTheme.fontFamily.sans],
                heading: ["Raleway", "Lato", ...defaultTheme.fontFamily.sans],
            },

            borderRadius: {
                xl: "1rem",
            },

            boxShadow: {
                soft: "0 4px 10px rgba(0, 0, 0, 0.08)",
            },
        },
    },

    plugins: [forms],
};
