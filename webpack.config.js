'use strict';
const webpack = require("webpack");
const path = require("path");
const fs = require('fs');

let entryName = getEntry();
let baseEntry = {'vendor': ['../../../public/assets/js/app.min.js', '../../../public/assets/js/bootstrap.min.js']};
entryName = mergeMap(entryName, baseEntry);
let moduleChunk = ['app', 'vendor'];

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

            // Loaders for other file types can go here
        ],
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({
            name: "commons",
            filename: "commons.js",
            minChunks: 3,
            chunks: moduleChunk,
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