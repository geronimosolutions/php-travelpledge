<?php

namespace travelpledge\models;

use travelpledge\Exception;

/**
 * @project php-travelpledge
 * @class travelpledge\models\VacationCertificate
 *
 * @author Woody Whitman <woody@handbid.com>
 * 
 * @property integer $Id
 * @property string $VideoLink
 * @property string $NumberOfNights
 * @property string $ImageUrl
 * @property string $NumberOfBedrooms
 * @property string $MaximumOccupancy
 * @property string $ValidityDetails
 * @property string $RetailValue
 * @property string $Status
 * @property string $ClaimedDate
 * @property string $PurchasedDate
 * @property string $MinimumBid
 * @property string $CertificateNumberText
 * @property string $Description
 * @property string $RedemptionInstructions
 * @property string $Restrictions
 * @property string $MarketingHeadline
 * @property string $Provider
 * @property string $City
 * @property boolean $StateOrProvince
 * @property string $Country
 */
class VacationCertificate extends Certificate {
    
    public $categoryType = 'vacation';
    
    public $normailizeMap = [
        'id' => 'Id',
        'details' => 'ValidityDetails',
        'description' => 'Description',
        'image' => 'ImageUrl',
        'name' => 'MarketingHeadline',
    ];

    public $attributes = [
        "VideoLink",
        "NumberOfNights",
        "ImageUrl",
        "NumberOfBedrooms",
        "MaximumOccupancy",
        "Id",
        "ValidityDetails",
        "RetailValue",
        "Status",
        "ClaimedDate",
        "PurchasedDate",
        "MinimumBid",
        "CertificateNumberText",
        "Description",
        "RedemptionInstructions",
        "Restrictions",
        "MarketingHeadline",
        "Provider",
        "City",
        "StateOrProvince",
        "Country"
    ];
    
    public static $uniqueAttribute = 'NumberOfBedrooms';
}
