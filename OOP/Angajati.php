<?php

abstract class Angajat
{
    protected $nume;
    protected $email;
    protected $telefon;
    protected $salariu;
    protected $departament;


    public function __construct($val_nume, $val_email, $val_telefon, $val_salariu, $val_departament) {

        if (preg_match('~[0-9]+~', $val_nume)) {
            echo "Numele invalid! (fara numere)";
        }
        elseif (str_word_count($val_nume) < 2){
            echo "Numele invalid! (minim 2 cuvinte";
        }
        else{
            $this->nume = $val_nume;
        }

        if(filter_var($val_email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $val_email;
        }
        else {
            echo "Email invalid";
        }

        if(preg_match('/(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|-)?([0-9]{3}(\s|\.|\-|)){2}$/', $val_telefon)) {
            $this->telefon = $val_telefon;
        }
        else{
            echo "Numar telefon invalid";
        }

        if (!preg_match('~[0-9]+~', $val_salariu)) {
            echo "Salariu trebuie sa contina doar cifre";
        }
        else{
            $this->salariu = $val_salariu;
        }

        if (preg_match('~[0-9]+~', $val_departament)) {
            echo "Numele departamentului nu poate contine numere";
        }
        else{
            $this->departament = $val_departament;
        }

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
        if (preg_match('~[0-9]+~', $val_nume)) {
            echo "Numele invalid! (fara numere, minim 2 cuvinte)";
        }
        elseif (str_word_count($val_nume) < 2){
            echo "Numele invalid! (minim 2 cuvinte)";
        }
        else{
            $this->nume = $val_nume;
        }
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        if(filter_var($val_email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $val_email;
        }
        else {
            echo "Invalid email";
        }
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        if(preg_match('/(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/', $val_telefon)) {
            $this->telefon = $val_telefon;
        }
        else{
            echo "Numarul este invalid";
        }
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
        if (!preg_match('~[0-9]+~', $val_salariu)) {
            echo "Salariul poate contine doar cifre";
        }
        else{
            $this->salariu = $val_salariu;
        }
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
        if (preg_match('~[0-9]+~', $val_departament)) {
            echo "Numele departamentului nu poate contine numere!";
        }
        else{
            $this->departament = $val_departament;
        }
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
        if (preg_match('~[0-9]+~', $val_nume)) {
            echo "Numele invalid! (fara numere, minim 2 cuvinte)";
        }
        elseif (str_word_count($val_nume) < 2){
            echo "Numele invalid! (minim 2 cuvinte)";
        }
        else{
            $this->nume = $val_nume;
        }
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        if(filter_var($val_email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $val_email;
        }
        else {
            echo "Invalid email";
        }
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        if(preg_match('/(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/', $val_telefon)) {
            $this->telefon = $val_telefon;
        }
        else{
            echo "Numarul este invalid";
        }
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
        if (!preg_match('~[0-9]+~', $val_salariu)) {
            echo "Salariul poate contine doar cifre";
        }
        else{
            $this->salariu = $val_salariu;
        }
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        if (preg_match('~[0-9]+~', $val_departament)) {
            echo "Numele departamentului nu poate contine numere!";
        }
        else{
            $this->departament = $val_departament;
        }
    }

    //5% raise
    public function apply_raise($angajat, $dep, $raise){
        if(!is_numeric($raise) || $raise == 0 || $raise < 0 || $raise > 100){
            echo "Format marire salariu invalid";
        }
        else{
            foreach ($angajat as $emp) {
                if ($emp->get_departament() == $dep){
                    $pay = $emp->get_salariu();
                    $pay = $pay + ($pay * ($raise / 100));
                    $emp->set_salariu($pay);
                }
            }
        }
    }
}

class Programator extends Angajat{

//    private $limbaj_programare;
//
//    function __construct($val_nume, $val_email, $val_telefon, $val_limbaj_programare, $val_salariu, $val_departament){
//        parent::__construct($val_nume, $val_email, $val_telefon, $val_salariu, $val_departament);
//        $this->limbaj_programare = $val_limbaj_programare;
//    }

    //getter & setter nume
    public function get_nume()
    {
        return $this->nume;
    }
    public function set_nume($val_nume)
    {
        if (preg_match('~[0-9]+~', $val_nume)) {
            echo "Numele invalid! (fara numere, minim 2 cuvinte)";
        }
        elseif (str_word_count($val_nume) < 2){
            echo "Numele invalid! (minim 2 cuvinte)";
        }
        else{
            $this->nume = $val_nume;
        }
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        if(filter_var($val_email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $val_email;
        }
        else {
            echo "Invalid email";
        }
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        if(preg_match('/(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/', $val_telefon)) {
            $this->telefon = $val_telefon;
        }
        else{
            echo "Numarul este invalid";
        }
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
        if (!preg_match('~[0-9]+~', $val_salariu)) {
            echo "Salariul poate contine doar cifre";
        }
        else{
            $this->salariu = $val_salariu;
        }
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        if (preg_match('~[0-9]+~', $val_departament)) {
            echo "Numele departamentului nu poate contine numere!";
        }
        else{
            $this->departament = $val_departament;
        }
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
        if (preg_match('~[0-9]+~', $val_nume)) {
            echo "Numele invalid! (fara numere, minim 2 cuvinte)";
        }
        elseif (str_word_count($val_nume) < 2){
            echo "Numele invalid! (minim 2 cuvinte)";
        }
        else{
            $this->nume = $val_nume;
        }
    }

    //getter & setter email
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($val_email)
    {
        if(filter_var($val_email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $val_email;
        }
        else {
            echo "Invalid email";
        }
    }

    //getter & setter telefon
    public function get_telefon()
    {
        return $this->telefon;
    }
    public function set_telefon($val_telefon)
    {
        if(preg_match('/(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/', $val_telefon)) {
            $this->telefon = $val_telefon;
        }
        else{
            echo "Numarul este invalid";
        }
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
        if (!preg_match('~[0-9]+~', $val_salariu)) {
            echo "Salariul poate contine doar cifre";
        }
        else{
            $this->salariu = $val_salariu;
        }
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        if (preg_match('~[0-9]+~', $val_departament)) {
            echo "Numele departamentului nu poate contine numere!";
        }
        else{
            $this->departament = $val_departament;
        }
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
        if (preg_match('~[0-9]+~', $val_departament)) {
            echo "Numele departamentului nu poate contine numere!";
        }
        else{
            $this->departament = $val_departament;
        }
    }

    //getter & setter departament
    public function get_departament()
    {
        return $this->departament;
    }
    public function set_departament($val_departament)
    {
        if (preg_match('~[0-9]+~', $val_departament)) {
            echo "Numele departamentului nu poate contine numere!";
        }
        else{
            $this->departament = $val_departament;
        }
    }

}


//$development = new Departamanet("Devs");
//$recrutare = new Departamanet("Recruters");
//
//$programator1 = new Programator("Ion Calota", "ion@emag.ro", "0785765432", "PHP", 5000, $development->get_departament());
//$programator2 = new Programator("Cosmin Ionescu", "cosmin@emag.ro", "0785765432", "PHP", 6600, $development->get_departament());
//$programator3 = new Programator("George Georgescu", "george@emag.ro", "0785765432", "PHP", 11000, $development->get_departament());
//
//
//$recruter1 = new HR("Ioana Anton", "ioana@emag.ro", "0784999345", 4, 4500, $recrutare->get_departament());
//$recruter2 = new HR("Andreea Marin", "andreea@emag.ro", "0784999345", 5, 5000, $recrutare->get_departament());
//
//$director = new Director("Andrei Ioan", "andrei@emag.ro", "0749481356", true, false, 30, array($programator1, $programator2, $programator3), 25000, $development->get_departament());
//$manager = new Manager("Lavinia Popescu", "lavinia@emag.ro", "0756481876", false,true, array($recruter1, $recruter2), 7750, $recrutare->get_departament());

//$recruter1->apply_raise(array($programator1, $programator2, $programator3, $recruter2), "Devs", 5);
//
//echo $programator2->get_nume();
//
//echo $programator1->get_salariu() . "<br>";
//echo $programator2->get_salariu() . "<br>";
//echo $programator3->get_salariu() . "<br>";
//echo $recruter2->get_salariu() . "<br>";


//$director->delete_angajat($programator3->get_nume());
//$director->add_angajat($programator3);
//
//
//echo "Angajati sub directorul " . $director->get_nume() . " :<br>";
//foreach ($director->get_angajati() as $angajat){
//    echo $angajat->get_nume() . "<br>";
//}
//
//echo "Angajati sub managerul " . $manager->get_nume() . " :<br>";
//foreach ($manager->get_angajati() as $angajat){
//    echo $angajat->get_nume() . "<br>";
//}