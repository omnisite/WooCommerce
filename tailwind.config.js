const path = require('path')
const colors = require('tailwindcss/colors')

module.exports = {
    prefix: 'bk-',
    purge: {
        content: ['./resources/**/*.php', './resources/js/**/*.vue'],
        options: {
            // Whitelisting some classes to avoid purge
            safelist: [],
        },
    },
    theme: {
        extend: {
            fontFamily: {},
            colors: {
                primary: '#BFCA05',
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
