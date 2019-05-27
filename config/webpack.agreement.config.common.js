'use strict';

const VueLoaderPlugin = require('vue-loader/lib/plugin');
const HtmlPlugin = require('html-webpack-plugin');
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
const helpers = require('./helpers');
const path = require('path');
const isDev = process.env.NODE_ENV === 'development';

const webpackConfig = {
    entry: {
        polyfill: '@babel/polyfill',
        agreement: helpers.root('resources', 'assets', 'js', 'hotel-agreement', 'app'),
        questionnaire: helpers.root('resources', 'assets', 'js', 'hotel-agreement', 'questionnaire'),
        'agreement-style': helpers.root('resources', 'assets', 'sass', 'hotel-agreement', 'agreement.scss'),
        'questionnaire-style': helpers.root('resources', 'assets', 'sass', 'hotel-agreement', 'questionnaire.scss'),
        'print-style': helpers.root('resources', 'assets', 'sass', 'hotel-agreement', 'print.scss'),
    },
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            'jQuery': 'jquery',
            '$': 'jquery',
            'jquery': 'jquery',
            'vue$': isDev ? 'vue/dist/vue.runtime.js' : 'vue/dist/vue.runtime.min.js',
            'bootstrap-sass$': 'bootstrap-sass/assets/stylesheets/bootstrap',
            '@': helpers.root('resources', 'assets', 'js', 'hotel-agreement')
        }
    },
    module: {
        rules: [
            {
                test: require.resolve('jquery'),
                use: [
                    {
                        loader: 'expose-loader',
                        options: 'jQuery'
                    },
                    {
                        loader: 'expose-loader',
                        options: '$'
                    }
                ]
            },
            {
                test: /\.(png|woff(2)?|eot|ttf|svg)(\?[a-z0-9=\.\#]+)?$/,
                use: [
                    {
                        loader: 'url-loader',
                        options: {
                            limit: 100000
                        }
                    }
                ],
            },
            {
                test: /\.(png|jpe?g|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {},
                    },
                ],
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                include: [helpers.root('resources', 'assets', 'js', 'hotel-agreement')]
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                include: [helpers.root('resources', 'assets', 'js', 'hotel-agreement')]
            },
            {
                test: /\.css$/,
                use: [
                    isDev ? 'vue-style-loader' : MiniCSSExtractPlugin.loader,
                    {loader: 'css-loader', options: {sourceMap: isDev}},
                ]
            },
            {
                test: /\.scss$/,
                use: [
                    isDev ? 'vue-style-loader' : MiniCSSExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {sourceMap: isDev}
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: isDev,
                            includePaths: [
                                path.resolve(__dirname, '..', 'node_modules', 'bootstrap-sass', 'assets', 'stylesheets')
                            ]
                        }
                    }
                ]
            },
            {
                test: /\.sass$/,
                use: [
                    isDev ? 'vue-style-loader' : MiniCSSExtractPlugin.loader,
                    {loader: 'css-loader', options: {sourceMap: isDev}},
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: isDev,
                            includePaths: [
                                path.resolve(__dirname, '..', 'node_modules', 'bootstrap-sass', 'assets', 'stylesheets')
                            ]
                        }
                    }
                ]
            }
        ]
    },
    plugins: [
        new VueLoaderPlugin(),
        new HtmlPlugin({template: 'resources/assets/js/hotel-agreement/index.html', chunksSortMode: 'dependency'}),
        function(){
            this.plugin('done', function(stats) {
                console.log(('\n[' + new Date().toLocaleString() + ']') + ' Begin a new compilation.\n');
            });
        }
    ]
};

module.exports = webpackConfig;
