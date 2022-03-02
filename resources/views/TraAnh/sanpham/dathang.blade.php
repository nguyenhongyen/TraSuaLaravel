<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('Font-endTA/css/shopping-cart.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/trangchu.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/thanhtoan.css') }}">

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <title>Thanh toán đơn hàng</title>

</head>

<body>
    <div class="container-fluid">
        <div class="wrapper">
            @include('TraAnh.header')
        </div>

    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    {{-- <h2 id="heading">Sign Up Your User Account</h2>
                    <p>Fill all form field to go to next step</p> --}}
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Chi tiết đơn hàng</strong></li>
                            <li id="payment"><strong>Địa chỉ giao hàng</strong></li>
                            <li id="confirm"><strong>Đặt hàng thành công</strong></li>
                        </ul>
                        {{-- <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets --> --}}
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table" style="margin-top: 20px;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">SẢN PHẨM</th>
                                                    <th scope="col">GIÁ</th>
                                                    <th scope="col">SỐ LƯỢNG</th>
                                                    <th scope="col">TỔNG</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach (Cart::content() as $key => $item)
                                                    <tr>
                                                        <th scope="row">{{ $i++ }}</th>

                                                        <td><img src="{{ asset('public/uploads/anh/' . $item->options->image) }}"
                                                                width="120" height="110"></td>
                                                        <td>{{ number_format($item->price) }} đ</td>
                                                        <td>
                                                            <div class="buttons_added">
                                                                <input class="minus is-form" type="button" value="-">
                                                                <input aria-label="quantity"
                                                                    id="qty-{{ $key }}" class="input-qty"
                                                                    max="20" min="1" name="" type="number"
                                                                    value="{{ $item->qty }}">
                                                                <input class="plus is-form" type="button" value="+">
                                                            </div>
                                                        </td>

                                                        <td>{{ number_format($item->price * $item->qty) }} đ</td>

                                                        <td>
                                                            <a onclick="saveCart('{{ $key }}')">
                                                                <i class="fas fa-save" onclick=""></i>
                                                            </a>
                                                        </td>

                                                        <td><a onclick="deleteCart('{{ $key }}')"
                                                                href="javascript:">
                                                                <i class="fas fa-times"></i></a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        <div class="col-5">
                                            <h5 class="subtotal cart-total">Tổng tiền: <span>{{ Cart::subtotal(0) }}
                                                    đ</span></h5>
                                        </div>

                                    </div>
                                </div>
                            </div> <button type="button" name="next" class="next action-button btn btn-primary"
                                check='{{ Auth::guard('thanhvien')->check() }}' value="Next">Kế tiếp</button>
                        </fieldset>
                        @if (Auth::guard('thanhvien')->check()) 
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-12">
                                        {{-- <form action="{{ route('dathang') }}" method="POST">
                                            @csrf --}}
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="name">Tên của bạn:</label>
                                                <input type="name" disabled
                                                    value=" {{ Auth::guard('thanhvien')->user()->name }}"
                                                    name="full_name" class="form-control w3-input" id="name" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="phone">Số điện thoại:</label>
                                                <input required type="text" id="phone" class="form-control" id="phone"
                                                    name="phone">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email:</label>
                                                <input type="email" disabled
                                                    value="{{ Auth::guard('thanhvien')->user()->email }}"
                                                    class="form-control" id="email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
                                            <input required type="text" class="form-control" id="address"
                                                name="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Ghi chú</label>
                                            <textarea class="form-control" id="note" rows="4" name="note"></textarea>
                                        </div>
                                        <div class="form-check">
                                            <input checked  class="form-check-input" type="radio" name="thanhtoan" id="cod"
                                                value="atm">
                                            <label class="form-check-label" for="chuyenkhoan">Chuyển khoản ngân
                                                hàng</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="atm" class="form-check-input" type="radio" name="thanhtoan"
                                                id="tienmat" value="cod" >
                                            <label class="form-check-label" for="tienmat"> Thanh toán bằng tiền
                                                mặt</label>
                                        </div>


                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="order" name="next" class="next action-button btn btn-primary"
                                value="Submit">Mua hàng</button>
                            <button type="button" name="previous"
                                class="previous action-button-previous btn btn-primary" value="Previous">Quay
                                lại</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps"></h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                    </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Đặt hàng thành công</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        @include('TraAnh.footer')
    </div>






    <script>
        function deleteCart(id) {
            $.ajax({

                url: `{{ asset('TraAnh/Delete-Cart/${id}') }}`,
                type: "GET",
            }).done(function(response) {
                console.log(response);
                if (response) {
                    alertify.success('Đã xóa thành công');
                    setTimeout(() => {

                        location.reload();
                    }, 1000);

                }
            });

        }

        function saveCart(id) {
            const qty = document.querySelector('#qty-' + id).value;
            $.ajax({
                url: `{{ asset('TraAnh/Save-Cart/${id}/${qty}') }}`,
                type: "GET",
            }).done(function(response) {
                console.log(response);
                if (response) {
                    alertify.success('Đã cập nhật thành công');
                    setTimeout(() => {

                        location.reload();
                    }, 1000);

                }
            });

        }


        $('#order').click(function(e) {
            let cod = $('#cod').is(":checked") ;
            let atm = $('#atm').is(":checked");
            let data = {
                        phone: $('#phone').val(),
                        address: $('#address').val(),
                        note: $('#note').val(),
                        method: !cod ? "COD" : "ATM",

                        _token: "{{ csrf_token() }}"
                    }
            if (data.phone === '' || data.address === '') {
                alertify.warning('Vui lòng nhập thông tin đầy đủ!');
                e.preventdefault()
            }
            $.ajax({
                url: `{{ asset('TraAnh/Dat-hang') }}`,
                data,

                type: "POST",
            }).done(function(response) {
                setTimeout(() => {
                location.reload();
                }, 1000);
            });

        });

        $('input.input-qty').each(function() {
            var $this = $(this),
                qty = $this.parent().find('.is-form'),

                min = Number($this.attr('min')),

                max = Number($this.attr('max'));

            let number = Number($this.val());
            var d = number;
            $(qty).on('click', function() {
                if ($(this).hasClass('minus')) {
                    if (d > min) d += -1
                    $this.attr('value', d).val(d)
                } else if ($(this).hasClass('plus')) {
                    var x = Number($this.val()) + 1
                    if (x <= max) d += 1
                    $this.attr('value', d).val(d)
                }

            })
        })

        /// dat hang
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);
            let checkAuth = '{{ Auth::guard('thanhvien')->check() }}' === '' ? false : true;



            $(".next").click(function(e) {
                if (!checkAuth) {
                    alertify.warning('Vui lòng đăng nhập!');
                    e.preventdefault();

                }
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);

            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {

                return false;
            })

        });
    </script>
</body>

</html>
