<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tariff;

class TariffController extends Controller
{
    public function get_delivery_days(Request $request) {
        $tariff = Tariff::findOrFail($request->id);
        $delivery_days = explode(',' , $tariff->delivery_days);
        return json_encode($delivery_days);
    }
}
