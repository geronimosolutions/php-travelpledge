<?php
/**
 * @file
 * Yii2TravelPledgeService class definition.
 *
 * @author Woody Whitman <woody@handbid.com>
 */

namespace Yii2TravelPledgeService;

use yii\base\Component;
use travelpledge\TravelPledge;

/**
 * Description of HbTransactionService
 * @example 
 * Configuration Example for your Yii2 Application
            'travelpledge' => [
            'class' => 'YOUR\PATH\TO\HbTravelPledgeService',
            'apiVersion' => 3,
            'testMode' => true,
            'liveApiKey' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            'testApiKey' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'
        ],
 * @author woody
 */
class Yii2TravelPledgeService extends Component
{    
    /**
     * TravelPledge API Version
     * @var string 
     */
    public $apiVersion = 3;
    
    /**
     * Private TravelPledge testing key
     * @var string 
     */
    public $testApiKey;
    
    /**
     * Private TravelPledge Live Api Key
     * @var string 
     */
    public $liveApiKey;
    
    /**
     * Whether to force test mode
     * @var string 
     */
    public $testMode;

    /**
     * Private Stripe client container
     * @var \travelpledge\TravelPledge;
     */
    protected $_client;

    /**
     * ACTIVE TravelPledge Account api key
     * @var string
     */
    protected $_apiKey;

    /**
     * Customize any initialization of values here for your integration
     */
    public function init()
    {
        parent::init();        
    }

    /**
     * Magic Getter for the apiKey attribute
     * Returns proper key based upon production mode
     * @return string
     */
    public function getApiKey()
    {
        if (!empty($this->_apiKey)) {
            return $this->_apiKey;
        }
        
        $this->_apiKey = $this->getIsLive() ?
                $this->liveApiKey :
                $this->testApiKey;
            
        return $this->_apiKey;
    }

    /**
     * Magic Getter for the client attribute
     * @example Acccessed like
     * Yii::$app->travelpledge->client
     * @return \travelpledge\TravelPledge
     */
    public function getClient()
    {
        if (!empty($this->_client)) {
            return $this->_client;
        }
        
        $this->_client = new TravelPledge([
            'apiVersion' => $this->apiVersion,
            'testMode' => (int)$this->testMode,
            'apiKey' => $this->apiKey
        ]);
        
        return $this->_client;
    }
    
    /**
     * Production Mode
     * @return boolean
     */
    public function getIsLive()
    {
        return !$this->testMode;
    }
}
