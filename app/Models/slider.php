<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'tenslider','mota', 'hinhanh', 'link','trangthai'
    ];
    protected $primaryKey ='id';
    protected $table ='sliders';
}
