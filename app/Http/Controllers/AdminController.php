<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;

use App\Models\banhngot;
use App\Models\thanhvien;
use App\Models\thucuongyeuthich;
use App\Models\thucuong;
use App\Models\danhmuc;
use App\Models\baivietgioithieu;
use App\Models\binhluan_banh;
use App\Models\BinhLuan_ThucUong;
use App\Models\donhang;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function Dangky()
    {

        return view('admin.register');
    }
    public function PostDangky(Request $request)
    {
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password=bcrypt($request->password);
       $user->save();

       if($user->id){
           return redirect()->route('get.Login');
       }
       return redirect()->back();
    }

    public function loginAdmin()
    {
       return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $credentials = $request->only('email','password');
        if(\Auth::attempt($credentials)){
            return redirect()->route('get.admin');
        }
    }

    public function Dangxuat(){
        \Auth::logout();
        return redirect()->route('get.Login');
    }

    public function admin(){

        $doanhthu = donhang::sum("tong_tien");
        $donhang = donhang::where('trangthai','Mới')->count();
        $xacnhan = donhang::where('trangthai','Xác nhận đơn hàng')->count();
        $huy = donhang::where('trangthai','Hủy đơn hàng')->count();

        return view('admin',compact('doanhthu','donhang','xacnhan','huy'));
    }

    public function quanlythanhvien(){
        $thanhvien = thanhvien::all();
        return view('quanlythanhvien.index_thanhvien',compact('thanhvien'));
    }


    public function thucuongyeuthich(){
       $product = thucuong::all();
       $list_drink = thucuongyeuthich::orderBy('id','ASC')->paginate(4);
       return view('sanphamyeuthich.thucuong_yeuthich',compact('product','list_drink'));
    }

    public function timkiem(){
        $tukhoa = $_GET['tukhoa'];
        $thucuong = thucuong::where('tensanpham', 'LIKE', '%' . $tukhoa . '%')->get();
        $banhngot = banhngot::where('tenbanh', 'LIKE', '%' . $tukhoa . '%')->get();
        return view('sanpham.timkiemsanpham',compact('tukhoa','thucuong','banhngot'));
    }
    public function binhluanthucuong(){
        $thucuong_binhluan = BinhLuan_ThucUong::orderBy('id','DESC')->paginate(5);
        return view('quanlybinhluan.binhluan_thucuong',compact('thucuong_binhluan'));
    }
    public function binhluanbanh(){
        $banh = binhluan_banh::orderBy('id','DESC')->paginate(5);
        return view('quanlybinhluan.binhluan_banh',compact('banh'));
    }
   
}
