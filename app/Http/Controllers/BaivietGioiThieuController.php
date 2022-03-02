<?php

namespace App\Http\Controllers;

use App\Models\baivietgioithieu;
use App\Models\danhmuctintuc;
use Illuminate\Http\Request;

class BaivietGioiThieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baiviet = baivietgioithieu::orderBy('id','ASC')->paginate(2);
        //$baiviet = baivietgioithieu::all();
        $danhmucbai = danhmuctintuc::all();

        return view('baivietgioithieu.index_baiviet',compact('baiviet','danhmucbai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baiviet = baivietgioithieu::all();
        $danhmucbai = danhmuctintuc::all();
        return view('baivietgioithieu.create_baiviet',compact('baiviet','danhmucbai'));
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
                'tenbaiviet' => 'required|unique:baivietgioithieus|max:255',// unique là tên bảng csdl
                'slug'=>'required|max:255',
                'danhmuc'=>'required',
                 'noidung' => 'required',
                 'trangthai' => 'required',
                 'tomtat' => 'required',
                 'hinhanh'=>'required|image|mimes:jpg,png,jpeg,gif,svg'
            ],
            [
                'tenbaiviet.unique' => 'Tên bài viết đã có',
                'tenbaiviet.required' => 'Tên bài viết không được để trống',
                'hinhanh.required' => 'Hình ảnh không được để trống',
                'noidung.required' => 'Nội dung không được để trống',
                'tomtat.required' => 'Tóm tắt không được để trống',
            ]
            );
            $baiviet = new baivietgioithieu();
            $baiviet->tenbaiviet = $data['tenbaiviet'];
            $baiviet->slug = $data['slug'];
            $baiviet->danhmuc = $data['danhmuc'];
            $baiviet->noidung = $data['noidung'];
            $baiviet->tomtat = $data['tomtat'];
            $baiviet->kichhoat = $data['trangthai'];

              //thêm ảnh vào Folder  -> Public/uploads/truyen
              $get_image=$request->hinhanh;
              $path='public/uploads/anh';//đường dẫn để hình ảnh thêm vào
              $get_name_image=$get_image->getClientOriginalName();
              $name_image = current(explode('.',$get_name_image));
              $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
              $get_image->move($path,$new_image);

               $baiviet->hinhanh=$new_image;

            $baiviet->save();
            return redirect()->back()->with('status','Thêm bài viết thành công');
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
        $baiviet= baivietgioithieu::find($id);
        $danhmuc = danhmuctintuc::orderBy('id','DESC')->get();
        return view('baivietgioithieu.edit_baiviet')->with(compact('baiviet','danhmuc'));
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
                'tenbaiviet' => 'required|max:255',// unique là tên bảng csdl
                'slug'=>'required|max:255',
                'danhmuc'=>'required',
                'noidung' => 'required',
                'tomtat' => 'required',
                'trangthai' => 'required',

            ],
            [
                'tenbaiviet.required' => 'Tên bài viết không được để trống',
                'hinhanh.required' => 'Hình ảnh không được để trống',
                'noidung.required' => 'Nội dung không được để trống',
                'tomtat.required' => 'Tóm tắt không được để trống',
            ]
            );
            $baiviet = baivietgioithieu::find($id);
            $baiviet->tenbaiviet = $data['tenbaiviet'];
            $baiviet->slug = $data['slug'];
            $baiviet->danhmuc = $data['danhmuc'];
            $baiviet->tomtat = $data['tomtat'];
            $baiviet->noidung = $data['noidung'];
            $baiviet->kichhoat = $data['trangthai'];

             // thêm ảnh vào Folder  -> Public/uploads/anh
             $get_image=$request->hinhanh;
             if($get_image){
                  $path='public/uploads/anh/'.$baiviet->hinhanh;
                 if(file_exists($path)){
                     unlink($path);
                 }
                     $path='public/uploads/anh/';
                     $get_name_image=$get_image->getClientOriginalName();
                     $name_image = current(explode('.',$get_name_image));
                     $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                     $get_image->move($path,$new_image);

                     $baiviet->hinhanh=$new_image;
             }

            $baiviet->save();
            return redirect()->back()->with('status','Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        baivietgioithieu::find($id)->delete();
        return redirect()->back()->with('status','Xóa bài viết thành công');
    }
}
