<?php

/**
 * @file
 * travelpledge\PrivateLabel class definition.
 *
 * @author Woody Whitman <woody@handbid.com>
 */

namespace travelpledge\models;

/**
 * Description of PrivateLabel
 *
 * @author woody
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
