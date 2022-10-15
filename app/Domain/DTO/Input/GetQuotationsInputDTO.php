<?php

namespace App\Domain\DTO\Input;

class GetQuotationsInputDTO
{
    /**
     * @param string $date
     */
    public function __construct(private string $date)
    {
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

}
