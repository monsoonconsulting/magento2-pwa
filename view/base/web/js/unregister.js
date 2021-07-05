/*
 * Copyright © Monsoon Consulting. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
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
