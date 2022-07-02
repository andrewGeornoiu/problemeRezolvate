<?php

abstract class Angajat
{
    protected $nume;
    protected $email;
    protected $telefon;
    protected $salariu;
    protected $departament;


    public function __construct($val_nume, $val_email, $val_telefon, $val_salariu, $val_departament) {
        $this->nume = $val_nume;
        $this->email = $val_email;
        $this->telefon = $val_telefon;
        $this->salariu = $val_salariu;
        $this->departament = $val_departament;
    }

    //getter & setter nume
    abstract public function get_nume();
    abstract public function set_nume($val_nume);

    //getter & setter email
    abstract public function get_email();
    abstract public function set_email($val_email);

    //getter & setter telefon
    abstract public function get_telefon();
    abstract public function set_telefon($val_telefon);

    //getter & setter salariu
    abstract public function get_salariu();
    abstract public function set_salariu($val_salariu);

    //getter & setter departament
    abstract public function get_departament();
    abstract public function set_departament($val_departament);

}

abstract class Superior extends Angajat
{
    protected $angajati;
    protected $decisive_power = false;
    protected $exe_power = false;

    function __construct($val_nume, $val_email, $val_telefon, $val_decisive_power, $val_exe_power, $val_angajati, $val_salariu, $val_departament){
        parent::__construct($val_nume, $val_email, $val_telefon, $val_salariu, $val_departament);
        $this->decisive_power = $val_decisive_power;
        $this->exe_power = $val_exe_power;
        $this->angajati = $val_angajati;
    }

    //getter & setter decisive power
    abstract public function get_decisive_power();
    abstract public function set_decisive_power($val_decisive_power);

    //getter & setter exe power
    abstract public function get_exe_power();
    abstract public function set_exe_power($val_exe_power);

    //getter & setter angajati
    abstract public function get_angajati();
    abstract public function set_angajati($val_angajati);

    //add & delete angajati
    abstract public function add_angajat($val_angajat);
    abstract public function delete_angajat($val_angajat);

}

class Director extends Superior{
    private $stakeholders;

    function __construct($val_nume, $val_email, $val_telefon, $val_decisive_power, $val_exe_power, $val_stakeholders, $val_angajati, $val_salariu, $val_departament){
        parent::__construct($val_nume, $val_email, $val_telefon, $val_decisive_power, $val_exe_power, $val_angajati, $val_salariu, $val_departament);
        $this->stakeholders = $val_stakeholders;
    }

    //getter & setter decisive power
    public function get_decisive_power()
    {
        return $this->decisive_power;
    }
    public function set_decisive_power($val_decisive_power)
    {
        $this->decisive_power = true;
    }

    //getter & setter decisive power
    public function get_exe_power()
    {
        return $this->exe_power;
    }
    public function set_exe_power($val_exe_power)
    {
        $this->exe_power = true;
    }

    //getter & setter nume
    public function get_nume()
    {
        return $this->nume;
    }
    public function set_nume($val_nume)
    {
        $this->nume = $val_nume;
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        $this->email = $val_email;
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        $this->telefon = $val_telefon;
    }

    //getter & setter stakeholders
    public function get_stakeholders()
    {
        return $this->stakeholders;
    }
    public function set_stakeholders($val_stakeholders)
    {
        $this->stakeholders = $val_stakeholders;
    }

    //getter & setter salariu
    public function get_salariu()
    {
        return $this->salariu;
    }
    public function set_salariu($val_salariu)
    {
        $this->salariu = $val_salariu;
    }

    //getter & setter angajati
    public function get_angajati()
    {
        return $this->angajati;
    }
    public function set_angajati($val_angajati)
    {
        $this->angajati = $val_angajati;
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        $this->departament = $val_departament;
    }

    //add angajat
    public function add_angajat($angajat){
        array_push($this->angajati, $angajat);
    }
    //delete angajat
    public function delete_angajat($angajat){
        for($i=0; $i<count($this->angajati); $i++){
            if($this->angajati[$i]->get_nume() == $angajat){
                unset($this->angajati[$i]);
            }
        }
        array_values($this->angajati);
    }

}

class HR extends Angajat{

    private $angajati_recrutati;

    function __construct($val_nume, $val_email, $val_telefon, $val_angajati_recrutati, $val_salariu, $val_departament){
        parent::__construct($val_nume, $val_email, $val_telefon, $val_salariu, $val_departament);
        $this->angajati_recrutati = $val_angajati_recrutati;
    }

    //getter & setter nume
    public function get_nume()
    {
        return $this->nume;
    }
    public function set_nume($val_nume)
    {
        $this->nume = $val_nume;
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        $this->email = $val_email;
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        $this->telefon = $val_telefon;
    }

