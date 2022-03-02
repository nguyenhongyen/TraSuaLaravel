<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan_ThucUong extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_thanhvien','id_thucuong', 'noidung'
    ];
    protected $primaryKey ='id';
    protected $table ='binh_luan__thuc_uongs';

    public function thanhvien(){
        return $this->belongsTo('App\Models\thanhvien','id_thanhvien','id');
    }
    public function thucuong(){
        return $this->belongsTo('App\Models\thucuong','id_thucuong','id');
    }

}
