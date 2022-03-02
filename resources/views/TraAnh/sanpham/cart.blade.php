{{--
@if(Session::has("Cart") != null)

@endif --}}
<div id="select-items">
    <ul class="header-cart-info">

        @foreach (Cart::content() as $item)
       <li class="header-cart-item">
           <img src="{{ asset('public/uploads/anh/'.$item->options->image) }}" class="header-cart-item-img">
           <div class="header-cart-item-info">
               <div class="header-cart-item-head">
                   <span class="header-cart-item-price">{{number_format($item->price) }} đ</span>
                   <span class="header-cart-item-multiply">X</span>
                   <span class="header-cart-item-qnt">{{ $item->qty }}</span>
                   <span class="header-cart-item-delete"><i class="fas fa-times"></i></span>
               </div>
               <div class="header-item-body">
                   <span class="header-cart-item-name">{{ $item->name }}</span>
               </div>
            </div>
       </li>
       @endforeach
   </ul>
   <hr>
   <div class="total">
       <span>Tổng:</span>
       <h6>{{ Cart::subtotal(0)  }} đ</h6>
   </div>
   <a class="btn btn-success view-list-cart " href="#" role="button">Xem giỏ hàng</a>
</div>

