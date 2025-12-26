<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_barang',
        'kode_barang',
        'tanggal_input',
        'tanggal_acc',
        'deadline_acc',
    ];

    protected $casts = [
        'tanggal_input' => 'date',
        'tanggal_acc' => 'date',
        'deadline_acc' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
