<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','id');
    }
}
