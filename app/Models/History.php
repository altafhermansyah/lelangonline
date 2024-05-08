<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $guarded = [];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
    }

    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
