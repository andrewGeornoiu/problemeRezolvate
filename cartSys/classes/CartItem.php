<?php

class CartItem {
    private $produs;
    private $cantiate;

    public function __construct($produs, $cantiate)
    {
        $this->produs = $produs;
        $this->cantiate = $cantiate;
    }

    public function getProdus()
    {
        return $this->produs;
    }

    public function setProdus($produs)
    {
        $this->produs = $produs;
    }

    public function getCantitate()
    {
        return $this->cantiate;
    }

    public function setCantitate($cantiate)
    {
        $this->cantiate = $cantiate;
    }

    function increaseCantitate($bucati = 1){
        $this->cantiate += $bucati;
    }
    function decreaseCantiate($bucati = 1){
        $this->cantiate -= $bucati;
    }

}