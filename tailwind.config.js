/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'purple': {
                    400: '#a78bfa',
                    500: '#8b5cf6',
                    600: '#7c3aed',
                    900: '#4c1d95',
                },
                'pink': {
                    300: '#f9a8d4',
                    400: '#f472b6',
                    500: '#ec4899',
                    600: '#db2777',
                    900: '#831843',
                },
                'blue': {
                    400: '#60a5fa',
                    500: '#3b82f6',
                    600: '#2563eb',
                    900: '#1e3a8a',
                },
            },
            animation: {
                'blob': 'blob 7s infinite',
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            },
            boxShadow: {
                'glow': '0 0 15px 2px rgba(139, 92, 246, 0.3)',
                'glow-pink': '0 0 15px 2px rgba(236, 72, 153, 0.3)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography')
    ],
};
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            animation: {
                'blob': 'blob 7s infinite',
                'float-blob': 'floatBlob 10s infinite',
                'pulse-blob': 'pulseBlob 8s infinite',
                'rotate-blob': 'rotateBlob 12s infinite',
                'fadeIn': 'fadeIn 1.2s ease-in-out forwards',
                'slideUp': 'slideUp 1s ease-out forwards',
                'shimmer': 'shimmer 2s linear infinite',
            },
            animationDelay: {
                '500': '500ms',
                '1000': '1000ms',
                '2000': '2000ms',
                '3000': '3000ms',
                '4000': '4000ms',
            },
            keyframes: {
                blob: {
                    '0%': {
                        transform: 'translate(0px, 0px) scale(1)',
                    },
                    '33%': {
                        transform: 'translate(30px, -50px) scale(1.1)',
                    },
                    '66%': {
                        transform: 'translate(-20px, 20px) scale(0.9)',
                    },
                    '100%': {
                        transform: 'translate(0px, 0px) scale(1)',
                    },
                },
                fadeIn: {
                    '0%': {
                        opacity: '0',
                    },
                    '100%': {
                        opacity: '1',
                    },
                },
                slideUp: {
                    '0%': {
                        transform: 'translateY(20px)',
                        opacity: '0',
                    },
                    '100%': {
                        transform: 'translateY(0)',
                        opacity: '1',
                    },
                },
                shimmer: {
                    '0%': {
                        backgroundPosition: '-200% 0',
                    },
                    '100%': {
                        backgroundPosition: '200% 0',
                    },
                },
                floatBlob: {
                    '0%': {
                        transform: 'translate(0px, 0px) scale(1) rotate(0deg)',
                        opacity: '0.7',
                    },
                    '33%': {
                        transform: 'translate(40px, -60px) scale(1.2) rotate(120deg)',
                        opacity: '0.9',
                    },
                    '66%': {
                        transform: 'translate(-30px, 30px) scale(0.8) rotate(240deg)',
                        opacity: '0.6',
                    },
                    '100%': {
                        transform: 'translate(0px, 0px) scale(1) rotate(360deg)',
                        opacity: '0.7',
                    },
                },
                pulseBlob: {
                    '0%, 100%': {
                        opacity: '0.4',
                        transform: 'scale(0.8)',
                    },
                    '50%': {
                        opacity: '0.8',
                        transform: 'scale(1.2)',
                    },
                },
                rotateBlob: {
                    '0%': {
                        transform: 'rotate(0deg) translateX(50px) rotate(0deg) scale(1)',
                    },
                    '50%': {
                        transform: 'rotate(180deg) translateX(100px) rotate(-180deg) scale(1.2)',
                    },
                    '100%': {
                        transform: 'rotate(360deg) translateX(50px) rotate(-360deg) scale(1)',
                    },
                },
            },
        },
    },
    plugins: [],
};
