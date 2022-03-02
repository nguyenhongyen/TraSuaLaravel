<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $slider = slider::orderBy('id','DESC')->get();
        return view('slider.index_slider')->with(compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $slider = slider::orderBy('id','DESC')->get();
        return view('slider.create_slider')->with(compact('slider'));
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
                'tenslider' => 'required|unique:sliders|max:255',// unique là tên bảng csdl
                'mota'=>'required|max:255',
                'hinhanh'=>'required|image|mimes:jpg,png,jpeg,gif,svg',
                'link' => 'required',
                'trangthai' =>'required'
            ],
            [
                'tenslider.unique' => 'Tên Slider đã có',
                'tenslider.required' => 'Tên Slider không được để trống',
                'hinhanh.required' => 'Hình ảnh không được để trống'

            ]
            );
            $slider = new slider();
            $slider->tenslider = $data['tenslider'];
            $slider->mota = $data['mota'];
            $slider->link = $data['link'];
            $slider->trangthai = $data['trangthai'];

             //thêm ảnh vào Folder  -> Public/uploads/truyen
             $get_image=$request->hinhanh;
             $path='public/uploads/anh';//đường dẫn để hình ảnh thêm vào
             $get_name_image=$get_image->getClientOriginalName();
             $name_image = current(explode('.',$get_name_image));
             $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move($path,$new_image);

            $slider->hinhanh=$new_image;
            $slider->save();
            return redirect()->back()->with('status','Thêm Slider thành công');
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
        $slider = slider::find($id);
        return view('slider.edit_slider')->with(compact('slider'));
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
                'tenslider' => 'required',// unique là tên bảng csdl
                'mota'=>'required|max:255',
                'link' => 'required',
                'trangthai' =>'required'
            ],
            [
                'tenslider.required' => 'Tên Slider không được để trống',
                'hinhanh.required' => 'Hình ảnh không được để trống',

            ]
            );
            $slider = slider::find($id);
            $slider->tenslider = $data['tenslider'];
            $slider->mota = $data['mota'];
            $slider->link = $data['link'];
            $slider->trangthai = $data['trangthai'];

              // thêm ảnh vào Folder  -> Public/uploads/anh
              $get_image=$request->hinhanh;
              if($get_image){
                   $path='public/uploads/anh/'.$slider->hinhanh;
                  if(file_exists($path)){
                      unlink($path);
                  }
                      $path='public/uploads/anh/';
                      $get_name_image=$get_image->getClientOriginalName();
                      $name_image = current(explode('.',$get_name_image));
                      $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                      $get_image->move($path,$new_image);

                      $slider->hinhanh=$new_image;
              }

             $slider->save();
             return redirect()->back()->with('status','Cập nhật Slider thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        slider::find($id)->delete();
        return redirect()->back()->with('status','Xóa slider thành công');
    }
}
