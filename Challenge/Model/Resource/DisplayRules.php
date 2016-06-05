<?php

namespace BettenReise\Challenge\Model\Resource;

use Magento\Framework\Model\Resource\Db\AbstractDb;

/**
 * Description of DisplayRules
 *
 * @author mubasharkk
 */
class DisplayRules extends AbstractDb {

  /**
     * Define main table
     */
  protected function _construct() {
	
	$this->_init('bettenreise_challenge', 'id');
  }

}
