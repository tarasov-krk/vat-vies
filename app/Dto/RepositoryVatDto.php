<?php declare(strict_types=1);

namespace App\Dto;

class RepositoryVatDto
{
    public function __construct(
        readonly public VatDto $vat,
        readonly public bool $isValid
    ) {
    }
}
