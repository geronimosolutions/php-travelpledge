<?php

namespace travelpledge\models;

use travelpledge\Exception;

/**
 * @project php-travelpledge
 * @class travelpledge\models\PrivateLabelRequest
 *
 * @author Woody Whitman <woody@handbid.com>
 * 
 * @property string $ContactFirstName
 * @property string $ContactLastName
 * @property string $ContactEmail
 * @property string $ContactPassword
 * @property string $ContactPhone
 * @property string $ContactAddress
 * @property string $EIN
 * @property string $CharityName
 * @property string $DomainName
 * @property string $Description
 * @property boolean $IsPartOfLargerNonProfit
 * @property string $Country
 * @property string $State
 * @property string $PostalCode
 */
class PrivateLabelRequest extends BaseModel {

    public $attributes = [
        "ContactFirstName",
        "ContactLastName",
        "ContactEmail",
        "ContactPassword",
        "ContactPhone",
        "ContactAddress",
        "EIN",
        "CharityName",
        "DomainName",
        "Description",
        "IsPartOfLargerNonProfit",
        "Country",
        "State",
        "PostalCode"
    ];

}
