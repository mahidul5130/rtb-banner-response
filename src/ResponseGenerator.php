<?php

namespace RTB;

class ResponseGenerator
{
    public static function generate(array $bidRequest, array $selectedCampaign): array
    {
        $data = [
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

        return [
            'msg'    => 'Campaign selected successfully',
            'code'   => 200,
            'status' => 'success',
            'data'   => $data
        ];
    }

    public static function generateError(string $msg, int $errorCode): array
    {
        return [
            'msg'    => $msg,
            'code'   => $errorCode,
            'status' => 'error'
        ];
    }
}
