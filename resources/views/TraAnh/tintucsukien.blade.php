                    <!----Tin tức sự kiện-->
                    <div class="container-fluid">
                        <div class="title ">
                            <h4 class="text-center ">Tin tức và khuyến mãi</h5>
                                <h3 class="text-center text-uppercase font-weight-bold">Khám Phá Trà Anh để nhận được
                                    khuyến mãi
                            </h4>
                        </div>
                    </div>
                    <div class="sukien">
                        <div class="container">
                            <div class="row pt-5">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="card">
                                            @foreach ($baiviet as $key => $value)
                                                <img src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}"
                                                    class="card-img-top" alt="Hình ảnh">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $value->tenbaiviet }}</h5>
                                                    <p class="card-text">{{ $value->tomtat }}</p>
                                                    <a href="{{ url('TraAnh/bai-viet/'.$value->id.'/'.$value->slug) }}" class="btn btn-primary">Xem thêm</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($khuyenmai as $key => $value)
                                            <div class="col-sm-6 pt-2">
                                                <div class="card">

                                                        <div class="card-body">
                                                             <a href="{{ url('TraAnh/bai-viet/'.$value->id.'/'.$value->slug) }}">
                                                            <img class=" w-100"
                                                                src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}"
                                                                alt="Hình ảnh">
                                                            <h5 class="card-title pt-2">{{ $value->tenbaiviet }}</h5>
                                                            <p class="card-text">{{ $value->tomtat }}</p>
                                                             </a>
                                                        </div>

                                                </div>

                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-md-6 ">
                                    <div class="row">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe
                                                src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Ftraanhcantho%2Fvideos%2F532737427759570%2F&show_text=false&width=476&t=0"
                                                width="642" height="361" style="border:none;overflow:hidden"
                                                scrolling="no" frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                allowFullScreen="true"></iframe>
                                        </div>
                                    </div>

                                    <div class="row">
                                        @foreach($ship as $key => $value)
                                        <div class="col-md-12 p-4 mr-4 ">
                                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                                <div class="col p-4 d-flex flex-column position-static">
                                                    <h3 class="mb-0">{{ $value->tenbaiviet }}</h3>
                                                    <p class="mb-auto">{{ $value->tomtat }}</p>
                                                    <a href="{{ url('TraAnh/bai-viet/'.$value->id.'/'.$value->slug) }}" class="stretched-link">Đọc tiếp</a>
                                                </div>
                                                <div class="col-auto d-none d-lg-block">
                                                    <img class="bd-placeholder-img" width="200" height="250"
                                                        src="{{ asset('public/uploads/anh/' . $value->hinhanh) }}"
                                                        role="img" aria-label="Placeholder: Thumbnail"
                                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                                    <rect width="100%" height="100%" fill="#55595c" />

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
