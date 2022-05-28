$incasari = [0.5, 5, 0.1, 1, 0.5, 0.5, 0.5, 0.5, 0.5, 0.1];

$count50 = 0;
$count10 = 0;
$count1 = 0;
$count5 = 0;
    
foreach ($incasari as $nr => $bani){
    
    if ($bani === 0.5){
        $count50++;
        $bani50= $bani;
        $bani50 = "50 de bani";
        
    }elseif ($bani === 0.1) {
        $count10++;
        $bani10 = $bani;
        $bani10 = "10 de bani";
        
    }elseif ($bani === 1) {
        $count1++;
         $bani1 = $bani;
         $bani1 = "un leu";

    }elseif ($bani === 5) {
        $count5++;
        $bani5 = $bani;
        $bani5 = "5 lei";
    }
    

}

echo "S-au folosit: ";
echo "\n";
echo $count50 . " monede de " . $bani50 . "\n";
echo $count10 . " monede de " . $bani10 . "\n";
echo $count1 . " bancnota de " . $bani1 . "\n";
echo $count5 . " bancnota de " . $bani5 . "\n";