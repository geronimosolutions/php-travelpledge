<?php

/**
 * @link http://www.handbid.com/
 * @license GNU GENERAL PUBLIC LICENSE VERSION 2
 */

namespace travelpledge;

use travelpledge\models\GolfCertificate;
use travelpledge\models\VacationCertificate;
/**
 * Description of TravelPledge
 *
 * @author Woody Whitman <woody@handbid.com>
 */
class TravelPledge {
    
    const PATH_GOLF_CERT = '/rest/certificates/golf';
    const PATH_VACATION_CERT = '/rest/certificates/vacation';
    const PATH_RESERVED_CERTS = '/rest/certificates/reserved';
    
    const PATH_EVENT_VIEW = '/rest/event/active';
    const PATH_LABEL_CREATE = '/rest/nonprofit';
    const PATH_LABEL_LIST = '/rest/nonprofit';
    const PATH_LABEL_VIEW = '/rest/nonprofit';
    const PATH_LABEL_REQUEST= '/rest/nonprofit/access/request';
    const PATH_LABEL_SEARCH = '/rest/nonprofit/search';
    const PATH_LABEL_STATUS= '/rest/nonprofit/access/status';
    
    public $apiVersion = 2;    
    public $apiKey = '';    
    public $contentType = 'application/json';    
    public $verifyPeer = 0;
    
    private $_client;
    
    /**
     * 
     * @return GolfCertificate[]
     */
    public function viewGolfCertificates() {
        $certificates = [];
        $client = $this->getClient();
        
        $results = $client->listing(self::PATH_GOLF_CERT);
        if (!$results) {
            return $certificates;
        }
        
        foreach ($results as $result) {
            $certificates[] = new GolfCertificate($result);
        }
        
        return $certificates;
    }
    
    /**
     * 
     * @return VacationCertificate[]
     */
    public function viewVacationCertificates() {
        $certificates = [];
        $client = $this->getClient();
        
        $results = $client->listing(self::PATH_VACATION_CERT);
        if (!$results) {
            return $certificates;
        }
        
        foreach ($results as $result) {
            $certificates[] = new VacationCertificate($result);
        }
        
        return $certificates;
    }
    
    public function createPrivateLabel() {
        
    }
    
    public function checkPrivateLabelStatus() {
        
    }
    
    public function viewPrivateLabelsList() {
        
    }
    
    public function viewPrivateLabel($privateLabelId) {
        
    }
    
    /**
     * 
     * @return travelpledge\Client
     */
    public function getClient() {
        if (empty($this->_client)) {
            $this->_client = new Client([
                'apiVersion' => $this->apiVersion,
                'apiKey' => $this->apiKey,
                'contentType' => $this->contentType,
                'verifyPeer' => $this->verifyPeer
            ]);
        }
        
        return $this->_client;
    }
}
