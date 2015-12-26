<?php
class Learn_Productsold_Block_Productsold extends Mage_Core_Block_Template {

    public function getProductId() {
        return Mage::registry('current_product')->getId();
    }
    
    public function getProductInfo($proId) {
        return Mage::getModel('catalog/product')->load($proId);
    }
    
    public function getOnlineSale($proId) {
        return Learn_Productsold_Model_Productsold::getOnlineSales($proId);
    }
    
}