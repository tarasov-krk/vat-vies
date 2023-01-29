<?php

namespace Tests\Unit;

use App\Dto\RepositoryVatDto;
use App\Dto\VatDto;
use PHPUnit\Framework\TestCase;

class RepositoryVatDtoTest extends TestCase
{
    public function test_check_repository_vat_dto_fields()
    {
        $vatDto = new VatDto('ro123456789aa');
        $repositoryVatDto = new RepositoryVatDto($vatDto, true);

        $this->assertIsBool($repositoryVatDto->isValid);
        $this->assertTrue($repositoryVatDto->isValid);
        $this->assertInstanceOf(VatDto::class, $repositoryVatDto->vat);
        $this->assertSame("RO", $repositoryVatDto->vat->statePrefix());
        $this->assertSame("123456789AA", $repositoryVatDto->vat->vatNumber());
    }
}
