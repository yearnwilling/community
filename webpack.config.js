'use strict';
const webpack = require("webpack");
const path = require("path");
const fs = require('fs');

let entryName = getEntry();
// let baseEntry = {'vendor': ['../../../public/assets/js/app.min.js', '../../../public/assets/js/bootstrap.min.js']};
// entryName = mergeMap(entryName, baseEntry);
let moduleChunk = ['app'];

module.exports = {
    context: __dirname + "/resources/assets/js",
    entry: entryName,
    output: {
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
                    options: {presets: ["es2015"]}
                }],
            },
            {
                test: /\.css$/,
                use: ["style-loader", "css-loader"],
            },
            {
                test: /\.less$/,
                use: ["style-loader", "css-loader", "less-loader"]
            }

            // Loaders for other file types can go here
        ],
        loaders: [
            {
                test: require.resolve("jquery"),
                loader: 'expose?$!expose?jQuery', // 先把jQuery对象声明成为全局变量`jQuery`，再通过管道进一步又声明成为全局变量`$`
            }
        ]
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({
            name: "commons",
            filename: "commons.js",
            minChunks: 3,
            // chunks: moduleChunk,
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            'window.$': 'jquery',
        }),
    ],
};

function getEntry() {
    let jsPath = path.resolve(__dirname, 'resources/assets/js');
    return match_file(jsPath);
}

function match_file(dirPath) {
    let publicJsPath = path.resolve(__dirname, 'resources/assets/js');
    let dirs = fs.readdirSync(dirPath);
    let matchs = [], files = {};
    dirs.forEach(function (item) {
        matchs = item.match(/(.+)\.js$/);
        if (matchs) {
            let pathname = path.relative(publicJsPath, path.resolve(dirPath,item));
            let pathKey =  pathname.replace(/.js$/,'');
            files[pathKey] = './'+ pathname;
        } else {
            if (fs.existsSync(path.resolve(dirPath, item))) {
                let out = match_file(path.resolve(dirPath, item));
                mergeMap(files,out)
            }
        }
    });
    return files;
}

function mergeMap(map1){
    for (let i=1;i<arguments.length;i++){
        let map2=arguments[i];
        for (let k in map2){
            map1[k]=map2[k]
        }
    }
    return map1
}