<?php

namespace RTB;

class CampaignSelector
{
    public static function select(array $campaigns, array $criteria): ?array
    {
        $bestCampaign = null;
        $highestPrice = 0;

        foreach ($campaigns as $campaign) {
            if (
                (!empty($campaign['dimension']) && $campaign['dimension'] !== "{$criteria['width']}x{$criteria['height']}") ||
                (!empty($campaign['country']) && $campaign['country'] !== $criteria['country']) ||
                (!empty($campaign['hs_os']) && stripos($campaign['hs_os'], $criteria['deviceType']) === false) ||
                $campaign['price'] < $criteria['bidFloor']
            ) {
                continue;
            }

            if ($campaign['price'] > $highestPrice) {
                $bestCampaign = $campaign;
                $highestPrice = $campaign['price'];
            }
        }

        return $bestCampaign;
    }
}
