<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_donhang','id_sanpham', 'so_luong','gia'
    ];
    protected $primaryKey ='id';
    protected $table ='chitietdonhangs';

    public function donhang(){
        return $this->belongsTo('App\Models\donhang','id_donhang','id');
    }
}
