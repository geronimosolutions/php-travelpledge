<?php

namespace travelpledge\models;

use travelpledge\Exception;

/**
 * @project php-travelpledge
 * @class travelpledge\models\PrivateLabel
 *
 * @author Woody Whitman <woody@handbid.com>
 * 
 * @property string $ContactFirstName
 * @property string $ContactLastName
 * @property string $ContactEmail
 * @property string $ContactPhone
 * @property string $ContactCountry
 * @property string $ContactState
 * @property string $ContactAddress
 * @property string $ContactCity
 * @property string $ContactZip
 * @property string $ContactPassword
 * @property string $Description
 * @property string $CharityName
 * @property string $DomainName
 * @property string $AboutUsVideoUrl
 * @property string $Logo
 * @property string $Status
 * @property string $VideoUrl
 * @property string $Ein
 * @property integer $CharityID
 * @property string $IsSubNonProfit
 * @property string $ParentNonProfitName
 * @property string $WebSite
 * @property integer $PrivateLabelPartnerID
 */
class PrivateLabel extends BaseModel {

    public $attributes = [
        "ContactFirstName",
        "ContactLastName",
        "ContactEmail",
        "ContactPhone",
        "ContactCountry",
        "ContactState",
        "ContactAddress",
        "ContactCity",
        "ContactZip",
        "ContactPassword",
        "Description",
        "CharityName",
        "DomainName",
        "AboutUsVideoUrl",
        "Logo",
        "Status",
        "VideoUrl",
        "Ein",
        "CharityID",
        "IsSubNonProfit",
        "ParentNonProfitName",
        "WebSite",
        "PrivateLabelPartnerID"
    ];

}
