/*
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details
 */
define([
    'underscore'
], function (_) {
    'use strict';

    return function () {
        if (navigator.serviceWorker) {
            navigator.serviceWorker.getRegistrations().then(
                function (registrations) {
                    _.each(registrations, function (registration) {
                        registration.unregister();
                    });
                }
            );
        }
    };
});
