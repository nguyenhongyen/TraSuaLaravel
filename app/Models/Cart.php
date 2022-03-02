<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TraAnhController;

class Cart{
    public $products = null;
    public $totalPirce =0;
    public $totalQuanty =0;

    public function __construct($cart)
    {
        if($cart){
            $this->products = $cart->products;
            $this->totalPirce = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product,$id){
        $newProduct =['quanty' => 0, 'price' => $product->giaban, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id, $this->$products)){
                $newProduct = $this->$products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['giaban'] = $newProduct['quanty'] * $product->giaban;
        $this->products[$id]=$newProduct;
        $this->totalPirce += $product->giaban;
        $this->totalQuanty++;
    }
}
