<?php

namespace App\Domain\DTO\Output;

class GetQuotationsOutputDTO
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
