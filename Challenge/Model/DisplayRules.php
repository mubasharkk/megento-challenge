<?php

namespace BettenReise\Challenge;

use Magento\Framework\Model\AbstractModel;

/**
 * Description of DisplayRules
 *
 * @author mubasharkk
 */
class DisplayRules extends AbstractModel {

  protected function _construct() {
	
	$this->_init('BettenReise\Challenge\Model\Resource\DisplayRules');
  }

}
