<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curator extends Model
{
    /** @use HasFactory<\Database\Factories\CuratorFactory> */
    use HasFactory;

    protected $table = 'curators';
    protected $fillable = ['name', 'surname', 'phone', 'email', 'department', 'student_group_id'];

}
