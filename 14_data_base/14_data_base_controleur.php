<?php 
require_once("14_data_base_modele.php");
$tab=[];
$modif=false;
$id=null;
try{
	$dbh=connexion();
	

	if(isset($_POST["ajout"])){
		if(isset($_POST["nom"])){
			$nom=$_POST["nom"];
		}
		if(isset($_POST["prenom"])){
			$prenom=$_POST["prenom"];
		}
		if(isset($_POST["ddn"])){
			$date=$_POST["ddn"];
		}
		if(isset($_POST["genre"])){
			$sexe=$_POST["genre"];
		}
		if(isset($_POST["mdp"])){
			$pwd=$_POST["mdp"];
		}
		ajouter($dbh, $nom, $prenom, $date, $sexe, $pwd);
	}

	if(isset($_POST["del"])){
		$id = $_POST["id"];
		supprimer($dbh, $id);
		$id=null;
	}

	if(isset($_POST["mod"])){
		$id = $_POST["id"];
	}

	if(isset($_POST["modif2"])){
		$id = $_POST["id"];
		if(isset($_POST["nom"])){
			$nom=$_POST["nom"];
		}
		if(isset($_POST["prenom"])){
			$prenom=$_POST["prenom"];
		}
		if(isset($_POST["ddn"])){
			$date=$_POST["ddn"];
		}
		if(isset($_POST["genre"])){
			$sexe=$_POST["genre"];
		}
		if(isset($_POST["mdp"])){
			$pwd=$_POST["mdp"];
		}
		modifier($dbh, $id, $nom, $prenom, $date, $sexe, $pwd);
		$id=null;
	}

	$tab=liste($dbh);
	    
}
    catch(Exception $ex){
    	die("ERREUR FATALE : ". $ex->getMessage().'<form><input type="button" value="Retour" onclick="history.go(-1)"></form>');
    }
require_once("14_data_base_template.php");
?>