/*
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details
 */
define([
    'domReady!'
], function () {
    'use strict';

    return function (config) {
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/' + config.path);
        }
    };
});
