<?php declare(strict_types=1);

namespace App\Dto;

class VatDto
{
    private string $statePrefix;
    private string $vatNumber;

    public function __construct(string $vat)
    {
        $vatUpperCase = mb_strtoupper($vat);
        $this->statePrefix = substr($vatUpperCase, 0, 2);
        $this->vatNumber = substr($vatUpperCase, 2);
    }

    public function statePrefix(): string
    {
        return $this->statePrefix;
    }

    public function vatNumber(): string
    {
        return $this->vatNumber;
    }
}
