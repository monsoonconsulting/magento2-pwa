/*
 * Copyright © Monsoon Consulting. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
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
