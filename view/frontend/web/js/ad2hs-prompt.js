/*
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details
 */
define([
    'jquery',
    'Monsoon_Pwa/js/registration'
], function ($) {
    'use strict';

    $.widget('monsoon.ad2hsPrompt', {
        /**
         * Creates instance of widget
         */
        _create: function () {
            this._bind();
        },

        /**
         * Binds events listeners to elements
         * Logic taken from https://developer.mozilla.org/en-US/docs/Web/Progressive_web_apps/Add_to_home_screen
         */
        _bind: function () {
            var self = this,
                deferredPrompt;

            $(window).on('beforeinstallprompt', function (e) {
                e.preventDefault();

                deferredPrompt = e.originalEvent;

                self.element.show();

                return false;
            });

            this.element.on('click', function () {
                self.element.hide();

                deferredPrompt.prompt();

                deferredPrompt.userChoice.then(function () {
                    deferredPrompt = null;
                });
            });
        }
    });

    return $.monsoon.ad2hsPrompt;
});

