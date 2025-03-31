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
            { test: /\.vue$/, use: ['vue-loader',]},
            { test: /\.css$/, use: ['vue-style-loader', 'css-loader']},
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                use:[
                    {
                        loader : 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath:'./../img',
                        }
                    }
                ]
            },
        ]
    },
    plugins: [
        new VueLoaderPlugin(),
    ]
};

