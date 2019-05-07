'use strict';

const environment = (process.env.NODE_ENV || 'development').trim();

if (environment === 'development') {
    module.exports = require('./config/webpack.agreement.config.dev');
} else {
    module.exports = require('./config/webpack.agreement.config.prod');
}
