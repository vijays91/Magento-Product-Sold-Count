<?php
class Learn_Productsold_Block_Adminhtml_Productsold_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
    
		$viewForm = new Varien_Data_Form(
            array(
                'id'      => 'edit_form',
                'action'  => $this->getUrl('*/*/save'),
                'method'  => 'post',
                'enctype' => 'multipart/form-data',
            )
        );
		$viewForm->setUseContainer(true);		
        $this->setForm($viewForm);		
        
        $product_info =   Mage::registry('productsold_info');
        
        /* $online_sale = Mage::getModel('productsold/productsold')->getOnlineSales($product_info->getId()); */
        $online_sale = Learn_Productsold_Model_Productsold::getOnlineSales($product_info->getId());

		$fieldset = $viewForm->addFieldset('productsoldview_form', array(
            'legend'      => Mage::helper('productsold')->__('Product Sold Records'),
            'class'        => 'fieldset-wide',
            )
        );
		$fieldset->addField('product_name', 'label', array(
			'name'          =>'product_name',
			'label'         => Mage::helper('productsold')->__('Product Name'),
			'value'         => $product_info->getName(),
		));
		$fieldset->addField('product_sku', 'label', array(
			'name'          =>'product_sku',
			'label'         => Mage::helper('productsold')->__('Product SKU'),
			'value'         => $product_info->getSku(),
		));
        
		$fieldset->addField('sku', 'hidden', array(
			'name'          =>'sku',
			'label'         => Mage::helper('productsold')->__('Product SKU'),
			'value'         => $product_info->getSku(),
		));
        
		$fieldset->addField('online_sale', 'label', array(
			'name'          =>'online_sale',
			'label'         => Mage::helper('productsold')->__('Online Sale'),
			'value'         => $online_sale,
		));        
		$fieldset->addField('offline_sale', 'text', array(
			'name'          =>'offline_sale',
			'label'         => Mage::helper('productsold')->__('Offline Sale'),
			'value'         => $product_info->getOfflineSale(),
			'required'		=> true,
			'tabindex' 		=> 1,
			'class' 		=> ' validate-number',
		));
        
		$fieldset->addField('sale_label', 'text', array(
			'name'          =>'sale_label',
			'label'         => Mage::helper('productsold')->__('Sale Label'),
			'value'         => $product_info->getSaleLabel(),
			'required'		=> true,
			'tabindex' 		=> 2,
		));
        
		return parent::_prepareForm();
	}
}