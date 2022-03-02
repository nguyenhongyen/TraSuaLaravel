<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binhluan_banh extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_thanhvien','id_banh', 'noidung'
    ];
    protected $primaryKey ='id';
    protected $table ='binhluan_banhs';

    public function thanhvien(){
        return $this->belongsTo('App\Models\thanhvien','id_thanhvien','id');
    }
    public function banh(){
        return $this->belongsTo('App\Models\banhngot','id_banh','id');
    }
}
