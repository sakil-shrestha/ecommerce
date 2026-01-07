<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{

    protected $fillable=[
        'user_id',
        'address_id',
        'total_amount',
        'status',
    ];

    public function order_items(): HasMany
    {
        return $this->hasMany(Order_item::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }


    /**
     * Get thn payment associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
