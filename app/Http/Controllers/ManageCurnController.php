<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageCurnController extends Controller
{
    function getValCurn ($code) {
        //http://127.0.0.1:8000/api/v1/currencies/ILS

        $cont = json_decode(file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q=USD_".$code."&compact=y"),true);
        if ($cont){
            $fin = '{"'.$code.'":{'.$cont['USD_'.$code]['val'].'}';
            return $cont;
        }
        //$fin = '{"'.$code.'":{'.$cont['USD_'.$code]['val'].'}';
        return 'the '.$code.' not faund';
        //return $cont ;
    }
}
