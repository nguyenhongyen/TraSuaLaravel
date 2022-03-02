<?php

namespace App\Http\Controllers;

use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\thanhvien;
use App\Models\danhmuc;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class DonHangController extends Controller
{
    public function index()
    {   $thanhvien = thanhvien::all();
         $donhang = donhang::orderBY('id','DESC')->get();

        return view('quanlydonhang.index_donhang',compact('donhang','thanhvien'));
    }
    public function changestatus(Request $request) {
        // dd($request->status);
        $order = donhang::where('id',$request->id)->update(['trangthai'=> $request->status]);

       return  response(['status'=> 'ok']);
    }

    public function chitiet_donhang($id){
        $thanhvien = thanhvien::all();
        
        $donhang = donhang::find($id);
        $chitiet = chitietdonhang::where('id_donhang',$donhang->id)->get();

        return view('quanlydonhang.chitiet_donhang',compact('donhang','chitiet','thanhvien'));
   }

}
