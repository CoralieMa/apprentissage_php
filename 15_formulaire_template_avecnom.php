<?php

//declarations 

$nom=null;
$nom_valide=false;
$nom_requis=false;
$nom_max=false;
$nom_first_letter=false;
$prenom=null;
$prenom_valide=true;
$prenom_max=false;
$mdp=null;
$mdp_requis=false;
$mdp_valide=false;
$sexe="F";
$permis=[];
$pays = "none";
$pays_valide=false;
$commentaire="";
$valide=false;


if (isset($_POST["nom"])){	
	$nom=$_POST["nom"] ;
}
if (!is_null($nom)){	
	$nom=trim($nom); 			
	//si $nom est null, trim renvoie ""!!!!!!
	$nom_requis= ($nom !=="");  
	//!="" faux si $nom est null ;  !=="" vrai si $nom est null
	$nom_max=strlen($nom)<=6;   
	//vrai si $nom est null
	$nom_first_letter= ($nom =='') ? true : mb_strpos("ABCDEFGHIJKLMNOPQRSTUVWXYZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝ",mb_strtoupper(mb_substr($nom, 0,1)))!==false; 

	//vrai si $nom est null
	//mb_strpos() : true si trouvé, false sinon
	//mb_strpos n'accepte pas chaine vide => ($nom =='') ? true : true car '' donc ne commence pas par une autre lettre que caract.

	}

if (isset($_POST["prenom"])){	
	$prenom=$_POST["prenom"];
}

if (!is_null($prenom)){
	$prenom_max=strlen($prenom)<=6;
}

if (isset($_POST["password"])){	
	$mdp=$_POST["password"] ;
}

if (!is_null($mdp)){
	$mdp_valide= ($mdp !=="");
}

if (isset($_POST["sexe"])){	
	$sexe=$_POST["sexe"] ;
}

if (isset($_POST["permis"])){
    $permis=$_POST["permis"] ;
}

if (isset($_POST["pays"])){	
	$pays=$_POST["pays"] ;
}

if ($pays != "none"){
	$pays_valide=true;
}

if (isset($_POST["commentaire"])){	
	$commentaire=$_POST["commentaire"] ;
}

$nom_valide= $nom_requis && $nom_max && $nom_first_letter;
$prenom_valide =$prenom_max;
$valide=$nom_valide && $prenom_valide && $mdp_valide && $pays_valide;

if (isset($_POST["reset"])){
	$valide = false;
	$nom=null;
	$prenom=null;
	$mdp=null;
	$sexe="F";
	$commentaire="";
}
/*if ($valide) {
	//Doit être fait avant toute écriture!!!!
	header("Location:ok.php");
}*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">

	<title>formulaire2</title>

	<style>.error{color:red;}</style>
</head>
<body>
	<?php
	if(!$valide){
	?>
	<form action="15_formulaire_template_avecnom.php" method="post">
		<label for="nomid">nom<span class="sup"></span>
		<input type="text" name="nom" id="nomid" value="<?php echo $nom; ?>">
		<div class="contraintes">
			<!--span class=" item required error"> test </span--> <!-- un élé peut avoir plusieurs classes -->
			<span class=" item required <?php if(!is_null($nom) && $nom_requis!==true) echo "error";?>"> requis  </span>
			<span class=" item maxlength <?php if(!is_null($nom) && $nom_max!==true) echo "error";?>"> Max.6 caractères</span>
			<span class=" item firstletter <?php if(!is_null($nom) && $nom_first_letter!==true) echo "error";?>"> Le premier caractère doit être une lettre  </span>

		</div>
</label>
<br>
<br>
<label for="prenomid">prenom<span class="sup"></span>
		<input type="text" name="prenom" id="prenomid" value="<?php echo $prenom; ?> ">
			<div class="contraintes">
			<span class=" item maxlength <?php if(!is_null($prenom) && $prenom_max!==true) echo "error";?>"> Max.6 caractères</span>
			</div>
</label>
<br>
<br>

<label for="password">password<span class="sup"></span>
		<input type="password" name="password" id="passwordid" value="<?php echo $mdp; ?>">
		<div class="contraintes">
		<span class=" item required <?php if(!is_null($mdp) && $mdp_requis!==true) echo "error";?>"> requis  </span>
		</div>

</label>
<br>

<br>

	<label for="sexeIdF">Femme</label> :
		<input type="radio" name="sexe" id="sexeIdF" value="F" checked> 
		<label for="sexeIdH">Homme</label> :
		<input type="radio" name="sexe" id="sexeIdH" value="H" ></label>

		<div class="contraintes">
		<span class="item required"> requis </span>
		<!-- avec un checked => toujours une réponse -->
		</div>
		
		<br>
<br>

		<label for="permis"> A:</label> 
		<input type="checkbox" name="permis[]" id="permis" value="A" <?php if($permis!=[] || array_search("A", $permis)!==false){echo "checked";} ?>> 
		<label for="permis2"> B:</label> 
		<input type="checkbox" name="permis[]" id="permis2" value="B" <?php if($permis!=[] || array_search("B", $permis)!==false){echo "checked";} ?>>
		<label for="permis3"> C:</label> 
		<input type="checkbox" name="permis[]" id="permis3" value="C" <?php if($permis!=[] || array_search("C", $permis)!==false){echo "checked";} ?>>
<br>
<br>
		
	Pays:	<select name="pays">
			<option value="none" >Aucun</option>
			<option value="be" >Belgique</option>
			<option value="fr" >France</option>
			<option value="de" >Allemagne</option>
			
		</select>
		<div class="contraintes">
			<span class=" item required <?php if($pays == "none" && isset($_POST["pays"])) echo "error";?>"> requis  </span>
		</div>

<br>
<br>

		<textarea name="commentaire" cols=30 rows=10>
			
		</textarea>
		<br>
	<br>
	
<br>

		<input type="submit" value="soumettre">
		<input type="submit" name='reset' value="reset">
		<!--input type="reset" value="reset"-->
		<!-- reset remet les values de départ depuis chargement de la page => si il y a eu soumission, comme les valeurs sont écrites dans les champs, elles deviennent valeurs de départ--> 
</form>
	<?php
	}
	else{
	?>
	<div>
		<span>Nom :</span>
		<span><?php echo $nom ?></span>
		<br>
		<br>
		<span>prenom :</span>
		<span><?php echo $prenom ?></span>
		<br>
		<br>
		<span>password :</span>
		<span><?php echo $mdp ?></span>
		<br>
		<br>
		<span>Sexe :</span>
		<span><?php echo $sexe ?> </span>
		<br>
		<br>
		<span>Permis :</span>
		<span>
		<?php echo"<ul>";
		foreach ($permis as $key =>$drive) {
			echo "<li> $drive </li>";

		}
		echo "</ul>";
		?> </span>
		<br>
		<br>
		<span>Pays :</span>
		<span><?php $pays ?> </span>
		<br>
		<br>
		<span>Commentaire:</span>
		<span><?php echo $commentaire ?> </span>
	</div>
	<?php
	}
	?>
</body>
</html>