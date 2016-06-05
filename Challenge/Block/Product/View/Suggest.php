<?php

namespace BettenReise\Challenge\Block\Product\View;

use Magento\Framework\View\Element\Template;

/**
 * Description of Suggest
 *
 * @author mubasharkk
 */
class Suggest extends Template {
  
    protected $_coreRegistry = null;
    protected $connection;
    protected $_resource;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }


  public function getSomething() {

//	$product = $this->_coreRegistry->registry('product');
//
//	print_r($product->getCategoryIds());
//
//	return $product->getSku();
	
	
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
