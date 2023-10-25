<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'type',
        'category',
        'notes',
    ];

    protected $attributes = [
        'amount' => 0,
        'category' => 'uncategorized',
    ];
}
