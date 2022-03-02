<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = danhmuc::orderBy('id','DESC')->get();
        return view('danhmuc.index_danhmuc')->with(compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $danhmuc = danhmuc::orderBy('id','DESC')->get();
        return view('danhmuc.create_danhmuc')->with(compact('danhmuc'));

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
                'tendanhmuc' => 'required|unique:danhmucs|max:255',// unique là tên bảng csdl
                'dm_id'=>'required|max:255',
                'slug'=>'required|max:255',
                'kichhoat' => 'required'
            ],
            [
                'tendanhmuc.unique' => 'Tên danh mục đã có',
                'tendanhmuc.required' => 'Tên danh mục không được để trống'
            ]
            );
            $danhmuc = new danhmuc();
            $danhmuc->tendanhmuc = $data['tendanhmuc'];
            $danhmuc->slug = $data['slug'];
            $danhmuc->dm_id = $data['dm_id'];
            $danhmuc->kichhoat = $data['kichhoat'];
            $danhmuc->save();
            return redirect()->back()->with('status','Thêm danh mục thành công');
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
        $danhmuc= danhmuc::find($id);
        return view('danhmuc.edit_danhmuc')->with(compact('danhmuc'));
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
            'tendanhmuc' => 'required|max:255',// unique là tên bảng csdl
            'dm_id'=>'required|max:255',
            'slug'=>'required|max:255',
            'kichhoat' => 'required'
        ],
        [
            'tendanhmuc.unique' => 'Tên danh mục đã có',
            'tendanhmuc.required' => 'Tên danh mục không được để trống'
        ]
        );
        $danhmuc = danhmuc::find($id);
        $danhmuc->tendanhmuc = $data['tendanhmuc'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->dm_id = $data['dm_id'];
        $danhmuc->kichhoat = $data['kichhoat'];
        $danhmuc->save();
        return redirect()->back()->with('status','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        danhmuc::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }
}
