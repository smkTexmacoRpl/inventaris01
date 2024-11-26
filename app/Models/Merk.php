<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;
    protected $fillable = ['merk_barang'];
    public function barangs()
    {
        return $this->hasMany('App\Models\Barang');
    }
}
