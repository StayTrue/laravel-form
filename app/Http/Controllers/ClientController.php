<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function new() {
        $client = new Client();
        if (DB::table('clients')->where('phone', $client->phone)->first()) {
            
        }
    }
}
