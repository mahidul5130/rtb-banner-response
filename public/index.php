<?php

require_once __DIR__ . '/../src/Campaigns.php';
require_once __DIR__ . '/../src/BidRequest.php';
require_once __DIR__ . '/../src/CampaignSelector.php';
require_once __DIR__ . '/../src/ResponseGenerator.php';

use RTB\Campaigns;
use RTB\BidRequest;
use RTB\CampaignSelector;
use RTB\ResponseGenerator;

// Get the incoming bid request JSON
$requestBody = file_get_contents('php://input');
$bidRequest = BidRequest::parse($requestBody);

if (!$bidRequest) {
    http_response_code(400);
    echo json_encode(ResponseGenerator::generateError('Invalid bid request', 400));
    exit;
}

// Define criteria for campaign selection
$criteria = [
    'width' => $bidRequest['requiredWidth'],
    'height' => $bidRequest['requiredHeight'],
    'country' => $bidRequest['country'],
    'deviceType' => $bidRequest['deviceType'],
    'bidFloor' => $bidRequest['bidFloor']
];

// Select the best matching campaign
$campaigns = Campaigns::getAll();
$selectedCampaign = CampaignSelector::select($campaigns, $criteria);

// Generate a response
header('Content-Type: application/json');
if ($selectedCampaign) {
    echo json_encode(ResponseGenerator::generate($bidRequest, $selectedCampaign));
} else {
    echo json_encode(ResponseGenerator::generateError('No suitable campaign found', 404));
}
