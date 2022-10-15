<?php

namespace App\Services;

use App\Domain\ServiceInterfaces\XmlParserServiceInterface;

class XmlParserService implements XmlParserServiceInterface
{
    public function parse(string $xml): array
    {
        $xmlObject = simplexml_load_string($xml);

        $jsonFormatData = json_encode($xmlObject);
        return json_decode($jsonFormatData, true);
    }
}
