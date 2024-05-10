<?php
// tableaux

$tab =["a","b","c"];
echo $tab[1];
$tab[3]="d";// $tab[count($tab)="D"];

for($i=0;$i<count($tab);$i++){
    for($j=0;$j<count(tab[$i]);$j++){
        echo $tab[$i][$j];
    }
}
foreach($tab as $value){
    echo $value
}

// tableau associatif

$tab=["case1"=>"A","case2"=>"B","case3"=>"C","case4"=>"D"];

foreach ($tab as $key => $value){
    echo $key." ".$value;
};
$tab["case4"="D"];

// fonctions

function addition($a,$b){
    $somme = 0;
    $somme = $a + $b;
    return $somme;
}
echo addition(1,2);
echo addition($val1,$val2);
// une fonction renvoie un résultat, une procédure non.

// formulaire






?>