<?php

/**
 * @file
 * travelpledge\PrivateLabelStatus class definition.
 *
 * @author Woody Whitman <woody@handbid.com>
 */

namespace travelpledge\models;

/**
 * Description of PrivateLabelStatus
 *
 * @author woody
 */
class PrivateLabelStatus extends BaseModel {

    public $attributes = [
        "CharityID",
        "Ein",
        "Name",
        "RequestStatus",
        "DateRequested"
    ];

}
