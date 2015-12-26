<?php
class Learn_Productsold_Block_Adminhtml_Productsold_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'productsold';
        $this->_controller = 'adminhtml_productsold';
		$this->_removeButton('delete');
		$this->_removeButton('reset');
    }
 
    public function getHeaderText()   {
        return Mage::helper('productsold/data')->__("Product Sold ");
    }
    
}