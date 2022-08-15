<?php

class Cart {
    private $cart_id;
    private $user_id;


    public function getCartId(){
        return $this->cart_id;
    }
    public function setCartId($cart_id): void
    {
        $this->cart_id = $cart_id;
    }

    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }


}
