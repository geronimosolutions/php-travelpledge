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
class VacationCertificate extends Certificate {

    public $attributes = [
        "VideoLink",
        "NumberOfNights",
        "ImageUrl",
        "NumberOfBedrooms",
        "MaximumOccupancy",
        "Id",
        "ValidityDetails",
        "RetailValue",
        "Status",
        "ClaimedDate",
        "PurchasedDate",
        "MinimumBid",
        "CertificateNumberText",
        "Description",
        "RedemptionInstructions",
        "Restrictions",
        "MarketingHeadline",
        "Provider",
        "City",
        "StateOrProvince",
        "Country"
    ];

}
