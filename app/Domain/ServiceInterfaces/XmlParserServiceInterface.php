<?php

namespace App\Domain\ServiceInterfaces;

interface XmlParserServiceInterface
{
    public function parse(string $xml): array;
}
