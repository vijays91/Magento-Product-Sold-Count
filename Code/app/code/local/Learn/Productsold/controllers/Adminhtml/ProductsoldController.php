<?php
class Learn_Productsold_Adminhtml_ProductsoldController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
		$this->loadLayout();
		$this->_title($this->__('Product Sold'))->_title($this->__('Product Sold'));
		$this->_setActiveMenu('productsold/items');		
		/* $this->getLayout()->getBlock('head')->setCanLoadExtJs(true); */		
		$breadcrumbTitle = Mage::helper('productsold')->__('Product Sold');
		$breadcrumbLabel = Mage::helper('productsold')->__('Product Sold');
		$this->_addBreadcrumb($breadcrumbLabel, $breadcrumbTitle);
		$this->_addContent($this->getLayout()->createBlock('productsold/adminhtml_productsold'));
		$this->renderLayout();
	}

    public function gridAction() {
        $this->loadLayout();
        $this->getResponse()->setBody(
               $this->getLayout()->createBlock('productsold/adminhtml_productsold_grid')->toHtml()
        );
    }
    
    public function editAction() {
		$productsoldId     = $this->getRequest()->getParam('id');
		$productsoldModel  = Mage::getModel('catalog/product')->load($productsoldId); 
        if ($productsoldModel->getId() && $productsoldId != 0) 
		{
            Mage::register('productsold_info', $productsoldModel); 
            $this->loadLayout();
            $this->_setActiveMenu('productsold/items');           
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Product Sold Manager'), Mage::helper('adminhtml')->__('Product Sold Manager'));            
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Product Sold Details'), Mage::helper('adminhtml')->__('Product Sold Details'));            
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
            $this->_addContent(
                $this->getLayout()->createBlock('productsold/adminhtml_productsold_edit')
            );
            $this->renderLayout();
        }
		else {
            Mage::getSingleton('adminhtml/session')->addError(
				Mage::helper('productsold')->__('Record does not exist')
			);
            $this->_redirect('*/*/');
        }
	}
    
    public function saveAction() {
        $data = $this->getRequest()->getPost();
        $sku = $data['sku'];
        $product = Mage::getModel('catalog/product')->loadByAttribute('sku', $sku);
        if ($product && $data['offline_sale'] && $data['sale_label']) {
            $product->setOfflineSale($data['offline_sale']);
            $product->setSaleLabel($data['sale_label']);
            $product->save();
            $succ_msg = Mage::helper('productsold')->__('Successfully updated the record.');
            Mage::getSingleton('adminhtml/session')->addSuccess($succ_msg);
        } else {
            $error_msg = Mage::helper('productsold')->__('Something goes wrong to save record.');
            Mage::getSingleton('adminhtml/session')->addError($error_msg);
        }
        $this->_redirect('*/*/index');
    }
}