    //getter & setter angajati_recrutati
    public function get_angajati_recrutati()
    {
        return $this->angajati_recrutati;
    }
    public function set_angajati_recrutati($val_angajati_recrutati)
    {
        $this->angajati_recrutati = $val_angajati_recrutati;
    }

    //getter & setter salariu
    public function get_salariu()
    {
        return $this->salariu;
    }
    public function set_salariu($val_salariu)
    {
        $this->salariu = $val_salariu;
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        $this->departament = $val_departament;
    }
}

class Programator extends Angajat{

    private $limbaj_programare;

    function __construct($val_nume, $val_email, $val_telefon, $val_limbaj_programare, $val_salariu, $val_departament){
        parent::__construct($val_nume, $val_email, $val_telefon, $val_salariu, $val_departament);
        $this->limbaj_programare = $val_limbaj_programare;
    }

    //getter & setter nume
    public function get_nume()
    {
        return $this->nume;
    }
    public function set_nume($val_nume)
    {
        $this->nume = $val_nume;
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        $this->email = $val_email;
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        $this->telefon = $val_telefon;
    }

    //getter & setter limbaj de programare
    public function get_limbaj_programare()
    {
        return $this->limbaj_programare;
    }
    public function set_limbaj_programare($val_limbaj_programare)
    {
        $this->limbaj_programare = $val_limbaj_programare;
    }

    //getter & setter salariu
    public function get_salariu()
    {
        return $this->salariu;
    }
    public function set_salariu($val_salariu)
    {
        $this->salariu = $val_salariu;
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        $this->departament = $val_departament;
    }
}

class Manager extends Superior{

    //getter & setter decisive power
    public function get_decisive_power()
    {
        return $this->decisive_power;
    }
    public function set_decisive_power($val_decisive_power)
    {
        $this->decisive_power = true;
    }

    //getter & setter exe power
    public function get_exe_power()
    {
        return $this->exe_power;
    }
    public function set_exe_power($val_exe_power)
    {
        $this->exe_power = true;
    }

    //getter & setter nume
    public function get_nume()
    {
        return $this->nume;
    }
    public function set_nume($val_nume)
    {
        $this->nume = $val_nume;
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        $this->email = $val_email;
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        $this->telefon = $val_telefon;
    }

    //getter & setter angajati
    public function get_angajati()
    {
        return $this->angajati;
    }
    public function set_angajati($val_angajati)
    {
        $this->angajati = $val_angajati;
    }

    //getter & setter salariu
    public function get_salariu()
    {
        return $this->salariu;
    }
    public function set_salariu($val_salariu)
    {
        $this->salariu = $val_salariu;
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        $this->departament = $val_departament;
    }

    //add angajat
    public function add_angajat($angajat){
        array_push($this->angajati, $angajat);
    }
    //delete angajat
    public function delete_angajat($angajat){
        for($i=0; $i<count($this->angajati); $i++){
            if($this->angajati[$i]->get_nume() == $angajat){
                unset($this->angajati[$i]);
            }
        }
        array_values($this->angajati);
    }
}

class Departamanet {
    private $departament;

    public function __construct($val_departament) {
        $this->departament = $val_departament;
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        $this->departament = $val_departament;
    }

}

$development = new Departamanet("Devs");

$programator1 = new Programator("Ion", "ion@emag.ro", "0785765432", "PHP", 5000, $development->get_departament());
$programator2 = new Programator("Cosmin", "cosmin@emag.ro", "0785765432", "PHP", 6600, "");
$programator3 = new Programator("George", "george@emag.ro", "0785765432", "PHP", 11000, "");


$recruter1 = new HR("Ioana", "ioana@emag.ro", "0784999345", 4, 4500, "");
$recruter2 = new HR("Andreea", "andreea@emag.ro", "0784999345", 5, 5000, "");

$director = new Director("Andrei", "andrei@emag.ro", "0749481356", true, false, 30, array($programator1, $programator2, $programator3), 25000, "");
$manager = new Manager("Lavinia", "lavinia@emag.ro", "0756481876", false,true, array($recruter1, $recruter2), 7750, "");

echo $programator1->get_departament();

//$director->delete_angajat($programator3->get_nume());
//$director->add_angajat($programator3);


//echo "Angajati sub directorul " . $director->get_nume() . " :<br>";
//foreach ($director->get_angajati() as $angajat){
//    echo $angajat->get_nume() . "<br>";
//}
//
//echo "Angajati sub managerul " . $manager->get_nume() . " :<br>";
//foreach ($manager->get_angajati() as $angajat){
//    echo $angajat->get_nume() . "<br>";
//}