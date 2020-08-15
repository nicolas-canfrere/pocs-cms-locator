const Encore = require('@symfony/webpack-encore')
if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev')
}
Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .addEntry('app', './assets/js/app.js')
  .addStyleEntry('master', './assets/scss/master.scss')
  .splitEntryChunks()
  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = 'usage'
    config.corejs = 3
  })
  .enableSassLoader()
  .enablePostCssLoader()
  .enableVueLoader()
  .addRule({
    resourceQuery: /blockType=i18n/,
    type: 'javascript/auto',
    loader: '@kazupon/vue-i18n-loader',
  })


module.exports = Encore.getWebpackConfig()
