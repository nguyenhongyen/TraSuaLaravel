<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\ThucUongController;
use App\Http\Controllers\BanhNgotController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TraAnhController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\danhmuctintucController;
use App\Http\Controllers\BaivietGioiThieuController;
use App\Http\Controllers\thucuongyeuthich;
use App\Http\Controllers\DonHangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();


//trang chủ admin
// Route::get('/admin', function () {
//     return view('admin');
// });

//đăng nhập đăng ký admin


Route::get('/Dang-ky', [AdminController::class, 'Dangky'])->name('get.Dangky');
Route::post('/Dang-ky', [AdminController::class, 'PostDangky'])->name('post.Dangky');

Route::get('/Dang-nhap', [AdminController::class, 'loginAdmin'])->name('get.Login');
Route::post('/Dang-nhap', [AdminController::class, 'postLoginAdmin'])->name('post.Dangnhap');

Route::get('/Dang-xuat', [AdminController::class, 'Dangxuat'])->name('get.dangxuat');

Route::get('/admin', [AdminController::class, 'admin'])->name('get.admin');






//tìm kiếm sản phẩm admin
Route::get('/trang-chu-tim-kiem', [AdminController::class, 'timkiem']);

//danh mục sản phẩm
Route::prefix('/danhmuc')->group(function () {
    Route::resource('/danhmuc', DanhMucController::class);
    Route::get('/', [DanhMucController::class, 'index'])->name('danhmuc.index');
    Route::get('/create', [DanhMucController::class, 'create'])->name('danhmuc.create');
});
//thức uống
Route::prefix('/thucuong')->group(function () {
    Route::resource('/thucuong', ThucUongController::class);
    Route::get('/', [ThucUongController::class, 'index'])->name('thucuong.index');
    Route::get('/create', [ThucUongController::class, 'create'])->name('thucuong.create');
});

//banh ngọt
Route::prefix('/banhngot')->group(function () {
    Route::resource('/banhngot', BanhNgotController::class);
    Route::get('/', [BanhNgotController::class, 'index'])->name('banhngot.index');
    Route::get('/create', [BanhNgotController::class, 'create'])->name('banhngot.create');
});

