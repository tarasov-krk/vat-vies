<?php declare(strict_types=1);

namespace App\Dto;

class ExternalServiceVatDto
{
    public function __construct(
        readonly public bool $isValid
    ) {
    }
}
