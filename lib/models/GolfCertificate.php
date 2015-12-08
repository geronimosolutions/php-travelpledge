<?php

/**
 * @file
 * travelpledge\Exception class definition.
 *
 * @author (C) 2015 Woody Whitman (woody@handbid.com)
 */

namespace travelpledge\models;

/**
 * Description of Certificate
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
