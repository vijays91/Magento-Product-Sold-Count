<?php
class Learn_Productsold_Block_Adminhtml_Productsold extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function __construct()
    {
        $this->_controller = 'adminhtml_productsold';
        $this->_blockGroup = 'productsold';
        $this->_headerText = Mage::helper('productsold')->__('Product Sold Reports');
        parent::__construct();
		$this->_removeButton('add');
    }
}