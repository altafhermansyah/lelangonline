<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use App\Models\History;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang extends Model
{
    use HasFactory;


    protected $table = 'lelang';

    protected $guarded = [];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function history()
    {
        return $this->hasMany(History::class);
    }
}
?>
