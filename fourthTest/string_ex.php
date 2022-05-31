<?php

//Ce sintaxa folosim pentru a defini un string in PHP?
 # a si b

 //Care este diferenta intre ghilimele duble si ghilimele simple in PHP?
 # ghilimelele simple nu interpoleaza variabilele, cele duble permit interpolare


//Cum afisam un rand nou in PHP?
# folosim --> \n

//Care dintre cele doua cuvinte este considerat “mai mare”?
# a

//Ce keyword PHP folosim pentru afisarea unui array?
# print_r()

//Se da un string. Sa se afiseze lungimea acelui cuvant.
    $string = 'Andrei';
    echo strlen($string);


//Se considera un camp dintr-ul formular, pentru adresa de email. Sa se scrie un cod
//de “Clean-up” prin care se sterg toate spatiile goale de dinainte si de dupa adresa de
//email.
    $email = ' andrei.geornoiu@gmail.com ';
    echo trim($email);

//Se considera o aplicatie de chat. In aceasta aplicatie sunt doar oameni sensibile,
//carora nu le place sa se tipe. De aceea, se dorest eimplementarea unui program care
//preia mesajele si daca gaseste cuvinte cu majuscule, sa le converteasca la litere mici.
$string = 'ANDREI';

if(ctype_upper($string) == true){
    $toned_down = strtolower($string);
    echo $toned_down;
}else{
    echo $string;
}

//Sa se implementeze o functie care sa preia doua stringuri si sa returneze cate caractere au in comun.
$string1 = 'mare';
$string2 = 'munte';

echo similar_text($string1, $string2);

//Se da un text. Sa se afle daca textul contine cuvantul “maine”.
$string = 'maine ma duc la munte, nu la mare';

if (strpos($string, 'maine') !== false){
    echo "Contine";
}else{
    echo "Nu contine";
}

//Se da o propozitie. Se doreste spargerea acesteia in cuvinte, si returnarea cuvantului cu cea mai lunga lungime
$string = 'maine ma duc la padure nu la mare';

$cuvinte = explode(' ', $string);

$cuvant_lung_lungime = 0;
$cuvant_lung = '';

foreach ($cuvinte as $cuvinte) {
   if (strlen($cuvinte) > $cuvant_lung_lungime) {
      $cuvant_lung_lungime = strlen($cuvinte);
      $cuvant_lung = $cuvinte;
   }
}

echo $cuvant_lung;

//Se da urmatorul paragraph. Sa se rezolve toate problemele legate de
//majuscule/minuscule. Sa se repecte totusi regulile din propizitie ( prima lotera din
//propozitie sa fie mare, substantivele proprii sa fie cu litera mare, etc.).

$text = 'Într-o lume în care TIMPUL este cea mai prețioasă resursă, oamenii încearcă să
profite de cât mai multe ore din cele 24 disponibile în fiecare zi. AIci mă refer la activități
care aduc venit, la activități cu familiamersul la Mall sau simpla relaxare.

Pentru a face rost de cât mai multe ore cu cei dragi, de PLIMBARI în parc sau la muncă,
există o tendința acCentuaTa de a se renunța la unele activități “de-ale casei”, Consumatoare
de timp, cUm ar fi curățenia sau gătitul.
Dacă în ceea ce privește curățenia în casă, angajarea unei resurse externe de încredere nu
prezintă prea multe efecte negative, atunci când vorbim despre alimentație, vorbim despre
sănătatea noastră. Alternativele gătitului sunt reprezentate fie de mâncarea comandată, fie de
ieșirile la RESTAURANT.';








