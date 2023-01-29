<?php declare(strict_types=1);

namespace App\ExternalServices;

use App\Dto\ExternalServiceVatDto;
use App\Dto\VatDto;
use Illuminate\Support\Facades\Http;

class ViesService implements ExternalServicesContract
{
    private string $serviceUrl;

    public function __construct()
    {
        $this->serviceUrl = config("vies_service.api_url");
    }

    public function getData(VatDto $vat): ExternalServiceVatDto
    {
        $response = Http::get(sprintf($this->serviceUrl, $vat->statePrefix(), $vat->vatNumber()));
        $isValid = $response->throw()->json("isValid");

        return new ExternalServiceVatDto(
            isValid: (bool)$isValid
        );
    }
}
