<?php

namespace App\Domain\UseCases;

use App\Domain\InputParams\GetQuotationsInputParams;
use App\Domain\Output\GetQuotationsOutputInterface;
use App\Domain\OutputModels\GetQuotationsResponseModel;
use App\Helpers\CbrClient;
use App\Services\XmlParser;
use Symfony\Component\HttpFoundation\Response;

class GetQuotationsUseCase
{
    private CbrClient $client;
    private GetQuotationsOutputInterface $output;
    private XmlParser $parser;

    /**
     * @param CbrClient $client
     * @param GetQuotationsOutputInterface $output
     * @param XmlParser $parser
     */
    public function __construct(CbrClient $client, GetQuotationsOutputInterface $output, XmlParser $parser)
    {
        $this->client = $client;
        $this->output = $output;
        $this->parser = $parser;
    }


    public function handle(GetQuotationsInputParams $inputParams): Response
    {
        $xmlData = $this->client->getQuotations($inputParams->getDate());
        $data = $this->parser->parse($xmlData);
        if(empty($data['Valute'])) {
            return $this->output->noData(new GetQuotationsResponseModel(null));
        }


        return $this->output->success(new GetQuotationsResponseModel($data));
    }
}
