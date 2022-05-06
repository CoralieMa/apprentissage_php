<?php
require_once("didacticiel_mvc_modele.php");

session_start();
//session_destroy();
if(isset($_SESSION["calculs"])){
    $calculs=$_SESSION["calculs"];
    $cpt=$_SESSION["cpt"];
}else{
    $calculs=tirage();
    $_SESSION["calculs"]=$calculs;
    $cpt=1;
    $_SESSION["cpt"]=1;

}
$ret="";
if(isset($_POST["action"])){
    if($_POST["action"]!="Recommencer"){
        $rep=$_POST["rep"];
        $_SESSION["calculs"][$cpt][4]=$rep;
        $calculs[$cpt][4]=$rep; //pour le cas ou click sur bilan
        $action=$_POST["action"];
    }else{
        $action="Reset";
    }
    switch ($action) {
        case 'Reset':
            $calculs=tirage();
            $_SESSION["calculs"]=$calculs;
            $cpt=1;
            break;
        case 'Précédent':
            if ($cpt==1){
                $cpt=10;
            }else{
                $cpt--;    
            }
            break;
        case 'Suivant':
            if ($cpt==10){
                $cpt=1;
            }else{
                $cpt++;    
            }
            break;
        case 'Bilan':
            $ret="bilan";
            

        break;
            
        default:
            # code...
            break;
    }
     $_SESSION['cpt']=$cpt;
}
$nb1=$calculs[$cpt][0];
$nb2=$calculs[$cpt][2];
$op=$calculs[$cpt][1];
$rep=$calculs[$cpt][4];

require_once("didacticiel_mvc_template.php");
?>
