<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'jumlah',
        'tanggal_pengeluaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
