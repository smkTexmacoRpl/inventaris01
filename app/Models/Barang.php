<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode_barang','nama_barang','merk_id','jenis_id','lokasi_id','supplier_id','jumlah_barang','harga','gambar_barang','keterangan'];
    public function merk()  
    {
        return $this->belongsTo('App\Models\Merk');
    }
    public function supplier()
    {
      return $this->belongsTo('App\Models\Supplier');
    }
    public function jenis()
    {
        return $this->belongsTo('App\Models\JenisBarang');
    }

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }
}
