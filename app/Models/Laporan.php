<?php

namespace App\Models;

use App\Models\kategoriLaporan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['kategori_laporan','Kanal_Laporan','wilayah','users'];

    public function kategori_laporan()
    {
        return $this->belongsTo(kategoriLaporan::class,'category_laporan_id');
    }

    public function Kanal_Laporan()
    {
        return $this->belongsTo(Kanal_Laporan::class, 'kanal_laporan_id');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query
                ->Join('kategori_laporans','kategori_laporans.id','=','Laporans.category_laporan_id')
                ->Join('kanal__laporans','kanal__laporans.id','=','Laporans.kanal_laporan_id')
                ->Join('wilayahs','wilayahs.id','=','Laporans.wilayah_id')
                ->Join('Users','Users.id','=','Laporans.user_id')
                ;
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use($search){
                   $query->where('name', 'like', '%'. strtoupper($search) .'%')
                         ->orWhere('Laporans.phone', 'like', '%'. $search .'%')
                         ->orWhere('wilayah', 'like', '%'.  strtoupper($search) .'%')
                         ->orWhere( 'kanal_laporan'  ,'like', '%'.  strtoupper($search) .'%')
                         ->orWhere( 'jenis_laporan','like', '%'.  strtoupper($search) .'%')
                         ->orWhere( 'created_at','like', '%'.  strtoupper($search) .'%')
                         ;
               });
           });
    }

}
