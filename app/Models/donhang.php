<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class donhang extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_khachhang','ngay_dat', 'tong_tien','phuong_thuc','note','trangthai'
    ];
    protected $primaryKey ='id';
    protected $table ='donhangs';

   

}
