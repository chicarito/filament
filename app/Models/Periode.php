<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $guarded = ['id'];

    public function classroom()
    {
        return $this->hasMany(HomeRoom::class);
    }
}
