<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendaftaran',
        'user_id',
        'nisn',
        'nik',
        'nama_siswa',
        'jenis_kelamin',
        'pas_foto',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',

        //kontak
        'email',
        'hp',

        //alamat
        'alamat',
        'nilai',

        //data pendaftaran
        'pil1',
        'pil2',

        //data ortu
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'nohp_ayah',
        'nohp_ibu',
        'penghasilan_ayah',
        'penghasilan_ibu',

        'status_pendaftaran',
        'tgl_pendaftaran',
        'created_at'
    ];

    protected $casts = [
        'tgl_pendaftaran' => 'datetime',
    ];

    public function user()
    {
         return $this->belongsTo(User::class, 'user_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function jurusanPil1()
    {
        return $this->belongsTo(Jurusan::class, 'pil1');
    }

    public function jurusanPil2()
    {
        return $this->belongsTo(Jurusan::class, 'pil2');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            // Cek apakah pengguna sudah terdaftar
            $existingRegistration = Item::where('user_id', $item->user_id)->first();
            if ($existingRegistration) {
                throw new \Exception("Anda sudah terdaftar.");
            }
        });
    }

}
