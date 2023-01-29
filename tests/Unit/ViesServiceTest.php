<?php

namespace Tests\Unit;

use App\Dto\ExternalServiceVatDto;
use App\Dto\VatDto;
use App\ExternalServices\ExternalServicesContract;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViesServiceTest extends TestCase
{
    public function test_validate_vat_service()
    {
        Http::fake();
        $service = app(ExternalServicesContract::class);

        $result = $service->getData(new VatDto('ro123456789aa'));

        $this->assertInstanceOf(ExternalServiceVatDto::class, $result);
        $this->assertIsBool($result->isValid);
        $this->assertNotTrue($result->isValid);
    }
}
