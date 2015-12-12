<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace travelpledge;

use travelpledge\models\GolfCertificate;
/**
 * Description of TravelPledge
 *
 * @author woody
 */
class TravelPledge {
    
    const PATH_GOLF_CERT = '/rest/certificates/golf';
    const PATH_VACATION_CERT = '/rest/certificates/vacation';
    
    public $apiVersion = 2;    
    public $apiKey = '';    
    public $contentType = 'application/json';    
    public $verifyPeer = 0;
    
    private $_client;
    
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
    
    public function viewVacationCertificates() {
        $certificates = [];
        $client = $this->getClient();
        
        $results = $client->listing(self::PATH_VACATION_CERT);
        if (!$results) {
            return $certificates;
        }
        
        foreach ($results as $result) {
            $certificates[] = new GolfCertificate($result);
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
