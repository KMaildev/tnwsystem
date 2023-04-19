<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleTeam extends Model
{
    use HasFactory;

    public function sale_team_users()
    {
        return $this->hasMany(SaleTeamUser::class, 'sale_team_id', 'id');
    }
}
