<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    protected $fillable = [
        'name', 'abbreviated_name', 'curator_id'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'group_id');
    }
}
