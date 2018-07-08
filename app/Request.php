<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Request extends Model
{
    public function tariff() {
        return $this->belongsTo('App\Tariff');
    }

    public function client() {
    	return $this->belongsTo('App\Client');
    }

    public function get_delivery_day() {
    	$request_date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
    	$current_weekday = (int)($request_date->dayOfWeek)+1;
    	if ($current_weekday >= $this->day) {
    		$delivery_day = $request_date->addDays((7 - $current_weekday) + $this->day);
    	} else {
    		$delivery_day = $request_date->addDays($this->day - $current_weekday);
    	}
    	return $delivery_day;
    }

}


