<?php

namespace Tests\Unit;

use App\Dto\RepositoryVatDto;
use App\Dto\VatDto;
use App\Repositories\VatRepositoryContract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VatBdRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_validate_vat_service()
    {
        $vatDto = new VatDto('ro123456789aa');
        $repository = app(VatRepositoryContract::class);

        $repository->storeVatData(new RepositoryVatDto($vatDto, true));
        $result = $repository->getVatData($vatDto);

        $this->assertNotEmpty($result);
        $this->assertInstanceOf(RepositoryVatDto::class, $result);
        $this->assertIsBool($result->isValid);
        $this->assertTrue($result->isValid);
        $this->assertInstanceOf(VatDto::class, $result->vat);
        $this->assertSame("RO", $result->vat->statePrefix());
        $this->assertSame("123456789AA", $result->vat->vatNumber());
    }
}
