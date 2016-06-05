<?php

namespace BettenReise\Challenge\Block\Product\View;

use Magento\Catalog\Block\Product\AbstractProduct;

/**
 * Description of Suggest
 *
 * @author mubasharkk
 */


class Suggest extends AbstractProduct {

  public function getSomething() {

	$product = $this->getProduct();
	
	print_r ($product->getCategoryIds());
	
	return $product->getSku();
  }

}
