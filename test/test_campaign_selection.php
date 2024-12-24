<?php

require_once __DIR__ . '/../src/Campaigns.php';
require_once __DIR__ . '/../src/CampaignSelector.php';

use RTB\Campaigns;
use RTB\CampaignSelector;

$testCriteria = [
    'width' => 320,
    'height' => 480,
    'country' => 'Bangladesh',
    'deviceType' => 'Mobile',
    'bidFloor' => 0.05
];

$campaigns = Campaigns::getAll();
$selectedCampaign = CampaignSelector::select($campaigns, $testCriteria);

if ($selectedCampaign) {
    echo "Selected Campaign: \n";
    print_r($selectedCampaign);
} else {
    echo "No suitable campaign found.\n";
}
