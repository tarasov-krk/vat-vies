<?php declare(strict_types=1);

namespace App\Repositories;

use App\Dto\RepositoryVatDto;
use App\Dto\VatDto;
use App\Exceptions\NotFoundVatException;
use App\Models\State;
use App\Models\Vat;

class VatBdRepository implements VatRepositoryContract
{
    public function __construct(
        protected Vat $vatModel,
        protected State $stateModel
    ) {
    }

    /**
     * @throws \App\Exceptions\NotFoundVatException
     */
    public function getVatData(VatDto $vat): RepositoryVatDto
    {
        $vatFromDb = $this->vatModel
            ->with("state")
            ->whereRelation("state", "prefix", $vat->statePrefix())
            ->where("number", $vat->vatNumber())
            ->first();

        if (!$vatFromDb) {
            throw new NotFoundVatException();
        }

        return new RepositoryVatDto(
            vat: $vat,
            isValid: $vatFromDb->is_valid
        );
    }

    public function storeVatData(RepositoryVatDto $repositoryVat)
    {
        $state = $this->stateModel->newQuery()
            ->where("prefix", $repositoryVat->vat->statePrefix())
            ->firstOrFail();

        $this->vatModel->newQuery()
            ->create([
                "state_id" => $state->id,
                "number"   => $repositoryVat->vat->vatNumber(),
                "is_valid" => $repositoryVat->isValid,
            ]);
    }
}
