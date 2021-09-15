const colors = require('tailwindcss/colors')
module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.trueGray,
            indigo: colors.indigo,
            red: colors.rose,
            yellow: colors.amber,
            blue:colors.blue,
            green:colors.green
        }
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/custom-forms')
    ],
}
