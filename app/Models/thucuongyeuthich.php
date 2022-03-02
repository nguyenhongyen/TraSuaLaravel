<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use thucuong;
use thanhvien;
use banhngot;
class thucuongyeuthich extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_thanhvien','id_thucuong','id_banh'
    ];
    protected $primaryKey ='id';
    protected $table ='thucuongyeuthiches';

    public function thanhvien(){
        return $this->belongsTo('App\Models\thanhvien','id_thanhvien','id');
    }
    public function thucuong(){
        return $this->belongsTo('App\Models\thucuong','id_thucuong','id');
    }
    public function banhngot(){
        return $this->belongsTo('App\Models\banhngot','id_banh','id');
        
    }
    //em them di 
}
