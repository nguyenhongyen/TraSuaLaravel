<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baivietgioithieu extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenbaiviet','slug', 'danhmuc', 'hinhanh','noidung','kichhoat','tomtat'
    ];
    protected $primaryKey ='id';
    protected $table ='baivietgioithieus';

    public function danhmuctin(){
        return $this->belongsTo('App\Models\danhmuctintuc','danhmuc','id');
    }
}
