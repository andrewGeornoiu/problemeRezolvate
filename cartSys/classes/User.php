<?php

class User
{
private $id;
private $nume;
private $prenume;
private $email;
private $parola;
private $telefon;

public function __construct($nume, $prenume, $email, $parola, $telefon)
{
    $this->nume = $nume;
    $this->prenume = $prenume;
    $this->email = $email;
    $this->parola = $parola;
    $this->telefon = $telefon;
}

public function getId(){
    return $this->id;
}
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
public function getPrenume()
{
    return $this->prenume;
}

/**
 * @param mixed $prenume
 */
public function setPrenume($prenume): void
{
    $this->prenume = $prenume;
}

/**
 * @return mixed
 */
public function getEmail()
{
    return $this->email;
}

/**
 * @param mixed $email
 */
public function setEmail($email): void
{
    $this->email = $email;
}

/**
 * @return mixed
 */
public function getParola()
{
    return $this->parola;
}

/**
 * @param mixed $parola
 */
public function setParola($parola): void
{
    $this->parola = $parola;
}

/**
 * @return mixed
 */
public function getTelefon()
{
    return $this->telefon;
}

/**
 * @param mixed $telefon
 */
public function setTelefon($telefon): void
{
    $this->telefon = $telefon;
}



}