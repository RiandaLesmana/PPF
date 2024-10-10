<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $primaryKey= "id";
    protected $fillable = ["nama_prodi","jenjang_prodi"];

    public function item(){
        return $this->hasMany(Item::class);
    }
}
