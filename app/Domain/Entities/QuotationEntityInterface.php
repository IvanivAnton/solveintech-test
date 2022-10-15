<?php

namespace App\Domain\Entities;

interface QuotationEntityInterface
{
    public function isEmpty(): bool;
    public function getData(): array;
}
