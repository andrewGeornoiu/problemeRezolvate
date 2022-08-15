<?php

class CartItem {
    private $produs;
    private $stoc_disponibil;

    public function __construct($produs, $stoc_disponibil)
    {
        $this->produs = $produs;
        $this->stoc_disponibil = $stoc_disponibil;
    }

    public function getProdus()
    {
        return $this->produs;
    }

    public function setProdus($produs)
    {
        $this->produs = $produs;
    }

    public function getStoc()
    {
        return $this->stoc_disponibil;
    }

    public function setStoc($stoc_disponibil)
    {
        $this->stoc_disponibil = $stoc_disponibil;
    }

    function increaseCantitate($bucati = 1){
        $this->stoc_disponibil += $bucati;
    }
    function decreaseCantiate($bucati = 1){
        $this->stoc_disponibil -= $bucati;
    }

}