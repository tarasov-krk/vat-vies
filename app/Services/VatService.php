<?php declare(strict_types=1);

namespace App\Services;

use App\Dto\RepositoryVatDto;
use App\Dto\VatDto;
use App\Exceptions\NotFoundVatException;
use App\ExternalServices\ExternalServicesContract;
use App\Repositories\VatRepositoryContract;

class VatService implements VatServiceContract
{
    public function __construct(
        protected VatRepositoryContract $vatRepository,
        protected ExternalServicesContract $externalServices
    ) {
    }

    public function validate(VatDto $vat): bool
    {
        try {
            $repositoryVatData = $this->vatRepository->getVatData($vat);

            return $repositoryVatData->isValid;
        } catch (NotFoundVatException) {
            $externalServiceData = $this->externalServices->getData($vat);

            $this->vatRepository->storeVatData(new RepositoryVatDto(
                vat: $vat,
                isValid: $externalServiceData->isValid
            ));

            return $externalServiceData->isValid;
        }
    }
}
