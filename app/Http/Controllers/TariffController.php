<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tariff;

class TariffController extends Controller
{
    public function list_days(Request $request) {
        $tariff = Tariff::findOrFail($request->id);
        $delivery_days = explode(',' , $tariff->delivery_days);
        foreach ($delivery_days as $key => $day) {
        	$days_array[$key]['id'] = (int)$day;
        	$days_array[$key]['weekday'] = get_weekday($day);
        }
        return response()->json($days_array, 200);
    }

    public function list() {
    	$tariffs = Tariff::all();
    	return response()->json($tariffs, 200);;
    }
}
