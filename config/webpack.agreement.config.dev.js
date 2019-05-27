'use strict';

const webpack = require('webpack');
const merge = require('webpack-merge');
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const helpers = require('./helpers');
const commonConfig = require('./webpack.agreement.config.common');
const environment = require('./env/dev.env');
const WebpackLaravelMixManifest = require('webpack-laravel-mix-manifest');
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');

const webpackConfig = merge(commonConfig, {
    mode: 'development',
    devtool: 'cheap-module-eval-source-map',
    output: {
        path: helpers.root('public', 'hotel-agreement'),
        publicPath: '/',
        filename: 'js/[name].bundle.js',
    },
    optimization: {
        runtimeChunk: 'single',
        minimizer: [
            new OptimizeCSSAssetsPlugin({
                cssProcessorPluginOptions: {
                    preset: ['default', {discardComments: {removeAll: true}}],
                }
            }),
            new TerserPlugin()
        ],
    },
    plugins: [
        new webpack.EnvironmentPlugin(environment),
        new MiniCSSExtractPlugin({
            filename: 'css/[name].[hash].css',
            chunkFilename: 'css/[id].[hash].css'
        }),
        // new webpack.HotModuleReplacementPlugin(),
        new FriendlyErrorsPlugin(),
        new WebpackLaravelMixManifest()
    ],
    devServer: {
        compress: true,
        historyApiFallback: true,
        hot: true,
        open: true,
        overlay: true,
        port: 8000,
        stats: {
            normal: true
        }
    }
});

module.exports = webpackConfig;
