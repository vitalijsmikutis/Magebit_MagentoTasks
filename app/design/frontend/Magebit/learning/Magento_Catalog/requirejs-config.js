/**
 * This file is part of the Magebit package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit PageListWidget
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2022 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

var config = {
    map: {
        '*': {
            compareList: 'Magento_Catalog/js/list',
            relatedProducts: 'Magento_Catalog/js/related-products',
            upsellProducts: 'Magento_Catalog/js/upsell-products',
            productListToolbarForm: 'Magento_Catalog/js/product/list/toolbar',
            catalogGallery: 'Magento_Catalog/js/gallery',
            catalogAddToCart: 'Magento_Catalog/js/catalog-add-to-cart',
            qtyCounter: 'Magento_Catalog/js/qty-counter'
        }
    },
    config: {
        mixins: {
            'Magento_Theme/js/view/breadcrumbs': {
                'Magento_Catalog/js/product/breadcrumbs': true
            }
        }
    }
};