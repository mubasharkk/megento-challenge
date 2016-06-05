<?php

namespace BettenReise\Challenge\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Description of DisplayRules
 *
 * @author mubasharkk
 */
class DisplayRules extends AbstractModel {

  /**
     * Define resource model
     */
  protected function _construct() {
	
	$this->_init('BettenReise\Challenge\Model\Resource\DisplayRules');
  }

}
