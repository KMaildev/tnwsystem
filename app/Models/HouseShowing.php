<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseShowing extends Model
{
    use HasFactory;

    public function sale_team()
    {
        return $this->belongsTo(SaleTeam::class, 'sale_team_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}
