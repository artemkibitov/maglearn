define([
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
          ],
    function (Component, renderList) {
        'use strict';
        renderList.push({
                type: 'custompayment',
                component: 'Mod_Payment/js/view/payment/method-renderer/custompayment'
            });
        return Component.extend({});
    });
