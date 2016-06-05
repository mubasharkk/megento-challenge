<?php

namespace BettenReise\Challenge\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

use BettenReise\Challenge\Model\DisplayRulesFactory;
 
class Index extends Action
{
        /**
         * @var \Magento\Framework\View\Result\PageFactory
         */
        protected $modelRulesFactory;

        /**
         * @param \Magento\Framework\App\Action\Context $context
         * @param BettenReise\Challenge\Model\DisplayRulesFactor $modelRulesFactory
         */
        public function __construct(
            Context $context,
            DisplayRulesFactory $modelRulesFactory
        )
        {
            $this->modelRulesFactory = $modelRulesFactory;
            parent::__construct($context);
        }
    /**
     * Default customer account page
     *
     * @return void
     */
    public function execute()
    {
//	  $rulesModel = $this->modelRulesFactory->create();
//	  $item = $rulesModel->load(1);
//        var_dump($item->getData());
//	  return $this->resultPageFactory->create();
    }
}