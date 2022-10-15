<?php

namespace App\Models;

class CbrQuotation implements \App\Domain\Entities\QuotationEntityInterface
{
    private array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function isEmpty(): bool
    {
        return empty($this->data['Valute']);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
