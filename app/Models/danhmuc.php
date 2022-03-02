<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'tendanhmuc','dm_id', 'slug', 'kichhoat'
    ];
    protected $primaryKey ='id';
    protected $table ='danhmucs';
}
