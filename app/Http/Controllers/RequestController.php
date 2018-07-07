<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Requisition;

class RequestController extends Controller
{
    public function new(Request $request) {
        if (DB::table('clients')->where('phone', $request->phone)->first()) {

        } else {

        }
        $request_item = new Requisition;

    }
}
