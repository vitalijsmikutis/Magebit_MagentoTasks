define([
    'ko',
    'jquery',
    'Magento_Catalog/js/price-utils',
    'mage/url',
    'Magento_Ui/js/modal/alert'
], function(ko, $, priceUtils, url, alert) {
    return function(config) {
        var viewModel = {
            qty: ko.observable(1),
            maxQty: ko.observable(config.maxQty || 1),

            increaseQty: function() {
                if (this.qty() < this.maxQty()) {
                    this.qty(this.qty() + 1);
                }
            },

            decreaseQty: function() {
                if (this.qty() > 1) {
                    this.qty(this.qty() - 1);
                }
            },


        };
        return viewModel;
    };
});