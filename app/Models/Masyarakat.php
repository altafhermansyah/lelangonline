<?php

namespace App\Models;

// use App\Models\Pembayaran;
// use Illuminate\Database\Eloquent\Model;
use App\Models\Lelang;
use App\Models\History;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function lelang()
    {
        return $this->hasMany(Lelang::class);
    }
}
