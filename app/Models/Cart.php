<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    // public $subTotalPrice = null;

    public function __construct($cart){
        if($cart){

            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }


    public function AddCart($product,$id){
        $newProduct = ['quantity' => 0,'price'=> $product->price,'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct = $this->products[$id];
            }
        }



        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $newProduct['productInfo'] =$product;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuantity ++;

    }
    public function DeleteitemCart($id){
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function updatequantity_cart($id, $quantity){
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quantity'] = $quantity;
        $this->products[$id]['price'] = $quantity * $this->products[$id]['productInfo']->price;

        $this->totalQuantity += $this->products[$id]['quantity'];
        $this->totalPrice += $this->products[$id]['price'];
    }



}
