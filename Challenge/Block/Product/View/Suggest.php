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

  /**
   * @var Magento\Framework\App\ObjectManager
   */
  protected $_objectManager;
  
  /**
   * @var BettenReise\Challenge\Model\DisplayRulesFactory 
   */
  protected $_modelRulesFactory;
  
  /**
   * @var \Magento\Framework\Registry
   */
  protected $_currentProduct;

  public function __construct(Context $context, array $data = []) {

	// Object Manager required to get model in the block
	$this->_objectManager = ObjectManager::getInstance();

	// Get Display-Rules Model
	$this->_modelRulesFactory = $this->_objectManager->create('BettenReise\Challenge\Model\DisplayRulesFactory');

	// Get Current Product
	$this->_currentProduct = $this->_objectManager->get('Magento\Framework\Registry')->registry('current_product');

	parent::__construct($context, $data);
  }

  /**
   * Get SKU rules from DB
   * @param string $sku
   * @return array
   */
  private function getSKURules($sku) {

	$rulesCollection = $this->_modelRulesFactory->create()->getCollection();
	$results = $rulesCollection
			// rule type 'sku'
			->addFieldToFilter('rule_type', array('eq' => 'sku'))
			// SKU id 'sku'
			->addFieldToFilter('rule_id', array('eq' => $sku))
			// rule is activated
			->addFieldToFilter('status', array('eq' => 1))
			->load();

	return $results->getData();
  }

  /**
   * Get Category rules from DB
   * @param array $categories
   * @return array
   */
  private function getCategoriesRules(array $categories) {
	$rulesCollection = $this->_modelRulesFactory->create()->getCollection();
	$results = $rulesCollection
			// rule type 'category'
			->addFieldToFilter('rule_type', array('eq' => 'category'))
			// Category ids
			->addFieldToFilter('rule_id', array('in' => $categories))
			// rule is activated
			->addFieldToFilter('status', array('eq' => 1))
			->load();

	return $results->getData();
  }

  /**
   * 
   * @return array $rules
   */
  function preRender() {

	// Get Product SKU
	$sku = $this->_currentProduct->getSku();
	// Get Product categories
	$categories = $this->_currentProduct->getCategoryIds();

	// get SKU Block rules for current product
	$sku_rules = $this->getSKURules($sku);
	// get category Block rules for current product	
	$cat_rules = $this->getCategoriesRules($categories);

	return array_merge($sku_rules, $cat_rules);
  }

  /**
   * Render rules into the block template
   */
  public function render() {

	$rules = $this->preRender();

	foreach ($rules as $rule) {
	  // if content given
	  if (!empty($rule['content'])) {
		print '<div class="challenge-rule rule-' . $rule['id'] . '">' . $rule['content'] . '</div>';
	  }

	  // if PHTML path given
	  if (!empty($rule['phtml_path'] && file_exists($this->getTemplateFile($rule['phtml_path'])))) {
		include ($this->getTemplateFile($rule['phtml_path']));
	  }
	}
  }

}
