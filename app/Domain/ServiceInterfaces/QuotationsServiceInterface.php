<?php

namespace App\Domain\ServiceInterfaces;

use App\Domain\Entities\QuotationEntityInterface;

interface QuotationsServiceInterface
{
    public function getQuotations(string $date): QuotationEntityInterface;
}
