<?php

use App\Models\State;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        State::query()->insert([
            ["prefix" => "AT", "name" => "Austria"],
            ["prefix" => "BE", "name" => "Belgium"],
            ["prefix" => "BG", "name" => "Bulgaria"],
            ["prefix" => "CY", "name" => "Cyprus"],
            ["prefix" => "CZ", "name" => "Czech Republic"],
            ["prefix" => "DE", "name" => "Germany"],
            ["prefix" => "DK", "name" => "Denmark"],
            ["prefix" => "EE", "name" => "Estonia"],
            ["prefix" => "EL", "name" => "Greece"],
            ["prefix" => "ES", "name" => "Spain"],
            ["prefix" => "FI", "name" => "Finland"],
            ["prefix" => "FR", "name" => "France"],
            ["prefix" => "HR", "name" => "Croatia"],
            ["prefix" => "HU", "name" => "Hungary"],
            ["prefix" => "IE", "name" => "Ireland"],
            ["prefix" => "IT", "name" => "Italy"],
            ["prefix" => "LT", "name" => "Lithuania"],
            ["prefix" => "LU", "name" => "Luxembourg"],
            ["prefix" => "LV", "name" => "Latvia"],
            ["prefix" => "MT", "name" => "Malta"],
            ["prefix" => "NL", "name" => "The Netherlands"],
            ["prefix" => "PL", "name" => "Poland"],
            ["prefix" => "PT", "name" => "Portugal"],
            ["prefix" => "RO", "name" => "Romania"],
            ["prefix" => "SE", "name" => "Sweden"],
            ["prefix" => "SI", "name" => "Slovenia"],
            ["prefix" => "SK", "name" => "Slovakia"],
            ["prefix" => "XI", "name" => "Northern Ireland"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        State::query()->truncate();
    }
};
