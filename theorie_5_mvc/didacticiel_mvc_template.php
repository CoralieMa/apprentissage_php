<?php

function bilan($calc){
    $ret="";
    $total=0;
    foreach ($calc as $key => $value) {
        $point=($value[3]==$value[4])?1:0;
        $total=$total+$point;
        $ret.=$value[0].$value[1].$value[2]."=".$value[4]." score ".$point."<br>";
    }
    $ret.="Score total :".$total."/10";
    $ret.=' <form action="didacticiel_mvc_controleur.php" method="POST">
         <input type="submit" name="action" value="Recommencer">
    </form>';
    return $ret;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trouve</title>
</head>
<body>
    <h1>Didacticiel</h1>
    <?php if($ret==""){?>
    <h5>Calculs <?php echo $cpt?>/10</h5>
      
    <form action="didacticiel_mvc_controleur.php" method="POST">
        <?php echo $nb1, $op, $nb2, "="?>
        <input type="number" name="rep" step="any" value="<?php echo $rep;?>"><br><br>
        <input type="submit" name="action" value="Précédent">
        <input type="submit" name="action" value="Bilan">
        <input type="submit" name="action" value="Suivant">
        <input type="submit" name="action" value="Reset">
    </form>
    <?php }else{
        echo bilan($calculs);
    }?>
</body>
</html>