<?php

namespace BettenReise\Challenge\Block\Product\View;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\App\ObjectManager;
use \Magento\Backend\Block\Template\Context;

/**
 * Description of Suggest
 *
 * @author mubasharkk
 */
class Suggest extends Template {
  
    protected $_coreRegistry = null;
    protected $connection;
    protected $_resource;
	
	protected $_objectManager;

    public function __construct(Context $context, array $data = []) {
	  
	  $this->_objectManager = ObjectManager::getInstance();	  
	  parent::__construct($context, $data);
	  	  
    }


  public function getSomething() {

	$product = $this->_objectManager->get('Magento\Framework\Registry')->registry('current_product');

	$data['name'] = $product->getName();
	$data['categories'] = $product->getCategoryIds();
	$data['sku'] = $product->getSku();
	

	print_r($data);
	
	
  }

}

//
//class Suggest extends AbstractProduct {
//
//  protected $_resource;
//  protected $_connection;
//
//  function __construct(\Magento\Catalog\Block\Product\Context $context, array $data = array()) { 
//	
//	parent::__construct($context, $data);
//  }
//  
//  
//  private function getSKURules($sku){
//	
//	$select = $connection->select()
//	 ->from(
//		 ['o' => $this->getTable('sales_order_item')],
//		 ['o.product_type', new \Zend_Db_Expr('COUNT(*)')]
//	 )
//	 ->where('o.order_id=?', $orderId)
//	 ->where('o.product_id IS NOT NULL')
//	 ->group('o.product_type');	
//	
//	
//  }
//  
//  private function getCategoriesRules(array $categories){
//	$select = $connection->select()
//	 ->from(
//		 ['o' => $this->getTable('sales_order_item')],
//		 ['o.product_type', new \Zend_Db_Expr('COUNT(*)')]
//	 )
//	 ->where('o.order_id=?', $orderId)
//	 ->where('o.product_id IS NOT NULL')
//	 ->group('o.product_type');	
//  }
//  
//  public function getSomething() {
//
//	$product = $this->getProduct();
//
//	print_r($product->getCategoryIds());
//
//	return $product->getSku();
//  }
//
//}
