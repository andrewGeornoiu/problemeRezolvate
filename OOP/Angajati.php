<?php

abstract class Angajat
{
    protected $nume;
    protected $email;
    protected $telefon;

    public function __construct($val_nume, $val_email, $val_telefon) {
        $this->nume = $val_nume;
        $this->email = $val_email;
        $this->telefon = $val_telefon;
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

}

abstract class Superior extends Angajat
{
    protected $angajati;
    protected $decisive_power = false;
    protected $exe_power = false;

    function __construct($val_nume, $val_email, $val_telefon, $val_decisive_power, $val_exe_power){
        parent::__construct($val_nume, $val_email, $val_telefon);
        $this->decisive_power = $val_decisive_power;
        $this->exe_power = $val_exe_power;
    }

    //getter & setter decisive power
    abstract public function get_decisive_power();
    abstract public function set_decisive_power($val_decisive_power);

    //getter & setter exe power
    abstract public function get_exe_power();
    abstract public function set_exe_power($val_exe_power);

}

class Director extends Superior{
    private $stakeholders;

    function __construct($val_nume, $val_email, $val_telefon, $val_decisive_power, $val_exe_power, $val_stakeholders){
        parent::__construct($val_nume, $val_email, $val_telefon, $val_decisive_power, $val_exe_power);
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
}

class HR extends Angajat{

    private $angajati_recrutati;

    function __construct($val_nume, $val_email, $val_telefon, $val_angajati_recrutati){
        parent::__construct($val_nume, $val_email, $val_telefon);
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
}

class Programator extends Angajat{

    private $limbaj_programare;

    function __construct($val_nume, $val_email, $val_telefon, $val_limbaj_programare){
        parent::__construct($val_nume, $val_email, $val_telefon);
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
}

$director = new Director("Andrei", "andrei@emag.ro", "0749481356", true, false, 30);
$manager = new Manager("Lavinia", "lavinia@emag.ro", "0756481876", false,true);
$programator = new Programator("Ion", "ion@emag.ro", "0785765432", "PHP");
$recruter = new HR("Ioana", "ioana@emag.ro", "0784999345", 4);

echo "Director: " . $director->get_nume() . "<br>";
echo "Manager: " . $manager->get_nume() . "<br>";
echo "Programator: " . $programator->get_nume() . "<br>";
echo "HR: " . $recruter->get_nume() . "<br>";

