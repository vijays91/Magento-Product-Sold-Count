<?php
class Learn_Productsold_Block_Adminhtml_Catalog_Product_Tab extends Mage_Adminhtml_Block_Template implements Mage_Adminhtml_Block_Widget_Tab_Interface 
{ 
    public function _construct() {
        parent::_construct();         
        $this->setTemplate('learn/productsold/tab.phtml');
    }
     
    public function getTabLabel() {
        return $this->__('Product Sold');
    }
     
    public function getTabTitle() {
        return $this->__('Product Sold');
    }
     
    public function canShowTab() {
        return true;
    }
     
    public function isHidden() {
        return false;
    }
    
    public function online_sales($product_id) {
        return Learn_Productsold_Model_Productsold::getOnlineSales($product_id);
    }
    
    public function getInfo() {
        return Mage::registry('product');
    }
}
