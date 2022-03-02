<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'full_name','email','address','phone','note'
    ];
    protected $primaryKey ='id';
    protected $table ='khachhangs';
    
}
