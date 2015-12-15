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
class PrivateLabelStatus extends Base {

    public $attributes = [
        "CharityID",
        "Ein",
        "Name",
        "RequestStatus",
        "DateRequested"
    ];

}
