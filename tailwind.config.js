import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    500: '#2563eb',
                    600: '#1d4ed8',
                    700: '#1e40af',
                },
                ink: '#0f172a',
                surface: '#f8fbff',
            },
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                display: ['"Space Grotesk"', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                soft: '0 24px 80px -32px rgba(15, 23, 42, 0.24)',
            },
            backgroundImage: {
                'hero-grid':
                    'radial-gradient(circle at top left, rgba(37,99,235,0.12), transparent 36%), linear-gradient(rgba(148,163,184,0.08) 1px, transparent 1px), linear-gradient(90deg, rgba(148,163,184,0.08) 1px, transparent 1px)',
            },
            backgroundSize: {
                grid: 'auto, 42px 42px, 42px 42px',
            },
        },
    },

    plugins: [forms],
};
