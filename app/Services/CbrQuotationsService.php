<?php

namespace App\Services;

use App\Domain\Entities\QuotationEntityInterface;
use App\Domain\ServiceInterfaces\QuotationsServiceInterface;
use App\Domain\ServiceInterfaces\XmlParserServiceInterface;
use App\Models\CbrQuotation;
use Illuminate\Support\Facades\Http;

class CbrQuotationsService implements QuotationsServiceInterface
{
    private string $host;

    public function __construct(private XmlParserServiceInterface $parser)
    {
        $this->host = env('CBR_HOST');
    }

    public function getQuotations(string $date): QuotationEntityInterface
    {
        $path = env('CBR_QUOTATION_PATH');
        $xmlData = Http::get($this->host.$path, [
            'date_req' => $date,
        ])->body();

        return new CbrQuotation($this->parser->parse($xmlData));
    }
}
