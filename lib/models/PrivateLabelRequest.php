<?php

/**
 * @file
 * travelpledge\PrivateLabelRequest class definition.
 *
 * @author Woody Whitman <woody@handbid.com>
 */

namespace travelpledge\models;

/**
 * Description of PrivateLabelRequest
 *
 * @author woody
 */
class PrivateLabelRequest extends Base {

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
