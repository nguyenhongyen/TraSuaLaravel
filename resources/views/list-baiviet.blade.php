@extends('TraAnh.chitietbaiviet')
@section('baiviet')
<div class="container">
    <h3 class="p-4 text-center" style="color:green">TIN TỨC VÀ SỰ KIỆN</h3>
        <div class="container">
            <div class="row">
                @foreach ($tintuc_sukien as $key => $value)
                    <div class="col-sm-3 pt-2">
                        <div class="card">

                            <div class="card-body">
                                <a href="{{ url('TraAnh/bai-viet/' . $value->id . '/' . $value->slug) }}" style="color:black;">
                                    <div class="text-center">
                                        <img class=" w-75" src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}"
                                            alt="Hình ảnh">

                                    </div>

                                    <h5 class="card-title pt-2 text-center">{{ $value->tenbaiviet }}</h5>
                                    <p class="card-text">{{ $value->tomtat }}</p>
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>


</div>
@endsection
