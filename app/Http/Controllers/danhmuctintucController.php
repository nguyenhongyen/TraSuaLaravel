<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuctintuc;

class danhmuctintucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuctintuc = danhmuctintuc::all();
        return view('danhmuctintuc.index_danhmuctintuc',compact('danhmuctintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('danhmuctintuc.create_danhmuctintuc');
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
                'tendanhmuc' => 'required|unique:danhmuctintucs|max:255',// unique là tên bảng csdl
                'slug'=>'required|max:255',
                'kichhoat' => 'required'
            ],
            [
                'tendanhmuc.unique' => 'Tên danh mục đã có',
                'tendanhmuc.required' => 'Tên danh mục không được để trống'
            ]
            );
            $danhmuctintuc = new danhmuctintuc();
            $danhmuctintuc->tendanhmuc = $data['tendanhmuc'];
            $danhmuctintuc->slug = $data['slug'];
            $danhmuctintuc->kichhoat = $data['kichhoat'];
            $danhmuctintuc->save();
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
        $danhmuctintuc = danhmuctintuc::find($id);
        return view('danhmuctintuc.edit_danhmuctintuc')->with(compact('danhmuctintuc'));
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
                'slug'=>'required|max:255',
                'kichhoat' => 'required'
            ],
            [
                'tendanhmuc.unique' => 'Tên danh mục đã có',
                'tendanhmuc.required' => 'Tên danh mục không được để trống'
            ]
            );
            $danhmuctintuc = danhmuctintuc::find($id);
            $danhmuctintuc->tendanhmuc = $data['tendanhmuc'];
            $danhmuctintuc->slug = $data['slug'];
            $danhmuctintuc->kichhoat = $data['kichhoat'];
            $danhmuctintuc->save();
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
        danhmuctintuc::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }
}
