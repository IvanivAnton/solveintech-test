<?php

namespace App\Domain\ServiceInterfaces;

use Illuminate\Http\Client\Response;

interface QuotationsDataHelperInterface
{
    public function getQuotationsDataFromResponse(Response $response): array;
}
