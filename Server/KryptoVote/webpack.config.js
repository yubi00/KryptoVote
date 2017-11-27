const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
var webpack = require('webpack');


module.exports = {
  entry: {
	  app: './app/javascripts/app.js',
	  app1: './app/javascripts/app1.js',
		app2 : './app/javascripts/app2.js',
    ballot : './app/javascripts/ballot.js',
    viewcandidate : './app/javascripts/viewcandidate.js',
  },
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: '[name].js'
  },
  devServer:{
	  proxy: {
		  '/*/' : '*'
	  }
  },
  plugins: [
    // Copy our app's index.html to the build folder.
    new CopyWebpackPlugin([
      { from: './app/index.html', to: "index.html" }
    ]),
	
	new HtmlWebpackPlugin({
		filename: 'index.html',
		template: './app/index.html',
		hash: true,
		chunks: ['app']
	}),
	new HtmlWebpackPlugin({
		filename: 'results.html',
		template: './app/results.html',
		hash: true,
		chunks: ['app']
	}),
  ],
  module: {
    rules: [
      {
       test: /\.css$/,
       use: [ 'style-loader', 'css-loader' ]
      }
    ],
    loaders: [
      { test: /\.json$/, use: 'json-loader' },
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        loader: 'babel-loader',
        query: {
          presets: ['es2015'],
          plugins: ['transform-runtime']
        }
      },
	  {
		  test: /\.html$/,
		  use: ['html-loader']
	  }
	  ,
		{
			test: /\.php$/,
        loaders: [
          'html-minify',
          'php-loader'
        ]
		},
	  {
		  test: /\.(png|jpg)$/,
		  use: [
				{
					loader: 'file-loader',
					options: {
						name : '[name].[ext]'
					}
				}
		  ]
	  },

    ]
  }
}
