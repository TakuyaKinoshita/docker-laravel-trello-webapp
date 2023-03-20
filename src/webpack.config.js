// webpack.config.js
const { VueLoaderPlugin } = require('vue-loader')
const path = require('path');

module.exports = {
  module: {
    rules: [
      // ...
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      }
    ]
  },
  plugins: [
    // ...
    new VueLoaderPlugin()
  ]
}