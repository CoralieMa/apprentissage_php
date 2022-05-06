<?php
require_once("14_data_base_controleur.php");
function visualisation($tab, $id){
                foreach($tab as $row) {
                    if ($id == $row["use_id"]){
                        echo "<tr><form action='14_data_base_controleur.php' method='post'>";
                        echo "<td><input type='text' name='nom' value='".$row["use_nom"]."'></td>";
                        echo "<td><input type='text' name='prenom' value='".$row["use_prenom"]."'></td>";
                        echo "<td><input type='date' name='ddn' value='".$row["use_ddn"]."'></td>";
                        echo "<td>
                                <select name='genre' value='".$row["use_sexe"]."'>
                                <option value='f' >Femme</option>
                                <option value='h' >Homme</option>
                                <option value='a' >Autre</option>
                            </td>";
                        echo "<td><input type='password' name='mdp' value='".$row["use_pwd"]."' ></td>";
                        echo "<input type='hidden'name='id' value='".$row["use_id"]."'>";
                        echo     "<td>
                                <input type='submit' name='modif2' value='Ajouter'>
                        </td></form></tr>";
            
                    }
                    else{
        	    	echo "<tr><td>".$row["use_nom"]."</td>";
                    echo "<td>".$row["use_prenom"],"</td>";
                    echo "<td>".$row["use_ddn"],"</td>";
                    echo "<td>".$row["use_sexe"],"</td>";
                    echo "<td>".$row["use_pwd"],"</td>";
                    echo "<td><form action='14_data_base_controleur.php' method='post'>";
                    echo "<input type='submit' name='del' value='Delete'>
                            <input type='submit' name='mod' value='Modify'>";
                    echo "<input type='hidden'name='id' value='".$row["use_id"]."'>";
                    echo "</form></td></tr>";
        	    }
            }
        }  
?>