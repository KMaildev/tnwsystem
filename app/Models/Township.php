<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;

    public function region_table()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}
