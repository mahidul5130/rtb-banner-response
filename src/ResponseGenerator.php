<?php

namespace RTB;

class ResponseGenerator
{
    public static function generate(array $bidRequest, array $selectedCampaign): array
    {
        return [
            'id' => $bidRequest['id'],
            'seatbid' => [
                [
                    'bid' => [
                        [
                            'id' => $selectedCampaign['code'],
                            'impid' => $bidRequest['id'],
                            'price' => $selectedCampaign['price'],
                            'adid' => $selectedCampaign['creative_id'],
                            'nurl' => $selectedCampaign['url'],
                            'adm' => $selectedCampaign['image_url'],
                            'crid' => $selectedCampaign['creative_id'],
                            'w' => $bidRequest['requiredWidth'],
                            'h' => $bidRequest['requiredHeight']
                        ]
                    ]
                ]
            ],
            'cur' => 'USD'
        ];
    }
}
