<?php

namespace App\Http\Controllers;

use App\Models\baivietgioithieu;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\slider;
use App\Models\thucuong;
use App\Models\banhngot;
use App\Models\binhluan_banh;
use App\Models\BinhLuan_ThucUong;
use App\Models\danhmuc;
use App\Models\donhang;
use App\Models\khachhang;
use App\Models\thanhvien;
use App\Models\chitietdonhang;
use App\Models\danhmuctintuc;
use App\Models\thucuongyeuthich;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Exception;

class TraAnhController extends Controller
{
    public function index()
    {
        $slider = slider::latest()->get();

        $thucuong = thucuong::orderBy('id', 'ASC')->take(8)->get();
        $banh = banhngot::all()->where('danhmuc', 6)->take(4);
        $baiviet = baivietgioithieu::all()->where('id', '3');
        $khuyenmai = baivietgioithieu::all()->where('danhmuc', '2');
        $ship = baivietgioithieu::all()->where('id', '5');
        $gioithieutra = baivietgioithieu::all()->where('id', '6');
        $gioithieu = baivietgioithieu::all()->where('danhmuc', '7');
        $list_favorites = [];
        $count_favorites = 0;

        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();

            $list_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->orderBy('id_thucuong', 'ASC')->get();

            for ($i = 0; $i < count($thucuong); $i++) {
                for ($j = 0; $j < count($list_favorites); $j++) {


                    if ($thucuong[$i]->id == $list_favorites[$j]->id_thucuong) {
                        $thucuong[$i]->like = true;
                    }
                }
            }
            //ok r do 
            // dd($data);
        }
        return view('TraAnh-index', compact('slider', 'thucuong', 'banh', 'baiviet', 'khuyenmai', 'ship', 'gioithieutra', 'gioithieu', 'count_favorites', 'list_favorites'));
    }

    public function thucuong(Request $request)
    {
        $thucuong = danhmuc::all()->where('dm_id', 0);
        $banh = danhmuc::all()->where('dm_id', 1);
        $listcart = json_decode(Cart::content());
       
        $thucuong_yeuthich = thucuongyeuthich::with('thucuong')->orderBY('id', 'ASC')->paginate(4);

        $trasua = thucuong::where('danhmuc', '1')->orderBy('id', 'ASC')->get();

        $tratuoi  = thucuong::where('danhmuc', '2')->orderBy('id', 'ASC')->get();
        $trakem = thucuong::where('danhmuc', '3')->orderBy('id', 'ASC')->get();;
        $thucuongdam = thucuong::where('danhmuc', '4')->orderBy('id', 'ASC')->get();;
        $topping = thucuong::where('danhmuc', '5')->orderBy('id', 'ASC')->get();;

        $loc_sp = $request->loc_sp ?? 'moi_nhat';
        if ($loc_sp) {
            switch ($loc_sp) {
                case 'moi_nhat':

                    $trasua = thucuong::where('danhmuc', '1')->get();
                    $tratuoi = thucuong::where('danhmuc', '2')->get();
                    $trakem = thucuong::where('danhmuc', '3')->get();
                    $thucuongdam = thucuong::where('danhmuc', '4')->get();
                    $topping = thucuong::where('danhmuc', '5')->get();
                    break;
                case 'gia_thap_cao':
                    $trasua = thucuong::where('danhmuc', '1')->orderBy('giaban', 'ASC')->get();
                    $tratuoi = thucuong::where('danhmuc', '2')->orderBy('giaban', 'ASC')->get();
                    $trakem = thucuong::where('danhmuc', '3')->orderBy('giaban', 'ASC')->get();
                    $thucuongdam = thucuong::where('danhmuc', '4')->orderBy('giaban', 'ASC')->get();
                    $topping = thucuong::where('danhmuc', '5')->orderBy('giaban', 'ASC')->get();
                    break;
                case 'gia_cao_thap':
                    $trasua = thucuong::where('danhmuc', '1')->orderBy('giaban', 'DESC')->get();
                    $tratuoi = thucuong::where('danhmuc', '2')->orderBy('giaban', 'DESC')->get();
                    $trakem = thucuong::where('danhmuc', '3')->orderBy('giaban', 'DESC')->get();
                    $thucuongdam = thucuong::where('danhmuc', '4')->orderBy('giaban', 'DESC')->get();
                    $topping = thucuong::where('danhmuc', '5')->orderBy('giaban', 'DESC')->get();
                    break;
                default:
                    $trasua = thucuong::where('danhmuc', '1')->get();
                    $tratuoi = thucuong::where('danhmuc', '2')->get();
                    $trakem = thucuong::where('danhmuc', '3')->get();
                    $thucuongdam = thucuong::where('danhmuc', '4')->get();
                    $topping = thucuong::where('danhmuc', '5')->get();
            }
        }

        $list_favorites = [];
        $count_favorites = 0;
       
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();

            $list_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->orderBy('id_thucuong', 'ASC')->get();

            for ($j = 0; $j < count($list_favorites); $j++) {
                for ($i = 0; $i < count($trasua); $i++) {
                    if ($trasua[$i]->id == $list_favorites[$j]->id_thucuong) {

                        $trasua[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($tratuoi); $i++) {
                    if ($tratuoi[$i]->id == $list_favorites[$j]->id_thucuong) {

                        $tratuoi[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($trakem); $i++) {
                    if ($trakem[$i]->id == $list_favorites[$j]->id_thucuong) {

                        $trakem[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($thucuongdam); $i++) {
                    if ($thucuongdam[$i]->id == $list_favorites[$j]->id_thucuong) {

                        $thucuongdam[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($topping); $i++) {
                    if ($topping[$i]->id == $list_favorites[$j]->id_thucuong) {

                        $topping[$i]->like = true;
                    }
                }
            }

            // dd($tratuoi);
            //dd($data);
        }

        return view('thucuong', compact('thucuong', 'count_favorites', 'list_favorites', 'listcart', 'banh', 'trasua', 'tratuoi', 'trakem', 'thucuongdam', 'topping', 'loc_sp', 'thucuong_yeuthich'));
    }
    public function banh(Request $request)
    {
        $thucuong = danhmuc::all()->where('dm_id', 0);
        $banh = danhmuc::all()->where('dm_id', 1);
        $listcart = json_decode(Cart::content());

        $thucuong_yeuthich = thucuongyeuthich::with('thucuong')->orderBY('id', 'DESC')->paginate(4);

        $tiramisu = banhngot::where('danhmuc', 6)->get();
        $banhmi = banhngot::where('danhmuc', 7)->get();
        $snack = banhngot::where('danhmuc', 8)->get();
        $flan = banhngot::where('danhmuc', 9)->get();
        $monmoi = banhngot::where('danhmuc', '1')->get();
      
       //be ngy oiiiii a b??? tr???m c???m v???i code c???a em
        $loc_sp = $request->loc_sp ?? 'moi_nhat';
        if($loc_sp) {
            switch ($loc_sp) {
                case 'moi_nhat':
                    $tiramisu = banhngot::where('danhmuc', 6)->get();
                    $banhmi = banhngot::where('danhmuc', 7)->get();
                    $snack = banhngot::where('danhmuc', 8)->get();
                    $flan = banhngot::where('danhmuc', 9)->get();
                    $monmoi = banhngot::where('danhmuc', 10)->get();
    
                    break;
                case 'gia_thap_cao':
                    $tiramisu = banhngot::where('danhmuc', 6)->orderBy('giaban', 'ASC')->get();
                    $banhmi = banhngot::where('danhmuc', 7)->orderBy('giaban', 'ASC')->get();
                    $snack = banhngot::where('danhmuc', 8)->orderBy('giaban', 'ASC')->get();
                    $flan = banhngot::where('danhmuc', 9)->orderBy('giaban', 'ASC')->get();
                    $monmoi = banhngot::where('danhmuc', 10)->orderBy('giaban', 'ASC')->get();
                    break;
                case 'gia_cao_thap':
                    $tiramisu = banhngot::where('danhmuc', 6)->orderBy('giaban', 'DESC')->get();
                    $banhmi = banhngot::where('danhmuc', 7)->orderBy('giaban', 'DESC')->get();
                    $snack = banhngot::where('danhmuc', 8)->orderBy('giaban', 'DESC')->get();
                    $flan = banhngot::where('danhmuc', 9)->orderBy('giaban', 'DESC')->get();
                    $monmoi = banhngot::where('danhmuc', 10)->orderBy('giaban', 'DESC')->get();
                    break;
                default:
                    $tiramisu = banhngot::where('danhmuc', 6);
                    $banhmi = banhngot::where('danhmuc', 7);
                    $snack = banhngot::where('danhmuc', 8);
                    $flan = banhngot::where('danhmuc', 9);
                    $monmoi = banhngot::where('danhmuc', 10);
            }
        }
      
        
        $list_favorites = [];
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();

            $list_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get();
            
            for ($j = 0; $j < count($list_favorites); $j++) {
            
                for ($i = 0; $i < count($monmoi); $i++) {
              
                    if ($monmoi[$i]->id == $list_favorites[$j]->id_banh) {
                        $monmoi[$i]->like = true;
                    }
                 
                }
                for ($i = 0; $i < count($tiramisu); $i++) {
              
                    if ($tiramisu[$i]->id == $list_favorites[$j]->id_banh) {
                        $tiramisu[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($snack); $i++) {
              
                    if ($snack[$i]->id == $list_favorites[$j]->id_banh) {
                        $snack[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($flan); $i++) {
              
                    if ($flan[$i]->id == $list_favorites[$j]->id_banh) {
                        $flan[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($banhmi); $i++) {
              
                    if ($banhmi[$i]->id == $list_favorites[$j]->id_banh) {
                        $banhmi[$i]->like = true;
                    }
                }
            }}
            
            


        return view('banh')->with(compact( 'thucuong','count_favorites', 'banh', 'listcart', 'tiramisu', 'banhmi', 'snack', 'flan', 'monmoi', 'loc_sp', 'thucuong_yeuthich'));
    }

    public function xemthucuong($id, Request $req)
    {
        $thucuong = thucuong::where('id', $req->id, $req->slug)->first();
        $sanphamnoibat = thucuong::orderBy('id', 'ASC')->take(4)->get();

        $banh = banhngot::where('slug', $req->slug)->first();
        $banhnoibat = banhngot::all()->where('danhmuc', 6)->take(4);
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
       
        }
        $comment = BinhLuan_ThucUong::where('id_thucuong', $req->id)->get();

        return view('chitietthucuong')->with(compact('count_favorites', 'thucuong', 'sanphamnoibat', 'banh', 'banhnoibat', 'comment'));
    }

    public function xembanh($id, Request $req)
    {
       
        
        $banh = banhngot::where('id', $req->id, $req->slug)->first();
        $sanphamnoibat = thucuong::orderBy('id', 'ASC')->take(4)->get();
      
        $thucuong = thucuong::where('slug', $req->slug)->first();
        $banhnoibat = banhngot::all()->where('danhmuc', 6)->take(4);
        $count_favorites = 0;
        $comment = binhluan_banh::where('id_banh', $req->id)->get();
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
       
        }
        
       
        return view('chitietbanh')->with(compact('banh','count_favorites', 'banhnoibat', 'thucuong', 'sanphamnoibat', 'comment'));
    }

    public function timkiem()
    {
        $thucuong = thucuong::all();
        $banh = banhngot::all();
        $danhmuc = danhmuc::orderBy('id', 'DESC')->get();
        $baiviet = baivietgioithieu::all();

        $tukhoa = $_GET['tukhoa'];

        $thucuong = thucuong::where('tensanpham', 'LIKE', '%' . $tukhoa . '%')->orWhere('giaban', 'LIKE', '%' . $tukhoa . '%')->orWhere('danhmuc', 'LIKE', '%' . $tukhoa . '%')->get();
        $banh = banhngot::where('tenbanh', 'LIKE', '%' . $tukhoa . '%')->orWhere('giaban', 'LIKE', '%' . $tukhoa . '%')->orWhere('mota', 'LIKE', '%' . $tukhoa . '%')->get();

        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
       
        }
        return view('timkiemsanpham', compact('thucuong', 'banh', 'tukhoa', 'danhmuc','count_favorites'));
    }
    public function timkiemdanhmuc($type, Request $request)
    {
        $thucuong = danhmuc::all()->where('dm_id', 0);
        $banh = danhmuc::all()->where('dm_id', 1);

        $thucuong_yeuthich = thucuongyeuthich::with('thucuong')->orderBY('id', 'DESC')->paginate(4);


        // $danhmucbanh = banhngot::where('danhmuc', $type)->get();

        $tendanhmuc = danhmuc::where('id', $type)->first();

        $soluongthucuong = thucuong::where('danhmuc', $type)->get();
        $soluongbanh = banhngot::where('danhmuc', $type)->get();


        $loc_sp = $request->loc_sp ?? 'moi_nhat';
        switch ($loc_sp) {
            case 'moi_nhat':
                $danhmucthucuong = thucuong::where('danhmuc', $type)->orderBy('id', 'DESC')->get();
                $danhmucbanh = banhngot::where('danhmuc', $type)->orderBy('id', 'DESC')->get();
                break;
            case 'gia_thap_cao':
                $danhmucthucuong = thucuong::where('danhmuc', $type)->orderBy('giaban', 'ASC')->get();
                $danhmucbanh = banhngot::where('danhmuc', $type)->orderBy('giaban', 'ASC')->get();
                break;
            case 'gia_cao_thap':
                $danhmucthucuong = thucuong::where('danhmuc', $type)->orderBy('giaban', 'DESC')->get();
                $danhmucbanh = banhngot::where('danhmuc', $type)->orderBy('giaban', 'DESC')->get();
                break;
            default:
                $danhmucthucuong = thucuong::where('danhmuc', $type)->orderBy('id', 'DESC')->get();
                $danhmucbanh = banhngot::where('danhmuc', $type)->orderBy('id', 'DESC')->get();
        }
        $list_favorites = [];
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
            $list_favorites =  thucuongyeuthich::where('id_thanhvien', $id_user)->get();
            for ($j = 0; $j < count($list_favorites); $j++) {
                for ($i = 0; $i < count($danhmucthucuong); $i++) {
                    if ($danhmucthucuong[$i]->id == $list_favorites[$j]->id_thucuong) {
                        $danhmucthucuong[$i]->like = true;
                    }
                }
                for ($i = 0; $i < count($danhmucbanh); $i++) {
                    if ($danhmucbanh[$i]->id == $list_favorites[$j]->id_banh) {
                        $danhmucbanh[$i]->like = true;
                    }
                }
            }
            
        }
        return view('timkiemtheodanhmuc', compact('thucuong', 'banh', 'count_favorites', 'danhmucthucuong', 'danhmucbanh', 'tendanhmuc', 'soluongthucuong', 'soluongbanh', 'loc_sp', 'thucuong_yeuthich'));
    }


    public function AddCartDrink($id)
    {
        $thucuong = DB::table('thucuongs')->where('id', $id)->first();
        $banhngot = DB::table('banhngot')->where('id', $id)->first();

        if (isset($thucuong)) {
            Cart::add([
                'id' => $thucuong->id,
                'name' =>  $thucuong->tensanpham,
                'qty' => 1,
                'price' =>  $thucuong->giaban,
                'weight' => 0,
                'options' => array('image' => $thucuong->hinhanh)
            ]);
        }
        return view('TraAnh.sanpham.cart');
    }

    public function AddCartCake($id)
    {
        $banhngot = DB::table('banhngot')->where('id', $id)->first();
        if (isset($banhngot)) {
            Cart::add([
                'id' => $banhngot->id,
                'name' =>  $banhngot->tenbanh,
                'qty' => 1,
                'price' =>  $banhngot->giaban,
                'weight' => 0,
                'options' => array('image' => $banhngot->hinhanh)
            ]);
        }

        return view('TraAnh.sanpham.cart');
    }

    public function DeleteCart($id)
    {
        Cart::remove($id);
        return view('TraAnh.sanpham.cart');
    }

    public function SaveCart($id, $quantity)
    {
        Cart::update($id, $quantity);
        return view('TraAnh.sanpham.cart');
    }



    public function thanhtoan()
    {
        $cart =  json_decode(Cart::content());

        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('TraAnh.sanpham.dathang', compact('cart','count_favorites'));
    }


    public function dathang(Request $request)
    {

        $donhang = new donhang();
        $donhang->id_khachhang = Auth::guard('thanhvien')->user()->id; 
        $donhang->ngay_dat = date('Y-m-d');
        $donhang->tong_tien = Cart::subtotal(0);
        $donhang->phuong_thuc = $request->method;
        $donhang->note = $request->note;
        $donhang->diachi = $request->address;
        $donhang->sodienthoai = $request->phone;
        $donhang->trangthai = 'new';
        $donhang->save();

        foreach (Cart::content() as $key => $value) {
            $chitietdonhang = new chitietdonhang();
            $chitietdonhang->id_donhang = $donhang->id;
            $chitietdonhang->id_sanpham =  $value->name;
            $chitietdonhang->so_luong = $value->qty;
            $chitietdonhang->gia = $value->price;
            $chitietdonhang->save();
        }
        $request->session()->forget('cart');
        return response(['status' => 'ok']);
    }


    public function dangnhap()
    {
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('dangnhapthanhvien')->with(compact('count_favorites'));
    }

    public function dangky()
    {
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
       
        }
        return view('dangkythanhvien',compact('count_favorites'));
    }

    public function postdangky(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email|unique:thanhvien,email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're_password' => 'required|same:password',
                'phone' => 'required',
                'address' => 'required'
            ],
            [
                'email.required' => ' Vui l??ng nh???p email',
                'email.email' =>  'Kh??ng ????ng ?????nh d???ng email',
                'email.unique' => 'Email ???? c?? ng?????i s??? d???ng',
                'password.required' => 'Vui l??ng nh???p m???t kh???u',
                're_password.same' => 'M???t kh???u kh??ng gi???ng nhau',
                'password.min' => 'M???t kh???u ??t nh???t 6 k?? t???'
            ]
        );
        $thanhvien = new thanhvien();
        $thanhvien->name = $req->name;
        $thanhvien->email = $req->email;

        $thanhvien->password = bcrypt($req->password);
        $thanhvien->phone = $req->phone;
        $thanhvien->address = $req->address;
        $thanhvien->save();
        return redirect()->back()->with('status', '????ng k?? t??i kho???n th??nh c??ng');
    }
    public function getcapnhattaikhoan(){
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
       
        }

        return view('thongtinthanhvien.capnhattaikhoan',compact('count_favorites'));
    }
    public function capnhattaikhoan(Request $req)
    {
        $data = $req->validate(
            [
                'name' => 'required', // unique l?? t??n b???ng csdl
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'T??n t??i kho???n kh??ng ???????c ????? tr???ng',
                'phone.required' => 'S??? ??i???n tho???i kh??ng ???????c ????? tr???ng',
                'address.required' => '?????a ch??? kh??ng ???????c ????? tr???ng'
            ]
        );
        $thanhvien = thanhvien::find(Auth::guard('thanhvien')->user()->id);
        $thanhvien->name = $data['name'];
        $thanhvien->email = Auth::guard('thanhvien')->user()->email;
        $thanhvien->phone = $data['phone'];
        $thanhvien->address = $data['address'];
        $thanhvien->save();
        return redirect()->back()->with('status', 'C???p nh???t th??ng tin th??nh c??ng');
    }

    public function postdangnhap(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => "Vui l??ng nh???p Email",
                'email.email' => 'Email kh??ng ????ng ?????nh d???ng',
                'password.required' => 'Vui l??ng nh???p m???t kh???u',
                'password.min' => 'M???t kh???u ??t nh???t 6 k?? t???',
                'password.max' => 'm???t kh???u kh??ng v?????t qu?? 20 k?? t???'
            ]
        );

        $kiemtra = $request->only(['email', 'password']);


        if (Auth::guard('thanhvien')->attempt($kiemtra)) {
            return redirect()->back()->with(['status' => '????ng nh???p th??nh c??ng']);
        } else {

            return redirect()->back()->with(['statusfail' => '????ng nh???p kh??ng th??nh c??ng']);
        }
    }

    public function dangxuat()
    {
        Auth::guard('thanhvien')->logout();
        return redirect()->back();
    }

    public function nhanxet($id, Request $request)
    {
        $id_thucuong = $id;
        $thuc_uong = thucuong::find($id);
        $danhmuc = danhmuc::all();

        $nhanxet = new BinhLuan_ThucUong();
        $nhanxet->id_thucuong = $id_thucuong;
        $nhanxet->id_thanhvien = Auth::guard('thanhvien')->user()->id;
        $nhanxet->noidung = $request->noidung;
        $nhanxet->save();
        return redirect()->back()->with(['status' => 'Nh???n x??t th??nh c??ng']);
    }
    public function nhanxetbanh($id, Request $request)
    {
        $id_banh = $id;
        $banh = banhngot::find($id);
        $danhmuc = danhmuc::all();

        $nhanxet = new binhluan_banh();
        $nhanxet->id_banh = $id_banh;
        $nhanxet->id_thanhvien = Auth::guard('thanhvien')->user()->id;
        $nhanxet->noidung = $request->noidung;
        $nhanxet->save();
        return redirect()->back()->with(['status' => 'Nh???n x??t th??nh c??ng']);
    }

    public function xembaiviet($id, Request $req)
    {


        $baiviet = baivietgioithieu::where('id', $req->id, $req->slug)->first();

        //  $baiviet_lienquan = baivietgioithieu::where('danhmuc',$baiviet->danhmuc)->limit(4)->get();
        $baiviet_lienquan = baivietgioithieu::orderBy('id', 'ASC')->limit(4)->get();

        $tintuc_sukien = baivietgioithieu::all();
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('baiviet-TA', compact('baiviet', 'baiviet_lienquan', 'count_favorites'));
    }
    public function tintuc()
    {
        $tintuc_sukien = baivietgioithieu::where('danhmuc', 3)->get();
        // $khuyenmai = baivietgioithieu::where('danhmuc', 2)->get();
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('list-baiviet', compact('tintuc_sukien','count_favorites'));
    }
    public function khuyenmai()
    {
        //$tintuc_sukien = baivietgioithieu::where('danhmuc', 3)->get();
        $khuyenmai = baivietgioithieu::where('danhmuc', 2)->get();
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
       
        return view('list-khuyenmai', compact('khuyenmai','count_favorites'));
    }


    public function baiviet()
    {
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('TraAnh.baiviet-gioithieuTA.vechungtoi', compact('count_favorites'));
      
    }

    public function thucuongyeuthich($id, Request $request)
    {
        //ktra t???n t???i s???n ph???m
        
        $product = thucuong::find($id);  
    
        $list_drink = thucuongyeuthich::where('id_thucuong', $id)->get();

       // dd($list_drink);

        try {
           
            if (Auth::guard('thanhvien')->check()) {
                if (isset($list_drink) && count($list_drink) > 0) {
                    return response(['fail' => 'S???n ph???m ???? ???????c y??u th??ch']);
                }
                DB::table('thucuongyeuthiches')->insert([
                    'id_thucuong' => $product->id,
                    'id_banh' => '',
                    'id_thanhvien' => Auth::guard('thanhvien')->user()->id
                ]);

                return response(['success' => '???? th??m y??u th??ch th??nh c??ng']);
            } else {
                return response(['fail' => 'B???n ph???i ????ng nh???p!']);
            }
        } catch (Exception $e) {
            $mess = "Kh??ng th??m th??nh c??ng";
        }
    }
    public function banhyeuthich($id, Request $request)
    {
        //ktra t???n t???i s???n ph???m
    
        $product = banhngot::find($id);
        $list_cake = thucuongyeuthich::where('id_banh', $id)->get();
       
        try {
           
            if (Auth::guard('thanhvien')->check()) {
                if (isset($list_cake) && count($list_cake) > 0) {
                    return response(['fail' => 'S???n ph???m ???? ???????c y??u th??ch']);
                }
                DB::table('thucuongyeuthiches')->insert([
                    'id_banh' => $product->id,
                    'id_thucuong' => '',
                    'id_thanhvien' => Auth::guard('thanhvien')->user()->id
                ]);

                return response(['success' => '???? th??m y??u th??ch th??nh c??ng']);
            } else {
                return response(['fail' => 'B???n ph???i ????ng nh???p!']);
            }
        } catch (Exception $e) {
            $mess = "Kh??ng th??m th??nh c??ng";
        }
    }

    public function thongtindonhang()
    {
        $thanhvien = thanhvien::all();
        $donhang = donhang::where('id_khachhang', Auth::guard('thanhvien')->user()->id)->orderBy('id', 'ASC')->get();

        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
       
        }
        return view('thongtinthanhvien.donhang', compact('donhang','count_favorites'));
    }

    public function sanphamyeuthich()
    {

        $thucuong = thucuong::all();
        $thucuong_yeuthich = thucuongyeuthich::where('id_thanhvien', Auth::guard('thanhvien')->user()->id)->get();

        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;

            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
       
        }

        return view('thongtinthanhvien.sanphamyeuthich', compact('thucuong', 'thucuong_yeuthich','count_favorites'));
    }
    public function tuyendung(){

        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('TraAnh.baiviet-gioithieuTA.tuyendung', compact('count_favorites'));
    }
    public function infor(){

        
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('thongtinthanhvien.thanhvien', compact('count_favorites'));
    }
 
    public function cuahang(){
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('TraAnh.baiviet-gioithieuTA.cuahang', compact('count_favorites'));
    }

    public function Hinhthucthanhtoan(){
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }
        return view('TraAnh.baiviet-gioithieuTA.hinhthucthanhtoan', compact('count_favorites'));
    }

    public function Vanchuyengiaonhan(){
        $count_favorites = 0;
        if (Auth::guard('thanhvien')->check()) {
            $id_user =  Auth::guard('thanhvien')->user()->id;
            $count_favorites = thucuongyeuthich::where('id_thanhvien', $id_user)->get()->count();
        }

         return view('TraAnh.baiviet-gioithieuTA.vanchuyengiaonhan', compact('count_favorites'));
    }
   
   
   
}
