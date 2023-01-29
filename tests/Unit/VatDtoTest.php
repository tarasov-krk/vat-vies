<?php

namespace Tests\Unit;

use App\Dto\VatDto;
use PHPUnit\Framework\TestCase;

class VatDtoTest extends TestCase
{
    public function test_check_vat_dto_fields()
    {
        $vatDto = new VatDto('ro123456789aa');
        $this->assertSame($vatDto->statePrefix(), "RO");
        $this->assertSame($vatDto->vatNumber(), "123456789AA");
    }
}
