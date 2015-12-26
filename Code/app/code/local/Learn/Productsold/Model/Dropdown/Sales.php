<?php
class Learn_Productsold_Model_Dropdown_Sales extends Mage_Core_Model_Abstract
{
	public function toOptionArray()
	{
        return array(
            array('value'=>'1',   'label'=>Mage::helper('adminhtml')->__('On Site Orders')),
            array('value'=>'2',   'label'=>Mage::helper('adminhtml')->__('Off Site Orders')),
            array('value'=>'3',   'label'=>Mage::helper('adminhtml')->__('On Site + Off Site (Orders)')),
        );
	}
}