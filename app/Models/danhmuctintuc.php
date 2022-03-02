<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuctintuc extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'tendanhmuc', 'slug', 'kichhoat'
    ];
    protected $primaryKey ='id';
    protected $table ='danhmuctintucs';
}
