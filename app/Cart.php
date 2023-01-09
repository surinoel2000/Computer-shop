<?php
namespace App;

class Cart{
    public $products = null;
    public $total_price = 0;
    public $total_quantity = 0;

    public function __constant($cart) {
        if ($cart){
            $this->products = $cart->products;
            $this->total_price = $cart->total_price;
            $this->total_quantity = $cart->total_quantity;

        }
    }

    public function addtoCart($product, $id){
        //1 giỏ hàng gồm 2 thông số dạng mạng là key + value với Key là ID - Value là thông tin liên quan đến 1 sản phẩm trong giỏ hàng

        $newProduct = ['quantity' => 0, 'price'=>$product->price ,'productInfor' => $product];//mang moi
        if($this->products)
        {
            if(array_key_exists($id,$products)){ //kiem tra neu ton tai id da ton t ai thi cap nhat lai so luong
                $newProduct = $products[$id];
            }

        }
        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->$products[$id] = $newProduct;
        $this->total_price += $product->price;
        $this->total_quantity++;
    }
}
?>
