/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'Magento_Catalog/js/form/element/input'
], function (Component) {
    'use strict';

    return Component.extend({
        defaults: {
            elementTmpl: 'Mod_CustomPrice/form/element/input',
            isUseDefault: false,
            isUseConfig: false,
            listens: {
                'isUseConfig': 'toggleElement',
                'isUseDefault': 'toggleElement'
            }
        },

        initObservable: function () {

            return this
                ._super()
                .observe('isUseConfig');
        },
        toggleElement: function () {
            this.disabled(this.isUseDefault() || this.isUseConfig());

            if (this.source) {
                this.source.set('data.use_default.' + this.index, Number(this.isUseDefault()));
            }
        },

        /**
         * Parses options and merges the result with instance
         *
         * @returns {Object} Chainable.
         */
        initConfig: function () {
            this._super();
            return this;
        }
    });
});
