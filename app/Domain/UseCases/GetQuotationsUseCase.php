<?php

namespace App\Domain\UseCases;

use App\Domain\DTO\Input\GetQuotationsInputDTO;
use App\Domain\DTO\Output\GetQuotationsOutputDTO;
use App\Domain\Entities\ViewModelInterface;
use App\Domain\OutputInterfaces\GetQuotationsOutputInterface;
use App\Domain\ServiceInterfaces\QuotationsServiceInterface;
use App\Domain\ServiceInterfaces\XmlParserServiceInterface;

class GetQuotationsUseCase
{
    private QuotationsServiceInterface $quotationsSource;
    private GetQuotationsOutputInterface $output;

    /**
     * @param QuotationsServiceInterface $quotationsSource
     * @param GetQuotationsOutputInterface $output
     */
    public function __construct(
        QuotationsServiceInterface   $quotationsSource,
        GetQuotationsOutputInterface $output,
    )
    {
        $this->quotationsSource = $quotationsSource;
        $this->output = $output;
    }


    public function handle(GetQuotationsInputDTO $inputParams): ViewModelInterface
    {
        $quotations = $this->quotationsSource->getQuotations($inputParams->getDate());

        if($quotations->isEmpty()) {
            return $this->output->noData(new GetQuotationsOutputDTO(null));
        }

        return $this->output->success(new GetQuotationsOutputDTO($quotations->getData()));
    }
}
