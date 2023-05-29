<?php

namespace App\Connectors\Twitch;

use Illuminate\Support\Str;

class RawCommandTransformer
{
    public function transform(string $message): array
    {
        $result = [];
        $rawData = str_getcsv($message, ';');

        if (empty($rawData)) {
            return [];
        }

        foreach ($rawData as $data) {
            if (!str_contains($data, '=')) {
                continue;
            }

            [$key, $value] = explode('=', $data);

            if (Str::contains($value, ',')) {
                $listValues = explode(',', $value);
                $result[$key] = $listValues;
                continue;
            }

            $result[$key] = $value;
        }


        return $result;
    }
}
