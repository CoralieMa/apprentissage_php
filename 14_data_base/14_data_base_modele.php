<?php 
	function connexion(){
	$dbh = new PDO(
            "mysql:dbname=theoriedb;host=localhost;port=3308",
            "root",
            "",
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
	return $dbh;
}

	function liste($dbh){
		$sql = "SELECT * FROM USER";
	        $stmt = $dbh -> prepare($sql);
	        //faire binParam() ou bindValue() si paramètres
	        //3. Exécution de la requête
	        $stmt->execute(); 
	        $stmt->setFetchMode(PDO::FETCH_ASSOC); //donc le tableau associatif résultant prendra comme clef les noms des colonnes
	        $tab=$stmt->fetchAll();
	        return $tab;
	}

	function ajouter($dbh, $nom, $prenom, $date, $sexe, $pwd){
		$sql = "insert into user (use_id,use_nom,use_prenom,use_ddn,use_sexe,use_pwd) values (
            default, 
            :nom,
            :prenom,
            :ddn,
            :sexe,
            md5(:mdp))";

        //mettre les bonnes valeurs dans les paramètres
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindValue('nom', $nom, PDO::PARAM_STR); //3e argument facultatif mais secure
        $stmt -> bindValue('prenom', $prenom, PDO::PARAM_STR);
        $stmt -> bindValue('ddn', $date, PDO::PARAM_STR);
        $stmt -> bindValue('sexe', $sexe, PDO::PARAM_STR);
        $stmt -> bindValue('mdp', $pwd, PDO::PARAM_STR);
        $stmt -> execute(); 
	}

    function supprimer($dbh, $id){
        $sql = "delete from user where use_id= (:id)";
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindValue('id', $id, PDO::PARAM_STR);
        $stmt -> execute();
    }

    function modifier($dbh, $id, $nom, $prenom, $date, $sexe, $pwd){
        $sql = "update user set use_nom = :nom ,use_prenom = :prenom , use_ddn= :ddn , use_sexe = :sexe , use_pwd = :pwd where use_id= (:id)";
            $stmt = $dbh -> prepare($sql);
            $stmt -> bindValue('nom', $nom, PDO::PARAM_STR);
            $stmt -> bindValue('prenom', $prenom, PDO::PARAM_STR);
            $stmt -> bindValue('ddn', $date, PDO::PARAM_STR);
            $stmt -> bindValue('sexe', $sexe, PDO::PARAM_STR);
            $stmt -> bindValue('pwd', $pwd, PDO::PARAM_STR);
            $stmt -> bindValue('id', $id, PDO::PARAM_STR);
            $stmt->execute(); 
    }
 ?>
