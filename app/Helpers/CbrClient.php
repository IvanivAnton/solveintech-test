<?php

namespace App\Helpers;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class CbrClient
{
    private string $host;

    public function __construct()
    {
        $this->host = env('CBR_HOST');
    }

    public function getQuotations(string $date): string
    {
        $path = env('CBR_QUATATION_PATH');
        return Http::get($this->host.$path, [
            'date_req' => $date,
        ])->body();
    }
}
