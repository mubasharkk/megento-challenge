<?php

namespace BettenReise\Challenge\Model\Resource\DisplayRules;

use Magento\Framework\Model\Resource\Db\Collection\AbstractCollection;

/**
 * Description of Collection
 *
 * @author mubasharkk
 */
class Collection extends AbstractCollection {

  /**
   * Define model & resource model
   */
  protected function _construct() {
	$this->_init(
			'BettenReise\Challenge\Model\DisplayRules', 'BettenReise\Challenge\Model\Resource\DisplayRules'
	);
  }

}
