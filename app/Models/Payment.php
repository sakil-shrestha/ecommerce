<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
}
