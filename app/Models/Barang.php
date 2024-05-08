<?php

namespace App\Models;

use App\Models\Lelang;
use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lelang()
    {
        return $this->hasMany(Lelang::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
