<?php
/**
 * @file
 * examples\simple.php example.
 *
 * @author Woody Whitman <woody@handbid.com>
 */

use travelpledge\TravelPledge;

$aConfigData = [
    'apiVersion' => 3,
    'apiKey' => 'f8baa17e-748d-43e2-a418-a311560b69d2'
];

$oTravelPledge = new TravelPledge($aConfigData);

$certificates = $oTravelPledge->viewGolfCertificates();

echo count($certificates) . "\r\n\r\n";

print_r($certificates[0]);

exit;
        