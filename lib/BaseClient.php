<?php
/**
 * @file
 * travelpledge\Exception class definition.
 * @author Woody Whitman <woody@handbid.com>
 */

namespace travelpledge;

/**
 * Description of Client
 *
 * @author woody
 */
abstract class BaseClient {
    const METHOD_VIEW = 'GET';
    const METHOD_CREATE = 'POST';
    const METHOD_UPDATE = 'PUT';
    
    const PROTOCOL_UNSECURE = 'http';
    const PROTOCOL_SECURE = 'http';
    const PROTOCOL_UNSECURE_PORT = 80;
    const PROTOCOL_SECURE_PORT = 443;
    
    public $apiVersion = 3;    
    public $apiKey = '';    
    public $contentType = 'application/json';    
    public $verifyPeer = 0;
    public $isProduction = 0;
    
    /**
     * Constructor.
     * Initializes the object with the given configuration `$aConfig`.
     * @param array $aConfig name-value pairs that will be used to initialize the object properties
     */
    public function __construct($aConfig) {
        
        $this->apiVersion = !empty($aConfig['apiVersion']) ?
            $aConfig['apiVersion'] :
            $this->apiVersion;
        
        $this->apiKey = !empty($aConfig['apiKey']) ?
            $aConfig['apiKey'] :
            $this->apiKey;
        
        $this->contentType = !empty($aConfig['contentType']) ?
            $aConfig['contentType'] :
            $this->contentType;
        
        $this->verifyPeer = !empty($aConfig['verifyPeer']) ?
            $aConfig['verifyPeer'] :
            $this->verifyPeer;
    }
}
