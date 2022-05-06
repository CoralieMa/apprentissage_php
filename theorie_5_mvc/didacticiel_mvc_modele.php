<?php
function tirage(){
    $calc=[];
    $i=1;
    $op="";
    $nb1=0;
    $nb2=0;
    $rep=0;
    while($i<=10){
        $nb1=rand(0,10);
        $nb2=rand(0,10);
        $op=rand(1,4);
        switch ($op) {
            case 1:
                $op="+";
                $rep=$nb1+$nb2;
                break;
            case 2:
                $op="-";
                $rep=$nb1-$nb2;
                break;
            case 3:
                $op="*";
                $rep=$nb1*$nb2;
                break;
            case 4:
                $op="/";
                if($nb2==0){
                    $nb2=rand(1,10);
                }
                $rep=$nb1/$nb2;
                break;
        }
        $calc[$i]=[$nb1,$op,$nb2,$rep,null];
        $i++;
    }
    return $calc;
}


?>

