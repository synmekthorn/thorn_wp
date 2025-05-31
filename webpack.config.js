const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');


const isProduction = process.env.NODE_ENV === 'production';

module.exports = {
  mode: isProduction ? 'production' : 'development',

  entry: {
    bundle: './assets/index.js', 
  },

  output: {
    filename: 'scripts/[name].min.js',
    path: path.resolve(__dirname, 'dist'),
    publicPath: '/dist/',
    clean: true,
  },

  module: {
    rules: [
      {
      test: /\.js$/,
      exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [
              ['@babel/preset-env', {
                useBuiltIns: 'usage',
                corejs: 3,
                modules: false, // Keeps ES6 module syntax if needed
              }]
            ],
          },
        },
      },
      {
        test: /\.(scss|css)$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: '../',
            },
          },
          'css-loader',
          'postcss-loader',
          {
            loader: 'sass-loader',
            options: {
              sassOptions: {
                includePaths: [path.resolve(__dirname, 'assets/styles')],
              },
            },
          },
        ],
      },
      {
        test: /\.(woff2?|ttf|eot|svg)$/,
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext]',
        },
      },
      {
        test: /\.(png|jpe?g|gif|webp)$/,
        type: 'asset/resource',
        generator: {
          filename: 'images/[name][ext]',
        },
      },
    ],
  },

  plugins: [

    new MiniCssExtractPlugin({
      filename: 'styles/main.min.css',
    }),

    new CopyPlugin({
      patterns: [
        {
          from: path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free/webfonts'),
          to: path.resolve(__dirname, 'dist/webfonts'),
        },
        {
          from: path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free/webfonts'),
          to: path.resolve(__dirname, 'assets/fonts'),
        },
        {
          from: path.resolve(__dirname, 'assets/images'),
          to: path.resolve(__dirname, 'dist/images'),
          noErrorOnMissing: true,
        },
      ],
    }),

    new BrowserSyncPlugin(
      {
        proxy: 'https://thorn:8890',
        files: ['dist/**/*', '**/*.php'],
        injectChanges: true,
        notify: false,
      },
      { reload: true }
    ),

    new webpack.DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify(isProduction ? 'production' : 'development'),
    }),
  ],

  resolve: {
    extensions: ['.js', '.scss'],
    alias: {
      jquery: 'jquery/src/jquery',

    },
  },

  devtool: isProduction ? false : 'source-map',

  optimization: {
    minimize: isProduction,
    minimizer: [
      new TerserPlugin({
        extractComments: true,
        terserOptions: {
          compress: {
            drop_console: true,
          },
          format: {
            comments: false,
          },
        },
      }),
      new CssMinimizerPlugin(),
    ],
  },
};