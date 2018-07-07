<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function tariff() {
        return $this->hasOne('App\Tariff');
    }
}
