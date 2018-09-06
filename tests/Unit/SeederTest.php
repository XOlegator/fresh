<?php

namespace Tests\Unit;

use Tests\TestCase;

class SeederTest extends TestCase
{
    /**
     * A test if the ecom_ref_currency exist and has row with ccy = "RUB".
     *
     * @return void
     */
    public function testEcomRefCurrencyTable()
    {
        factory(\Fresh\EcomRefCurrency::class)->make();
        $this->assertDatabaseHas('ecom_ref_currency', ['ccy' => 'RUB']);
    }
}
