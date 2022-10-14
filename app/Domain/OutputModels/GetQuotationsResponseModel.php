<?php

namespace App\Domain\OutputModels;

class GetQuotationsResponseModel
{
    /**
     * @param array|null $data
     */
    public function __construct(private ?array $data)
    {
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }


}
