<?php

use App\Http\Controllers\CheckVatController;
use Illuminate\Support\Facades\Route;

Route::get("check-vat/{vat}", [CheckVatController::class, "checkVat"])->name("api.check_vat");
