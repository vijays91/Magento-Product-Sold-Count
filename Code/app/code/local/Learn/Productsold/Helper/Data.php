<?php
class Learn_Productsold_Helper_Data extends Mage_Core_Helper_Abstract {

    const XML_PATH_PRUD_SOLD_ENABLE    = 'productsold_tab/productsold_setting/productsold_active';
    const XML_PATH_PRUD_SOLD_DISPLAY   = 'productsold_tab/productsold_setting/productsold_display';
    const XML_PATH_PRUD_SOLD_MIN_COUNT = 'productsold_tab/productsold_setting/productsold_min_count';

	public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
    /*
        Check Produt Sold Enabled or Disabled
    */
	public function productsold_enable($store) {
		return $this->conf(self::XML_PATH_PRUD_SOLD_ENABLE, $store);
	}
    
    /*
        
    */    
	public function productsold_display($store) {
		return $this->conf(self::XML_PATH_PRUD_SOLD_DISPLAY, $store);
	}
    
    /*
        
    */    
	public function productsold_min_count($store) {
		return $this->conf(self::XML_PATH_PRUD_SOLD_MIN_COUNT, $store);
	}
}