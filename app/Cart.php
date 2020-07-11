<?php

namespace App;

class Cart
{
    private $items = null;
    private $totalQty = 0;
    private $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    public function add($item,$id){
        $storedItem = ['qty' => 0,'price'=>$item->price,'item'=>$item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function getTotalQty(){
        return $this->totalQty;
    }

    public function getTotalPrice(){
        return $this->totalPrice;
    }

    public function getDataInCart(){
        $return['items'] = $this->items;
        $return['totalQty'] = $this->totalQty;
        $return['totalPrice'] = $this->totalPrice;
        return $return;
    }

    public function subtract($item,$id)
    {   
        if($this->items[$id]['qty']==1){
            unset($this->items[$id]); 
        }else{
            $this->items[$id]['qty']--;
            $this->items[$id]['price'] -= $item->price;
        }
        
        $this->totalQty--;
        $this->totalPrice -= $item->price;   
    }
    public function removeItem($item,$id)
    {   
        $itemQty = $this->items[$id]['qty'];
        $itemPrice = $this->items[$id]['price'];
        $subtractPrice = $itemQty * $itemPrice;
        unset($this->items[$id]); 
        $this->totalQty -= $itemQty;
        $this->totalPrice -= $subtractPrice;   
    }
   
    public function remove()
    {
        $this->items = null;
        $this->totalQty = 0;
        $this->totalPrice = 0;
    }

}
