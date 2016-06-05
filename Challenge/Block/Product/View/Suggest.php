<?php

namespace BettenReise\Challenge\Block\Product\View;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\App\ObjectManager;
use \Magento\Backend\Block\Template\Context;

use BettenReise\Challenge\Model\DisplayRulesFactory;

/**
 * Description of Suggest
 *
 * @author mubasharkk
 */
class Suggest extends Template {

  protected $_objectManager;
  protected $_modelRulesFactory;
  protected $_collectionFactory;
  protected $_currentProduct;

  public function __construct(Context $context, array $data = []) {

	$this->_objectManager = ObjectManager::getInstance();

	$this->_modelRulesFactory = $this->_objectManager->create('BettenReise\Challenge\Model\DisplayRulesFactory');
	
	$this->_currentProduct = $this->_objectManager->get('Magento\Framework\Registry')->registry('current_product');

	parent::__construct($context, $data);
  }

  private function getSKURules($sku) {
	
	$rulesCollection = $this->_modelRulesFactory->create()->getCollection();
	$results = $rulesCollection
			->addFieldToFilter('rule_type', array('eq' => 'sku'))
			->addFieldToFilter('rule_id', array('eq' => $sku))
			->addFieldToFilter('status', array('eq' => 1))
			->load();
	
	return $results->getData();
  }

  private function getCategoriesRules(array $categories){
	$rulesCollection = $this->_modelRulesFactory->create()->getCollection();
	$results = $rulesCollection
			->addFieldToFilter('rule_type', array('eq' => 'category'))
			->addFieldToFilter('rule_id', array('in' => $categories))
			->addFieldToFilter('status', array('eq' => 1))
			->load();
	
	return $results->getData();

  }
  
  function preRender(){
	
	$sku = $this->_currentProduct->getSku();
	
	$categories = $this->_currentProduct->getCategoryIds();

	$sku_rules = $this->getSKURules($sku);
	$cat_rules = $this->getCategoriesRules($categories);
	
	return array_merge($sku_rules, $cat_rules);
	
  }

  public function render() {

	$rules = $this->preRender();

	foreach($rules as $rule){
	  if(!empty($rule['content'])){
		print '<div class="challenge-rule rule-'.$rule['id'].'">'.$rule['content'].'</div>';
	  }
	  
	  if(!empty($rule['phtml_path'] && file_exists($this->getTemplateFile($rule['phtml_path']))) ){
		include ($this->getTemplateFile($rule['phtml_path']));		
	  }
	  
	}
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
