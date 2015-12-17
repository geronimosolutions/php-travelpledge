<?php

namespace travelpledge\models;

use travelpledge\Exception;

/**
 * @project php-travelpledge
 * @class travelpledge\models\Certificate
 *
 * @author Woody Whitman <woody@handbid.com>
 * Standard Parmeters
 * @property integer $Id
 * @property string $ValidityDetails
 * @property string $Status
 * @property string $ClaimedDate
 * @property string $PurchasedDate
 * @property integer $RetailValue
 * @property integer $MinimumBid
 * @property string $CertificateNumberText
 * @property string $RedemptionInstructions
 * @property string $Restrictions
 * @property string $MarketingHeadline
 * @property string $Provider
 * @property string $City
 * @property string $StateOrProvince
 * @property string $Country
 * 
 * Magic Parameters
 * @property mixed $attributes
 * @property string $address displayable address
 * @property string $priceGroup Normailzed price grouping
 * @property string $image Normailzed Image Url
 * @property string $details Normailzed details
 * @property string $name Normailzed name
 */
class Certificate extends BaseModel {
    
    public $categoryType = '';

    public $normailizeMap = [
        'details' => 'ValidityDetails',
        'image' => 'ImageUrl',
        'name' => 'MarketingHeadline',
    ];
    protected $_address;
    protected $_image;

    /**
     * Constructor.
     * The default implementation does two things:
     *
     * - Initializes the object with the given configuration `$aConfig`.
     * - Call [[init()]].
     *
     * If this method is overridden in a child class, it is recommended that
     *
     * - the last parameter of the constructor is a configuration array, like `$aConfig` here.
     * - call the parent implementation at the end of the constructor.
     *
     * @param array $aConfig name-value pairs that will be used to initialize the object properties
     */
    public function __construct($aConfig) {
        parent::__construct($aConfig);

        $this->getImage();
    }

    public function getImage() {
        if ($this->_image) {
            return $this->_image;
        }

        $this->_image = $this->normalizeImage(__METHOD__);

        return $this->_image;
    }

    public function getAddress() {
        if ($this->_address) {
            return $this->_address;
        }

        $this->_address = sprintf(self::ADDRESS_FORMAT, $this->City, $this->StateOrProvince, $this->Country
        );

        return $this->_address;
    }

    public function getPriceGroup() {
        if ($this->MinimumBid <= 250) {
            return 'low';
        } elseif ($this->MinimumBid <= 2500) {
            return 'medium';
        }
        return 'high';
    }

    public function getName() {
        return $this->normalizeField(__METHOD__);
    }

    public function getDetails() {
        return $this->normalizeField(__METHOD__);
    }

    protected function normalizeImage($method) {
        $value = null;
        $field = strtolower(substr($method, strpos($method, '::') + 5));
        if (array_key_exists($field, $this->normailizeMap)) {
            $image_value = $this->{$this->normailizeMap[$field]};
            if (!stristr($image_value, self::REMOTE_IMAGE_HOST)) {
                $value = 'https://' . self::REMOTE_IMAGE_HOST . $image_value;
            } else {
                $value = str_replace('http://', 'https://', $image_value);
            }
            
            if (!self::remoteImageExists($value)) {
                $value = self::DEFAULT_IMAGE;
            }
        }
        return $value;
    }

    protected function normalizeField($method) {
        $field = strtolower(substr($method, strpos($method, '::') + 5));
        if (array_key_exists($field, $this->normailizeMap)) {
            return $this->{$this->normailizeMap[strtolower($field)]};
        }
        return null;
    }

}
