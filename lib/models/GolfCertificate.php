<?php

namespace travelpledge\models;

use travelpledge\Exception;

/**
 * @project php-travelpledge
 * @class travelpledge\models\GolfCertificate
 *
 * @author Woody Whitman <woody@handbid.com>
 * 
 * @property integer $Id
 * @property string $NumberOfPlayers
 * @property string $FeeDetails
 * @property string $CourseName
 * @property string $CoursePhoto
 * @property string $Description
 * @property string $ValidWeekdays
 * @property string $IncludesRangeBalls
 * @property string $IncludesCartFee
 * @property string $ValidityDetails
 * @property string $RetailValue
 * @property string $Status
 * @property string $ClaimedDate
 * @property string $PurchasedDate
 * @property string $MinimumBid
 * @property string $CertificateNumberText
 * @property string $RedemptionInstructions
 * @property string $Restrictions
 * @property string $MarketingHeadline
 * @property string $Provider
 * @property string $City
 * @property boolean $StateOrProvince
 * @property string $Country
 */
class GolfCertificate extends Certificate {

    public $attributes = [
        "NumberOfPlayers",
        "FeeDetails",
        "CourseName",
        "CoursePhoto",
        "Description",
        "ValidWeekdays",
        "IncludesRangeBalls",
        "IncludesCartFee",
        "Id",
        "ValidityDetails",
        "RetailValue",
        "Status",
        "ClaimedDate",
        "PurchasedDate",
        "MinimumBid",
        "CertificateNumberText",
        "RedemptionInstructions",
        "Restrictions",
        "MarketingHeadline",
        "Provider",
        "City",
        "StateOrProvince",
        "Country"
    ];
    
    public function getName() {
        return $this->CourseName;
    }
    
    public function getDetails() {
        return $this->FeeDetails;
    }
    
    public function getImage() {
        return $this->CoursePhoto;
    }

}
