<?php

namespace App\Repositories;

use App\Dto\RepositoryVatDto;
use App\Dto\VatDto;

interface VatRepositoryContract
{
    public function getVatData(VatDto $vat): RepositoryVatDto;

    public function storeVatData(RepositoryVatDto $repositoryVat);
}
