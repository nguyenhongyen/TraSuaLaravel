<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\thucuong;
use App\Models\danhmuc;
use Cart;

class ThucUongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
      {
            $sanpham = thucuong::with('danhmucsp')->orderBy('id','DESC')->paginate(5);
            return view('sanpham.thucuong.index_thucuong')->with(compact('sanpham'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $sanpham = thucuong::orderBy('id','DESC')->get();
        $danhmuc = danhmuc::orderBy('id','DESC')->get();
        return view('sanpham.thucuong.create_thucuong')->with(compact('danhmuc','sanpham'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tensanpham' => 'required|unique:thucuongs|max:255',// unique là tên bảng csdl
                'slug'=>'required|max:255',
                'danhmuc'=>'required',
                'giaban'=>'required',
                'giamgia' => 'required',
                 'mota' => 'required',
                 'trangthai' => 'required',
                 'hinhanh'=>'required|image|mimes:jpg,png,jpeg,gif,svg'
            ],
            [
                'tensanpham.unique' => 'Tên sản phẩm đã có',
                'tensanpham.required' => 'Tên sản phẩm không được để trống',
                'giaban.required' => 'Giá bán không được để trống',
                'hinhanh.required' => 'Hình ảnh không được để trống',
                'mota.required' => 'Mô tả không được để trống',
            ]
            );
            $sanpham = new thucuong();
            $sanpham->tensanpham = $data['tensanpham'];
            $sanpham->slug = $data['slug'];
            $sanpham->danhmuc = $data['danhmuc'];
            $sanpham->giaban = $data['giaban'];
            $sanpham->giamgia = $data['giamgia'];
            $sanpham->mota = $data['mota'];
            $sanpham->trangthai = $data['trangthai'];

              //thêm ảnh vào Folder  -> Public/uploads/truyen
              $get_image=$request->hinhanh;
              $path='public/uploads/anh';//đường dẫn để hình ảnh thêm vào
              $get_name_image=$get_image->getClientOriginalName();
              $name_image = current(explode('.',$get_name_image));
              $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
              $get_image->move($path,$new_image);

               $sanpham->hinhanh=$new_image;

            $sanpham->save();
            return redirect()->back()->with('status','Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sanpham= thucuong::find($id);
        $danhmuc = danhmuc::orderBy('id','DESC')->get();
        return view('sanpham.thucuong.edit_thucuong')->with(compact('sanpham','danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'tensanpham' => 'required|max:255',// unique là tên bảng csdl
                'slug'=>'required|max:255',
                'danhmuc'=>'required',
                'giaban'=>'required',
                'giamgia' => 'required',
                'mota' => 'required',
                'trangthai' => 'required',
            ],
            [
                'tensanpham.required' => 'Tên sản phẩm không được để trống',
                'giaban.required' => 'Giá bán không được để trống',
                'hinhanh.required' => 'Hình ảnh không được để trống',
                'mota.required' => 'Mô tả không được để trống',
            ]
            );
            $sanpham = thucuong::find($id);
            $sanpham->tensanpham = $data['tensanpham'];
            $sanpham->slug = $data['slug'];
            $sanpham->danhmuc = $data['danhmuc'];
            $sanpham->giaban = $data['giaban'];
            $sanpham->giamgia = $data['giamgia'];
            $sanpham->mota = $data['mota'];
            $sanpham->trangthai = $data['trangthai'];

             // thêm ảnh vào Folder  -> Public/uploads/anh
             $get_image=$request->hinhanh;
             if($get_image){
                  $path='public/uploads/anh/'.$sanpham->hinhanh;
                 if(file_exists($path)){
                     unlink($path);
                 }
                     $path='public/uploads/anh/';
                     $get_name_image=$get_image->getClientOriginalName();
                     $name_image = current(explode('.',$get_name_image));
                     $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                     $get_image->move($path,$new_image);

                     $sanpham->hinhanh=$new_image;
             }

            $sanpham->save();
            return redirect()->back()->with('status','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        thucuong::find($id)->delete();
        return redirect()->back()->with('status','Xóa sản phẩm thành công');
    }
    
}
