<?php

/**
 * @file
 * travelpledge\Exception class definition.
 *
 * @author (C) 2015 Woody Whitman (woody@handbid.com)
 */

namespace travelpledge;

/**
 * Description of Client
 *
 * @author woody
 */
class Client {
    const METHOD_VIEW = 'GET';
    const METHOD_CREATE = 'POST';
    const METHOD_UPDATE = 'PUT';
    
    const PROTOCOL_UNSECURE = 'http';
    const PROTOCOL_SECURE = 'http';
    const PROTOCOL_UNSECURE_PORT = 80;
    const PROTOCOL_SECURE_PORT = 443;
    
    public $apiVersion = 2;    
    public $apiKey = '';    
    public $contentType = 'application/json';    
    public $verifyPeer = 0;

    private $serverHost = 'api.geronimoamazon.com';    
    private $serverPort = 80;    
    private $protocol;
    
    public function __construct($attributes) {
        
        $this->apiVersion = !empty($attributes['apiVersion']) ?
            $attributes['apiVersion'] :
            $this->apiVersion;
        
        $this->apiKey = !empty($attributes['apiKey']) ?
            $attributes['apiKey'] :
            $this->apiKey;
        
        $this->contentType = !empty($attributes['contentType']) ?
            $attributes['contentType'] :
            $this->contentType;
        
        $this->verifyPeer = !empty($attributes['verifyPeer']) ?
            $attributes['verifyPeer'] :
            $this->verifyPeer;
        
        $this->protocol = $this->serverPort == self::PROTOCOL_SECURE_PORT ? 
            self::PROTOCOL_SECURE : 
            self::PROTOCOL_UNSECURE;
    }

    protected function view($path, $id) {
        return $this->transact(self::METHOD_VIEW, $path, null, $id);
    }

    protected function listing($path) {
        return $this->transact(self::METHOD_VIEW, $path, null);
    }

    protected function create($path, $values) {
        return $this->transact(self::METHOD_CREATE, $path, $values);
    }

    protected function update($path, $values) {
        return $this->transact(self::METHOD_UPDATE, $path, $values);
    }

    protected function transact($type, $path, $values = null, $id = null) {
        
        $tp_url = sprintf('%s://%s%s', $this->protocol, $this->serverHost, $path );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tp_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        if ($values) {
            $tp_body = json_encode($values);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $tp_body);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verifyPeer);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: {$this->contentType}", 
            "X-Api-Version: {$this->apiVersion}", 
            "X-Affiliate-Key: {$this->apiKey}"
        ]);
            
        try {
            $returnVal = json_decode(curl_exec($ch));
        } catch (\Exception $ex) {
            $returnVal = null;
            /** @todo do some logging here */
        }
        return $returnVal;
    }

}
