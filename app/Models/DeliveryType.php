<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function delivery_type()
    // {
    //     return $this->belongsTo(Payment::class);
    // }
}
