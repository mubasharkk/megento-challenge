<?php

namespace BettenReise\Challenge\Block\Product\View;

use Magento\Catalog\Block\Product\AbstractProduct;

/**
 * Description of Suggest
 *
 * @author mubasharkk
 */


class Suggest extends AbstractProduct {

  protected $_resource;
  protected $_connection;

  function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Framework\App\Resource $resource, array $data = array()) {

	$this->_resource = $resource;

	parent::__construct($context, $data);
  }
  
  function getConnection(){
	
  }

  public function getSomething() {

	$product = $this->getProduct();

	print_r($product->getCategoryIds());

	return $product->getSku();
  }

}
