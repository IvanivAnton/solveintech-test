<?php

namespace App\Domain\InputParams;

class GetQuotationsInputParams
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
