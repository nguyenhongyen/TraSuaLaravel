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
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('Font-endTA/css/header-sp.css') }}">

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <title>Giỏ hàng</title>
    <style>
       .breadcrumb li a{
            color:rgb(32, 146, 32);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        @include('TraAnh.sanpham.header-sp')
    </div>
    <div class="container">
        <nav aria-label="breadcrumb " style="padding-top:82px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/TraAnh') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/TraAnh/Sanpham') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
        <div class="row">
                <table class="table" style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">HÌNH ẢNH</th>
                            <th scope="col">TÊN SẢN PHẨM</th>
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

                                <td><img src="{{ asset('public/uploads/anh/' . $item->options->image) }}" width="120"
                                        height="110"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price) }} đ</td>
                                <td>
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-">
                                        <input aria-label="quantity" id="qty-{{ $key }}" class="input-qty"
                                            max="20" min="1" name="" type="number" value="{{ $item->qty }}">
                                        <input class="plus is-form" type="button" value="+">
                                    </div>
                                </td>

                                <td>{{ number_format($item->price * $item->qty) }} đ</td>

                                <td>
                                    <a onclick="saveCart('{{ $key }}')">
                                    <i class="fas fa-save" onclick=""></i>
                                    </a>
                                </td>

                                <td><a onclick="deleteCart('{{ $key }}')" href="javascript:">
                                    <i class="fas fa-times"></i></a>
                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>

        </div>

        <div class="row ">
            <div class="container">
        <div class="col-lg-4 offset-lg-8 ">
                        <div class="proceed-checkout">
                            <ul>

                                <li class="subtotal cart-total">Tổng tiền: <span>{{ Cart::subtotal(0) }} đ</span></li>
                                {{-- <li class="">Total <span>$240.00</span></li> --}}
                            </ul>
                        </div>
                        <div class="checkout">
                            {{-- <a href="{{ url('TraAnh/thanh-toan') }}" class="proceed-btn">THANH TOÁN</a> --}}
                            {{-- <a href="{{ url('TraAnh/thanh-toan') }}" class="proceed-btn">THANH TOÁN</a> --}}
                        </div>

                    </div>
            </div>


        </div>
    </div>
    </div>
    <script>
        function deleteCart(id) {
            $.ajax({

                url: `{{ asset('TraAnh/Delete-Cart/${id}') }}`,
                type: "GET",
            }).done(function(response) {
                console.log(response);
                if (response) {
                    alertify.success('Đã xóa thanh cong');
                    setTimeout(() => {

                        location.reload();
                    }, 1000);

                }
            });

        }

        function saveCart(id) {
            const qty = document.querySelector('#qty-' + id).value;
            console.log(qty)
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
        $('input.input-qty').each(function() {
            var $this = $(this),
                qty = $this.parent().find('.is-form'),

                min = Number($this.attr('min')),

                max = Number($this.attr('max'));

                let number =   Number($this.val()) ;
                var d = number;
            $(qty).on('click',  function() {
                if ($(this).hasClass('minus')) {
                    if (d > min)  d += -1
                         $this.attr('value', d).val(d)
                } else if ($(this).hasClass('plus')) {
                    var x = Number($this.val()) + 1
                    if (x <= max) d += 1
                        $this.attr('value', d).val(d)
                }

            })
        })


    </script>
</body>

</html>







