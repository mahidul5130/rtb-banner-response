<?php

namespace RTB;

class BidRequest
{
    public static function parse(string $requestBody): ?array
    {
        $bidRequest = json_decode($requestBody, true);
        if (!$bidRequest || !isset($bidRequest['imp']) || empty($bidRequest['imp'])) {
            return null;
        }

        $imp = $bidRequest['imp'][0] ?? [];
        $device = $bidRequest['device'] ?? [];
        $geo = $device['geo'] ?? [];

        return [
            'id' => $bidRequest['id'] ?? '',
            'requiredWidth' => $imp['banner']['w'] ?? null,
            'requiredHeight' => $imp['banner']['h'] ?? null,
            'bidFloor' => $imp['bidfloor'] ?? 0,
            'country' => $geo['country'] ?? '',
            'deviceType' => $device['os'] ?? ''
        ];
    }
}
