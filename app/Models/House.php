<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['address', 'name', 'rate'];

    public function flats()
    {
        return $this->hasMany(Flat::class, 'id_house');
    }
}
