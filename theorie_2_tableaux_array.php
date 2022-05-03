<DOCTYPE html>
<html lang=eng>
<head>
	<meta charset="UTF-8">
	<title>Tableau</title>
</head>
<body>

	<h2>Tableaux indicés</h2>

		<?php //Tableaux indicés
			$array=[]; // création d'un tab vide, indicé
			$array[0]=2; // ajout d'un 1er élé indice 0
			$array[]="salut"; // ajout d'un 2e élé indice 1
			$array[]=true;
			$array[]=[1,4,7]; // ajout d'un sous-tab littéral indice 3
			//$array[]=array(1,4,7); // idem
			$array[10]="fin";
			echo 'résultat du var_dump <br/>';
			var_dump($array); echo 'Résultat du count($array) : ',count($array),"<br/>";
			// faire l'équiv du var_dump
			echo 'Refaire le var_dump par programmation : <br/>';
			$i=0;
			$cpt=0;
			while($cpt<count($array)){
				if (isset($array[$i])){ // si l'élément n'existe pas, renvoie false => passera au suivant
					echo "indice $i : ";
					if(is_array($array[$i])){
						$j=0;
						echo "Sous-tab : <ul>";
						while($j<count($array[$i])){
							echo "<li>indice $j : ",$array[$i][$j],"</li>"; // postulat qu'un seul niveau de sous-tab
							$j++;
						}
						echo "</ul>fin sous-tab <br/>";
					}else echo $array[$i],"<br/>";
				} else $cpt--; // sera contré par ce qui suit
				$i++; $cpt++;
			} 
		?>
		<hr>
		<h2>Tableaux associatifs</h2>
		<?php // Tableaux associatifs
			$array = [
			"nom"=>"Boogaerts",
			"prenom"=>"Denis",
			]; // création d'un tab associatif littéral, écrase le précédent indicé
			echo $array["nom"],'<hr>'; 
			$array["nbre enfants"]=1; //ajout puisque inexistant d'une clef valeur
			$array[5]= [2,4,6]; // ajout d'un élé d'indice 5 qui est un sous-tab
			$array[]="fin";     // donc indice 6 
			echo 'résultat du var_dump <br/>';
			var_dump($array);   // fct qui affiche tout type de tab
			
			echo 'Refaire le var_dump par programmation avec le foreach : <br/>';
		
			//Foreach gère les 'trous' automatiquement, applicable également aux tab indicés
			foreach($array as $cle => $valeur){
				echo "clef : $cle : ";
				if (is_array($valeur) ){
					echo "<br/>";
					foreach($valeur as $cle2 => $valeur2){
						
						echo "Sous clef : $cle2 : $valeur2 <br>";}		
				}else
				echo $valeur."<br>"; 	
			}
				
		?>	

</body>
</html>