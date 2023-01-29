<?php

namespace App\Http\Controllers;

use App\Dto\VatDto;
use App\Http\Requests\CheckVatRequest;
use App\Services\VatServiceContract;

class CheckVatController extends Controller
{
    public function __construct(
        protected VatServiceContract $vatService
    ) {
    }

    public function checkVat(CheckVatRequest $request)
    {
        return response()->json([
            "isValid" => $this->vatService->validate(
                new VatDto($request->validated("vat"))
            ),
        ]);
    }
}
