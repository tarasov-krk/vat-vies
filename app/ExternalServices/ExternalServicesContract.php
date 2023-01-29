<?php

namespace App\ExternalServices;

use App\Dto\ExternalServiceVatDto;
use App\Dto\VatDto;

interface ExternalServicesContract
{
    public function getData(VatDto $vat): ExternalServiceVatDto;
}
