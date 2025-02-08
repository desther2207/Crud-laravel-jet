<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'user_id', 'estado', 'cantidad'];


    //Relación 1:N con users

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