//slider
Route::prefix('/slider')->group(function () {
    Route::resource('/slider', SliderController::class);
    Route::get('/', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
});

//danh mục tin tức
Route::prefix('/danhmuctintuc')->group(function () {
    Route::resource('/danhmuctintuc', danhmuctintucController::class);
    Route::get('/', [danhmuctintucController::class, 'index'])->name('danhmuctintuc.index');
    Route::get('/create', [danhmuctintucController::class, 'create'])->name('danhmuctintuc.create');
});

//bài viết giới thiệu
Route::prefix('/baivietgioithieu')->group(function () {
    Route::resource('/baivietgioithieu', BaivietGioiThieuController::class);
    Route::get('/', [BaivietGioiThieuController::class, 'index'])->name('baivietgioithieu.index');
    Route::get('/create', [BaivietGioiThieuController::class, 'create'])->name('baivietgioithieu.create');
});
//quản lý thành viên
Route::resource('/quanlythanhvien', AdminController::class);
Route::get('/', [AdminController::class, 'quanlythanhvien'])->name('quanlythanhvien');

//quản lý đơn hàng
Route::prefix('/quanlydonhang')->group(function () {
    Route::resource('/quanlydonhang', DonHangController::class);
    Route::get('/', [DonHangController::class, 'index'])->name('quanlydonhang.index');
    Route::get('/chitiet_donhang/{id}', [DonHangController::class, 'chitiet_donhang'])->name('quanlydonhang.chitiet_donhang');
    Route::post('/change-status', [DonHangController::class, 'changestatus'])->name('quanlydonhang.changestatus');
});
//quản lý sản phẩm yêu thích
Route::resource('/quanlyyeuthich', AdminController::class);
Route::get('/thuc-uong-yeu-thich', [AdminController::class, 'thucuongyeuthich']);
//quản lý bình luận của khách hàng
Route::get('/quan-ly-binh-luan', [AdminController::class, 'binhluanthucuong']);
Route::get('/quan-ly-binh-luan-banh', [AdminController::class, 'binhluanbanh']);

// trang chủ thức uống, bánh
Route::prefix('/TraAnh')->group(function () {
    Route::resource('/TraAnh', TraAnhController::class);
    Route::get('/', [TraAnhController::class, 'index']);
    Route::get('/Trangchu', [TraAnhController::class, 'index']);
    Route::get('/Tintuc-sukien', [TraAnhController::class, 'tintucsukien'])->name('tintucsukien');
    Route::get('/Khuyen-mai', [TraAnhController::class, 'khuyenmai'])->name('khuyenmai');

    Route::get('/Sanpham', [TraAnhController::class, 'thucuong']);
    Route::get('/Thucuong', [TraAnhController::class, 'thucuong']);

    Route::get('/Banh', [TraAnhController::class, 'banh']);


    // xem list  view cart
    Route::get('/Add-Cart/{id}', [TraAnhController::class, 'AddCartDrink']);
    Route::get('/Add-Cart-Cake/{id}', [TraAnhController::class, 'AddCartCake']);

    //delete
    Route::get('Delete-Cart/{id}', [TraAnhController::class, 'DeleteCart']);

    //save
    Route::get('Save-Cart/{id}/{qty}', [TraAnhController::class, 'SaveCart']);

    //thanh toán
    Route::get('gio-hang', [TraAnhController::class, 'thanhtoan'])->name('/gio-hang');

    Route::post('Dat-hang', [TraAnhController::class, 'dathang'])->name('dathang');



    //tìm kiếm bằng danh mục sản phẩm
    Route::get('/Danh-muc-thucuong/{type}', [TraAnhController::class, 'timkiemdanhmuc']);
    Route::get('/Danh-muc-banh/{type}', [TraAnhController::class, 'timkiemdanhmuc']);

    // đăng ký và đăng nhập thành viên
    Route::get('/Dang-ky-thanh-vien', [TraAnhController::class, 'dangky'])->name('dangky');
    Route::post('/Dang-ky-thanh-vien', [TraAnhController::class, 'postdangky'])->name('postdangky');

    Route::get('/Dang-nhap-thanh-vien', [TraAnhController::class, 'dangnhap'])->name('dangnhap');
    Route::post('/Dang-nhap-thanh-vien', [TraAnhController::class, 'postdangnhap'])->name('postdangnhap');
    //Route::post('/Cap-nhat-thong-tin',[TraAnhController::class,'capnhattaikhoan'])->name('capnhattaikhoan');

    Route::get('/Dang-xuat-thanh-vien', [TraAnhController::class, 'dangxuat'])->name('dangxuat');

    //xem chi tiết sản phẩm
    Route::get('/xem-san-pham/{id}/{slug}', [TraAnhController::class, 'xemthucuong'])->name('xemthucuong');
    Route::get('/xem-banh/{id}/{slug}', [TraAnhController::class, 'xembanh'])->name('xembanh');

    //xem bài viết
    Route::get('/bai-viet/{id}/{slug}', [TraAnhController::class, 'xembaiviet'])->name('xembaiviet');
    Route::get('/tin-tuc', [TraAnhController::class, 'tintuc'])->name('tintuc');
    Route::get('/khuyen-mai', [TraAnhController::class, 'khuyenmai'])->name('khuyenmai');

    Route::get('/bai-viet', [TraAnhController::class, 'baiviet'])->name('baiviet');
    //tìm kiếm sản phẩm
    Route::get('/tim-kiem', [TraAnhController::class, 'timkiem']);


    Route::get('yeu-thich/{id}', [TraAnhController::class, 'thucuongyeuthich']);
    Route::get('add-cake-favorite/{id}', [TraAnhController::class, 'banhyeuthich']);
});
//nhận xét bình luận sản phẩm
Route::post('nhan-xet/{id}', [TraAnhController::class, 'nhanxet']);
Route::post('nhan-xet-banh/{id}', [TraAnhController::class, 'nhanxetbanh']);
// yêu thích sản phẩm



Route::get('/chinhsachthanhvien', [TraAnhController::class, 'chinhsachthanhvien']);

Route::get('/tuyendung', [TraAnhController::class, 'tuyendung']);

Route::get('/cua-hang', [TraAnhController::class, 'cuahang']);

Route::get('/Hinh-thuc-thanh-toan', [TraAnhController::class, 'Hinhthucthanhtoan']);

Route::get('/Van-chuyen-giao-nhan', [TraAnhController::class, 'Vanchuyengiaonhan']);

Route::get('/thong-tin-thanh-vien', [TraAnhController::class, 'infor']);

Route::get('/cap-nhat-tai-khoan', [TraAnhController::class, 'getcapnhattaikhoan']);
Route::post('/cap-nhat-tai-khoan', [TraAnhController::class, 'capnhattaikhoan'])->name('capnhattaikhoan');

Route::get('/san-pham-yeu-thich', [TraAnhController::class, 'sanphamyeuthich']);

Route::get('/thong-tin-don-hang', [TraAnhController::class, 'thongtindonhang']);
     //Route::get('/thong-tin-don-hang/{Auth::guard("thanhvien")->user()->id}',[TraAnhController::class,'thongtindonhang']);
    // Route::get('/thong-tin-don-hang', function () {
    //     return view('thongtinthanhvien.donhang');
    // });
  