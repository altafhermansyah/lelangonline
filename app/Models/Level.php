<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

    protected $table = 'level';

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
