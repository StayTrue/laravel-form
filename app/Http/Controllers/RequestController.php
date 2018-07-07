<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Requisition;

class RequestController extends Controller
{
    public function new(Request $request) {
        
        $request_item = new Requisition;
    }
}
