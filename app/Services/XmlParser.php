<?php

namespace App\Services;

class XmlParser
{
    public function parse(string $xml): array
    {
        $xmlObject = simplexml_load_string($xml);

        $jsonFormatData = json_encode($xmlObject);
        return json_decode($jsonFormatData, true);
    }
}
