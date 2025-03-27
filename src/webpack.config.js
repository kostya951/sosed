const path = require('path');
const { VueLoaderPlugin } = require('vue-loader')

module.exports = {
    mode: 'development',
    entry: './resources/js/app.js',
    output: {
        path: path.resolve(__dirname, './public/js'),
        filename: 'bundle.js'
    },
    module: {
        rules: [
            { test: /\.vue$/, loader: 'vue-loader' },
            { test: /\.css$/, use: ['vue-style-loader', 'css-loader']},
        ]
    },
    plugins: [
        new VueLoaderPlugin(),
    ]
};

