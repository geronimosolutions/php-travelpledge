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
class TravelPledge extends BaseClient {
    
    const PATH_GOLF_CERT = '/rest/certificates/golf';
    const PATH_VACATION_CERT = '/rest/certificates/vacation';
    const PATH_RESERVED_CERTS = '/rest/certificates/reserved';
    
    const PATH_EVENT_VIEW = '/rest/event/active';
    const PATH_LABEL_CREATE = '/rest/nonprofit';
    const PATH_LABEL_LIST = '/rest/nonprofit';
    const PATH_LABEL_VIEW = '/rest/nonprofit';
    const PATH_LABEL_REQUEST = '/rest/nonprofit/access/request';
    const PATH_LABEL_SEARCH = '/rest/nonprofit/search';
    const PATH_LABEL_STATUS = '/rest/nonprofit/access/status';
    
    const STATUS_LABEL_PENDING = 'PENDING';
    const STATUS_LABEL_APPROVED = 'APPROVED';
    
    /**
     *
     * @var Client
     */
    private $_client;
    
    /**
     * Returns available Golf Certificates
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
     * Returns available Vacation Certificates
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
    
    /**
     * Crates a Private Label From a PrivateLabelRequest configuration array
     * @param string[] $aConfig Uses PrivateLabelRequest attributes
     * @see PrivateLabelRequest
     * @return PrivateLabel
     */
    public function createPrivateLabel($aConfig) {
        $oPrivateLabelRequest = new PrivateLabelRequest($aConfig);
        $oClient = $this->getClient();
        
        $aResults = $oClient->create(self::PATH_LABEL_REQUEST,$oPrivateLabelRequest->attributes);
        if (!$aResults) {
            return false;
        }
        return new PrivateLabel($aResults);
    }
    
    /**
     * Returns PrivateLabelStatus list by Status Type
     * @param string $sLabelStatusType
     * @see self::STATUS_LABEL_PENDING
     * @see self::STATUS_LABEL_APPROVED
     * @return PrivateLabelStatus[]
     */
    public function checkPrivateLabelStatus($sLabelStatusType) {
        $oPrivateLabelStatii = [];
        $oClient = $this->getClient();
        
        $aResults = $oClient->view(self::PATH_LABEL_STATUS, $sLabelStatusType);
        if (!$aResults) {
            return $oPrivateLabelStatii;
        }
        
        foreach ($aResults as $aResult) {
            $oPrivateLabelStatii[] = new PrivateLabelStatus($aResult);
        }
        
        return $oPrivateLabelStatii; 
    }
    
    /**
     * Returns PrivateLabelStatus list by Status Type
     * @param string $sLabelStatusType
     * @see STATUS_LABEL_PENDING
     * @see STATUS_LABEL_APPROVED
     * @return PrivateLabelStatus|null
     */
    public function viewPrivateLabelStatus($sPrivateLabelId) {
        
        /* @var $oPrivateLabelPending PrivateLabelStatus[] */
        $oPrivateLabelPending = $this->checkPrivateLabelStatus(self::STATUS_LABEL_PENDING);
        foreach ($oPrivateLabelPending as $oPrivateLabelStatus) {
            if ($sPrivateLabelId === $oPrivateLabelStatus->CharityID) {
                return $oPrivateLabelStatus;
            }
        }
        
        /* @var $oPrivateLabelApproved PrivateLabelStatus[] */
        $oPrivateLabelApproved = $this->checkPrivateLabelStatus(self::STATUS_LABEL_APPROVED);
        foreach ($oPrivateLabelApproved as $oPrivateLabelStatus) {
            if ($sPrivateLabelId === $oPrivateLabelStatus->CharityID) {
                return $oPrivateLabelStatus;
            }
        }
        return null;
    }
    
    /**
     * View All available Private Labels
     * @return PrivateLabel[]
     */
    public function viewPrivateLabelsList() {
        $oPrivateLabels = [];
        $oClient = $this->getClient();
        
        $aResults = $oClient->listing(self::PATH_LABEL_VIEW);
        if (!$aResults) {
            return $oPrivateLabels;
        }
        
        foreach ($aResults as $aResult) {
            $oPrivateLabels[] = new PrivateLabel($aResult);
        }
        
        return $oPrivateLabels; 
    }
        
    /**
     * View Private Label By UUID
     * @param string $sPrivateLabelId uuid
     * @return PrivateLabel|null
     */
    public function viewPrivateLabel($sPrivateLabelId) {
        $oClient = $this->getClient();
        $aResults = $oClient->view(self::PATH_LABEL_VIEW,$sPrivateLabelId);
        if (!$aResults) {
            return null;
        }
        return new PrivateLabel($aResults);        
    }
    
    /**
     * Client Container Function
     * @return Client
     */
    public function getClient() {
        if (empty($this->_client)) {
            $this->_client = new Client([
                'isProduction' => $this->isProduction,
                'apiVersion' => $this->apiVersion,
                'apiKey' => $this->apiKey,
                'contentType' => $this->contentType,
                'verifyPeer' => $this->verifyPeer
            ]);
        }
        
        return $this->_client;
    }
}
