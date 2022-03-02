<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class thanhvien extends Authenticatable
{

    use HasFactory, Notifiable;
    public $timestamps = true;
    protected $fillable = [
        'email','name', 'password','address','phone'
    ];
    protected $guarded = 'thanhvien';
    protected $primaryKey ='id';
    protected $table ='thanhvien';


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function thanhvien(){
        return $this->belongsToMany('App\Models\donhang');
    }
}
