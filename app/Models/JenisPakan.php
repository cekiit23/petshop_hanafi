<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPakan extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai dengan database
    protected $table = 'jenis_pakan';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_jenis'
    ];
}
