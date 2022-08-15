<?php

class Produs
{
    private $id;
    private $nume;
    private $descriere;
    private $sku;
    private $pret;
    private $imagine;
    private $stoc_disponibil;

    public function __construct($id,$nume, $descriere, $sku, $pret, $imagine, $stoc_disponibil)
    {
        $this->id = $id;
        $this->nume = $nume;
        $this->descriere = $descriere;
        $this->sku = $sku;
        $this->pret = $pret;
        $this->imagine = $imagine;
        $this->stoc_disponibil = $stoc_disponibil;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNume()
    {
        return $this->nume;
    }

    /**
     * @param mixed $nume
     */
    public function setNume($nume): void
    {
        $this->nume = $nume;
    }

    /**
     * @return mixed
     */
    public function getDescriere()
    {
        return $this->descriere;
    }

    /**
     * @param mixed $descriere
     */
    public function setDescriere($descriere): void
    {
        $this->descriere = $descriere;
    }

    /**
     * @return mixed
     */
    public function getPret()
    {
        return $this->pret;
    }

    /**
     * @param mixed $pret
     */
    public function setPret($pret): void
    {
        $this->pret = $pret;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @param mixed $imagine
     */
    public function setImagine($imagine): void
    {
        $this->imagine = $imagine;
    }

    /**
     * @return mixed
     */
    public function getImagine()
    {
        return $this->imagine;
    }

    /**
     * @return mixed
     */
    public function getStocDisponibil()
    {
        return $this->stoc_disponibil;
    }

    /**
     * @param mixed $stoc_disponibil
     */
    public function setStocDisponibil($stoc_disponibil): void
    {
        $this->stoc_disponibil = $stoc_disponibil;
    }
}