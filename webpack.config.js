const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  //mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
  mode: 'development',
  entry: {
    app: './src/index.js',
    'loader-wipe': './src/js/loader-wipe.js',
    loader: './src/js/loader.js',
    loader2: './src/js/loader-alt-1.js',
    loader3: './src/js/loader-alt-2.js',
    loader4: './src/js/loader-alt-3.js',
  },
  output: {
    path: __dirname,
    filename: '[name].js'
  },
  'devtool': 'source-map',
  'module': {
    'rules': [
      {
        'test': /\.js$/,
        'exclude': /node_modules/,
        'use': {
          'loader': 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }, {
        'test': /\.scss$/,
        'exclude': /node_modules/,
        // 'include': /style\.scss$/,
        'use': [
          MiniCssExtractPlugin.loader, {
            loader: 'css-loader',
            options: {
              sourceMap: true
            }
          }, {
            loader: 'sass-loader',
            options: {
              sourceMap: true
            }
          }
        ]
      }, {
        test: /\.svg$/,
        'exclude': /node_modules/,
        use: 'file-loader'
      }, {
        test: /\.(png|jpg)$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'url-loader',
            options: {
              mimetype: 'image/png'
            }
          }
        ]
      }, {
        test: /\.(svg|woff|woff2|eot|ttf)$/,
        'include': /assets\/fonts/,
        use: 'url-loader'
      },
    ]
  },
  'plugins': [
    new MiniCssExtractPlugin({ filename: 'style.css' })
  ]
}
