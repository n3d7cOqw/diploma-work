<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawUser extends Model
{
    protected $table = 'raw_users';
    protected $fillable = ['name', 'surname', 'role', 'unique_code'];
}
