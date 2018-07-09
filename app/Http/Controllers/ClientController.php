<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function new() {
        $client = new Client();
        if (DB::table('clients')->where('phone', $client->phone)->first()) {
            
        }
    }

    public function list() {
    	$clients = Client::all();
    	foreach ($clients as $key => $client) {
    		$answer[$key]['id'] = $client->id;
    		$answer[$key]['name'] = $client->name;
    		$answer[$key]['phone'] = $client->phone;
    		$answer[$key]['requests'] = $client->requests->count();
    	}
    	return response()->json($answer, 200);
    }

    public function browse() {
    	return view('clients');
    }
}
