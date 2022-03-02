<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banhngot extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'tenbanh','slug', 'danhmuc', 'hinhanh','giaban','giamgia','trangthai','mota'
    ];
    protected $primaryKey ='id';
    protected $table ='banhngot';

    public function danhmucsp(){
        return $this->belongsTo('App\Models\danhmuc','danhmuc','id');
    }
    public function banhyeuthich(){
        return $this->belongsToMany('App\Models\thucuongyeuthich');
    }
}
