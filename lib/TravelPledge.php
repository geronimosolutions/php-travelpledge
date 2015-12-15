<?php

/**
 * @link http://www.handbid.com/
 * @license GNU GENERAL PUBLIC LICENSE VERSION 2
 */

namespace travelpledge;

use travelpledge\models\GolfCertificate;
use travelpledge\models\VacationCertificate;
use travelpledge\models\PrivateLabel;
use travelpledge\models\PrivateLabelRequest;
use travelpledge\models\PrivateLabelStatus;

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
    
    /**
     *
     * @var Client
     */
    private $_client;
    
    /**
     * 
     * @return GolfCertificate[]
     */
    public function viewGolfCertificates() {
        $oCertificates = [];
        $oClient = $this->getClient();
        
        $aResults = $oClient->listing(self::PATH_GOLF_CERT);
        if (!$aResults) {
            return $oCertificates;
        }
        
        foreach ($aResults as $aResult) {
            $oCertificates[] = new GolfCertificate($aResult);
        }
        
        return $oCertificates;
    }
    
    /**
     * 
     * @return VacationCertificate[]
     */
    public function viewVacationCertificates() {
        $oCertificates = [];
        $oClient = $this->getClient();
        
        $aResults = $oClient->listing(self::PATH_VACATION_CERT);
        if (!$aResults) {
            return $oCertificates;
        }
        
        foreach ($aResults as $aResult) {
            $oCertificates[] = new VacationCertificate($aResult);
        }
        
        return $oCertificates;
    }
    
    public function createPrivateLabel($aConfig) {
        $oPrivateLabelRequest = new PrivateLabelRequest($aConfig);
        $oClient = $this->getClient();
        
        $aResults = $oClient->create(self::PATH_LABEL_REQUEST,$oPrivateLabelRequest->getAttributes());
        if (!$aResults) {
            /** @todo logging */
            return null;
        }
        return new PrivateLabel($aResults);
    }
    
    public function checkPrivateLabelStatus() {
        
    }
    
    public function viewPrivateLabelsList() {
        
    }
    
    public function viewPrivateLabel($sPrivateLabelId) {
        $oClient = $this->getClient();
        $aResults = $oClient->view(self::PATH_LABEL_VIEW,$oPrivateLabelRequest->getAttributes());
    }
    
    /**
     * 
     * @return Client
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
