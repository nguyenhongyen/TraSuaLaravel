<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thucuong extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'tensanpham','slug', 'danhmuc', 'hinhanh','giaban','giamgia','trangthai','mota'
    ];
    protected $primaryKey ='id';
    protected $table ='thucuongs';

    public function danhmucsp(){
        return $this->belongsTo('App\Models\danhmuc','danhmuc','id');
    }
    public function thucuongyeuthich(){
        return $this->belongsToMany('App\Models\thucuongyeuthich');
    }
   


}
