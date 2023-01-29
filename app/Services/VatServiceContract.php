<?php declare(strict_types=1);

namespace App\Services;

use App\Dto\VatDto;

interface VatServiceContract
{
    public function validate(VatDto $vat): bool;
}
