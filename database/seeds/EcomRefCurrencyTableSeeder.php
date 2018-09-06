<?php
/**
 * This script is setup currency codes of ISO 4217 (from https://www.iso.org/iso-4217-currency-codes.html)
 */

use Illuminate\Database\Seeder;
use Orchestra\Parser\Xml\Facade as XmlParser;

class EcomRefCurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $xml = XmlParser::load(resource_path() . '/docs/list_one.xml');
        $arTables = $xml->parse([
            'ccy_tbl' => ['uses' => 'CcyTbl.CcyNtry[CtryNm,CcyNm,Ccy,CcyNbr,CcyMnrUnts]']
        ]);
        foreach ($arTables as $arCountries) {
            foreach ($arCountries as $arCountry) {
                $id = Fresh\EcomRefCurrency::create([
                    'ctry_nm'      => $arCountry['CtryNm'],
                    'ccy_nm'       => $arCountry['CcyNm'],
                    'ccy'          => (strlen($arCountry['Ccy']) <= 3) ? $arCountry['Ccy'] : null,
                    'ccy_nbr'      => is_numeric($arCountry['CcyNbr']) ? $arCountry['CcyNbr'] : null,
                    'ccy_mnr_unts' => is_numeric($arCountry['CcyMnrUnts']) ? $arCountry['CcyMnrUnts'] : null
                ]);
                if ($id) {
                    echo 'Add row "' . $arCountry['CtryNm'] . '"' . PHP_EOL;
                }
            }
        }
    }
}
