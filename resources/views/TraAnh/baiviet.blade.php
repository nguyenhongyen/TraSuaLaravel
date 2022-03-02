<div class="bannner-link p-5 px-md-4">
    <div class="container-fluid">
        <div class="row">
            @foreach($gioithieu as $key => $value)
            <div class="col-md-6 col-lg-6">
                <a href="{{ url('TraAnh/bai-viet/'.$value->id.'/'.$value->slug)}}">
                <div class="card bg-light text-white">

                    <img class="card-img-top" src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}" alt="Hình ảnh">

                    <div class="card-img-overlay">
                        {{-- <h5 class="card-title">{{ $value->tenbaiviet }}</h5> --}}
                        <p class="card-text"></p>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
