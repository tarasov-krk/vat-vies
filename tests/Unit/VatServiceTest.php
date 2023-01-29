<?php

namespace Tests\Unit;

use App\Dto\VatDto;
use App\Models\Vat;
use App\Services\VatServiceContract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class VatServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_validate_vat_service()
    {
        Http::fake();
        $vatService = app(VatServiceContract::class);

        $varDto = new VatDto('ro123456789aa');
        $result = $vatService->validate($varDto);
        $this->assertIsBool($result);
        $this->assertNotTrue($result);

        $vatModel = Vat::query()->first();

        $this->assertSame($vatModel->number, $varDto->vatNumber());
        $this->assertNotTrue($vatModel->is_valid);
    }
}
