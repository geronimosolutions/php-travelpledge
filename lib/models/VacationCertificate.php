<?php

/**
 * @file
 * travelpledge\VacationCertificate class definition.
 *
 * @author Woody Whitman <woody@handbid.com>
 */

namespace travelpledge\models;

/**
 * Description of VacationCertificate
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
