<?php

namespace Tests\Unit;

use App\Dto\ExternalServiceVatDto;
use PHPUnit\Framework\TestCase;

class ExternalServiceVatDtoTest extends TestCase
{
    public function test_check_external_service_vat_dto_fields()
    {
        $vatDto = new ExternalServiceVatDto(true);

        $this->assertIsBool($vatDto->isValid);
        $this->assertTrue($vatDto->isValid);
    }
}
