<?php

namespace travelpledge\models;

use travelpledge\Exception;

/**
 * @project php-travelpledge
 * @class travelpledge\models\PrivateLabelStatus
 *
 * @author Woody Whitman <woody@handbid.com>
 * 
 * @property UUID $CharityID
 * @property string $Ein
 * @property string $Name
 * @property string $RequestStatus
 * @property datetime $DateRequested
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
