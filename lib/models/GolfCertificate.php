<?php

/**
 * @file
 * travelpledge\GolfCertificate class definition.
 *
 * @author Woody Whitman <woody@handbid.com>
 */

namespace travelpledge\models;

/**
 * Description of GolfCertificate
 *
 * @author woody
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

}
