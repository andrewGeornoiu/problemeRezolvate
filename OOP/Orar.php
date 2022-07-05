<?php

class Facultate
{
    private $nume;
    private $materii = array();

    public function __construct($val_nume, $val_materii){
        $this->nume = $val_nume;
        $this->materii = $val_materii;
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
    public function setNume($nume)
    {
        $this->nume = $nume;
    }

    /**
     * @return array
     */
    public function getMaterii()
    {
        return $this->materii;
    }

    /**
     * @param array $materii
     */
    public function setMaterii($materii)
    {
        $this->materii = $materii;
    }

}

class Materie
{
    private $denumire;

    public function __construct($val_denumire)
    {
        $this->denumire = $val_denumire;
    }

    /**
     * @return mixed
     */
    public function getDenumire()
    {
        return $this->denumire;
    }

    /**
     * @param mixed $denumire
     */
    public function setDenumire($denumire)
    {
        $this->denumire = $denumire;
    }

}


class Student
{
    private $nume;
    private $facultate;


    public function __construct($val_nume, $val_facultate){
        $this->nume = $val_nume;
        $this->facultate = $val_facultate;

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
    public function setNume($nume)
    {
        $this->nume = $nume;
    }

    /**
     * @return mixed
     */
    public function getFacultate()
    {
        return $this->facultate;
    }

    /**
     * @param mixed $facultate
     */
    public function setFacultate($facultate)
    {
        $this->facultate = $facultate;
    }
}

class Orar {
    private $zi;
    private $ora;
    private $materie;

    public function __construct($val_zi, $val_ora, $val_materie)
    {
        $this->zi = $val_zi;
        $this->ora = $val_ora;
        $this->materie = $val_materie;
    }

    /**
     * @return mixed
     */
    public function getMaterie()
    {
        return $this->materie;
    }

    /**
     * @param mixed $materie
     */
    public function setMaterie($materie)
    {
        $this->materie = $materie;
    }

    /**
     * @return mixed
     */
    public function getOra()
    {
        return $this->ora;
    }

    /**
     * @param mixed $ora
     */
    public function setOra($ora)
    {
        $this->ora = $ora;
    }

    /**
     * @return mixed
     */
    public function getZi()
    {
        return $this->zi;
    }

    /**
     * @param mixed $zi
     */
    public function setZi($zi)
    {
        $this->zi = $zi;
    }



}

class StudentMaterie
{
    private $student;
    private $orar = array();

    public function __construct($val_student, $val_orar)
    {
        $this->student = $val_student;
        $this->orar = $val_orar;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param mixed $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }


    /**
     * @return array
     */
    public function getOrar()
    {
        return $this->orar;
    }

    /**
     * @param array $orar
     */
    public function setOrar($val_orar)
    {
        $this->orar = $val_orar;
    }

}


$materie1 = new Materie("Psihologie");
$materie2 = new Materie("Statistica");
$materie3 = new Materie("Metodologie");

$facultate = new Facultate("Facultatea de Psihologie", array($materie1, $materie2, $materie3));

$student1 = new Student( "George Popescu", $facultate);

$luni = new Orar("Luni", "12:30", $facultate->getMaterii()[0]->getDenumire());
$marti = new Orar("Marti", "13:30", $facultate->getMaterii()[1]->getDenumire());
$miercuri = new Orar("Miercuri", "13:30", $facultate->getMaterii()[2]->getDenumire());
$joi = new Orar("Joi", "12:30", $facultate->getMaterii()[0]->getDenumire());
$vineri = new Orar("Vineri", "13:30", $facultate->getMaterii()[1]->getDenumire());


$orarFinal = new StudentMaterie($student1, array($luni, $marti, $miercuri, $joi, $vineri));

foreach ($orarFinal->getOrar() as $orar){
    echo $orar->getZi() . "<br>";
    echo $orar->getOra() . " - " . $orar->getMaterie() . "<br>";
}


//echo $orarFinal->getOrar()[1]->getZi();

//$orar->setOrar(array("Luni"), array("11:00", "12:00", "13:00"), array($materie1->getDenumire(), $materie2->getDenumire(), $materie3->getDenumire()));
//foreach ($orar->getOrar() as $key => $value){
//    echo $value['Ziua'] . "<br>";
//    echo $value['Ora'] . " - " . $value['Materia'] . "<br>";
//}
//
//$orar->setOrar(array("Marti"), array("11:00", "12:00", "13:00"), array($materie2->getDenumire(), $materie3->getDenumire(), $materie3->getDenumire()));
//echo "<br>";
//
//}

