<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Requisition;
use Illuminate\Support\Facades\DB;
use App\Client;
use Carbon\Carbon;


class RequestController extends Controller
{
    public function new(Request $request) {
    	$client = DB::table('clients')->where('phone', $request->phone)->first();
        if (!$client) {
        	$client = new Client;
        	$client->name = $request->name;
        	$client->phone = $request->phone;
        	$client->save();
        }
        $request_item = new Requisition;
        $request_item->client_id = $client->id;
        $request_item->tariff_id = $request->tariff_id;
        $request_item->address = $request->address;
        $request_item->day = $request->day;
        $request_item->save();
        return $request_item;
    }

    public function list() {
    	$requests = Requisition::all();
    	foreach ($requests as $key => $request) {
    		$answer[$key]['id'] = $request->id;
    		$answer[$key]['client_name'] = $request->client->name;
    		$answer[$key]['client_phone'] = $request->client->phone;
    		$answer[$key]['tariff'] = $request->tariff->name;
    		$answer[$key]['delivery_date'] = $request->get_delivery_day()->format('d.m.y');
    		$answer[$key]['price'] = $request->tariff->price;
    		$answer[$key]['address'] = $request->address;
    	}
    	return json_encode($answer);
    }

    public function browse() {
    	return view('requests');
    }
}
