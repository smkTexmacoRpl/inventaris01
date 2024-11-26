<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['kode_supplier','nama_supplier','telepon_supplier','alamat_supplier','email_supplier'];
    public function barangs()
    {
        return $this->hasMany('App\Models\Barang');
    }
}
