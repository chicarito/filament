<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeRoom extends Model
{
    protected $guarded = ['id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
