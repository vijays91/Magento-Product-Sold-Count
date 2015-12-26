<?php
class Learn_Productsold_Model_Productsold extends Mage_Core_Model_Abstract {

    public function getOnlineSales($id) {
		/* $id = $this->getId(); */
		$collection = Mage::getModel('sales/order')->getCollection();
		$collection->addAttributeToSelect('grand_total');
		$collection->addAttributeToFilter('main_table.status', array('eq' => Mage_Sales_Model_Order::STATE_COMPLETE));
		$collection->addAttributeToFilter('sub.product_id', array('eq' => $id ));
		$collection->getSelect()->join(array('sub' => $collection->getTable('sales/order_item')),'main_table.entity_id = sub.order_id', array('qty_canceled' =>'qty_canceled', 'qty_refunded'=>'qty_refunded', 'qty_ordered' => 'qty_ordered', 'qty_shipped' => 'qty_shipped', 'qty_invoiced' => 'qty_invoiced'));

		foreach ($collection as $item) {
			$count += $item->getQtyOrdered() - $item->getQtyCanceled() - $item->getQtyRefunded();
		}
        $count = ($count > 0) ? $count : 0;
		return $count;
	}
}