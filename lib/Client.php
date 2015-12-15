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
class Client extends BaseClient {

    private $serverHost = 'api.geronimoamazon.com';    
    private $serverPort = 80;    
    private $protocol;
    
    /**
     * Constructor.
     * Initializes the object with the given configuration `$aConfig`.
     * @param array $aConfig name-value pairs that will be used to initialize the object properties
     */
    public function __construct($aConfig) {
        
        parent::__construct($aConfig);
        
        $this->protocol = $this->serverPort == self::PROTOCOL_SECURE_PORT ? 
            self::PROTOCOL_SECURE : 
            self::PROTOCOL_UNSECURE;
    }

    protected function view($sPath, $sId) {
        return $this->transact(self::METHOD_VIEW, $sPath, null, $sId);
    }

    protected function listing($sPath) {
        return $this->transact(self::METHOD_VIEW, $sPath, null);
    }

    protected function create($sPath, $aValues) {
        return $this->transact(self::METHOD_CREATE, $sPath, $aValues);
    }

    protected function update($sPath, $aValues) {
        return $this->transact(self::METHOD_UPDATE, $sPath, $aValues);
    }

    protected function transact($sType, $sPath, $aValues = null, $sId = null) {        
        $sParamPath = $sId ? $sPath . '/' . $sId : $sPath;                
        $pCh = curl_init();
        curl_setopt($pCh, CURLOPT_URL, sprintf('%s://%s%s', $this->protocol, $this->serverHost, $sParamPath ));
        curl_setopt($pCh, CURLOPT_CUSTOMREQUEST, $sType);    
        curl_setopt($pCh, CURLOPT_RETURNTRANSFER, 1);    
        curl_setopt($pCh, CURLOPT_HTTPHEADER, ["Content-Type: {$this->contentType}","X-Api-Version: {$this->apiVersion}","X-Affiliate-Key: {$this->apiKey}"]);
        if ($aValues) {         
            curl_setopt($pCh, CURLOPT_POSTFIELDS, json_encode($aValues));
        }
        if ($this->protocol===self::PROTOCOL_SECURE_PORT) {
            curl_setopt($pCh, CURLOPT_SSL_VERIFYPEER, $this->verifyPeer);
        }           
        try {
            $aReturnVal = json_decode(curl_exec($pCh));
        } catch (\Exception $oEx) {
            $aReturnVal = []; /** @todo do some logging here */
        }
        return $aReturnVal;
    }

}
