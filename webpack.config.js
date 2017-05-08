
'use strict';
const webpack = require("webpack");


module.exports = {
    context: __dirname + "/resources/assets/js",
    entry: {
        app: "./app.js",
        libs: './libs/jquery-validate.js',
        vendor: ['../../../public/assets/js/app.min.js', '../../../public/assets/js/bootstrap.min.js'],
        add: './app/community/add.js'
    },
    output:  {
        path: __dirname + "/public/js",
        publicPath: '/public/js',
        filename: "[name].js",
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                use: [{
                    loader: "babel-loader",
                    options: { presets: ["es2015"] }
                }],
            },

            // Loaders for other file types can go here
        ],
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({
            name: "commons",
            filename: "commons.js",
            minChunks: 2,
        }),
    ],
};