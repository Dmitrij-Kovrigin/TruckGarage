<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    public function getTrucks()
    {
        return $this->hasMany(Truck::class, 'mechanic_id', 'id');
    }
}
