

define([
    'Magento_Checkout/js/model/quote',
    "Magento_Checkout/js/view/payment/default"
    ], function (quote, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Mod_Payment/payment/custompayment'
        },
        shippingCarrierCheck: function () {

                return quote.shippingMethod().carrier_code === 'novaposhta';
        }
    })

    }
)
