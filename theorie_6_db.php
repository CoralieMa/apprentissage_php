
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Utilisateurs</title>
</head>

<body>
    <?php
    try{

        $dbh = new PDO(
            "mysql:dbname=theoriedb;host=localhost;port=3308",
            "root",
            "",
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );

        // Le passage de paramètre (insert, update, delete, select):
        // Si passage de paramètres avec données du user ET que dans un même script php, interrogations successives, alors bindParam() avec ajout du 3e argument (type de données attendues pour la secu), sinon bindValue()
        //https://www.php.net/manual/fr/pdo.constants.php

        //1) un seul appel dans script donc bindValue()
        $sql = "insert into user (use_id,use_nom,use_prenom,use_ddn,use_sexe,use_pwd) values (
            default, 
            :nom,
            :prenom,
            :ddn,
            :sexe,
            md5(:mdp))"; // => pwd encrypté, pas possible de le décrypter mais si md5(pwd de connexion) == au pwd crypté dans db ok : avec md5 sur même mot on obtient la même chose
        $nom="albertine";
        $prenom="dede";
        $date="2020-05-20";
        $sexe="f";
        $pwd="mot";
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindValue('nom', $nom, PDO::PARAM_STR); //3e argument facultatif mais secure
        $stmt -> bindValue('prenom', $prenom, PDO::PARAM_STR);
        $stmt -> bindValue('ddn', $date, PDO::PARAM_STR); //la date est une chaine...
        $stmt -> bindValue('sexe', $sexe, PDO::PARAM_STR);
        $stmt -> bindValue('mdp', $pwd, PDO::PARAM_STR);
        // si données numérique entière PDO::PARAM_INT, pour décimal pas de type... donc faire PDO::PARAM_STR
        $stmt -> execute(); 
        //Bind sur valeurs et donc évaluation de la valeur de celles-ci au moment du bindValue(), si la valeur des variables change par la suite, elles ne seront pas considérées => one shot, pas d'invocation multiples dans un même script ;
        //2) invocations multiples

        $sql = "insert into user (use_id,use_nom,use_prenom,use_ddn,use_sexe,use_pwd) values (
            default, 
            :nom,
            :prenom,
            :ddn,
            :sexe,
            md5(:mdp))"; // => pwd encrypté, pas possible de le décrypter mais si md5(pwd de connexion) == au pwd crypté dans db ok : avec md5 sur même mot on obtient la même chose
        $nom="albertine1";
        $prenom="dede";
        $date="2020-05-20";
        $sexe="f";
        $pwd="mot";
        $stmt = $dbh -> prepare($sql);
        $stmt -> bindParam('nom', $nom, PDO::PARAM_STR); //3e argument facultatif mais secure
        $stmt -> bindParam('prenom', $prenom);
        $stmt -> bindParam('ddn', $date);
        $stmt -> bindParam('sexe', $sexe);
        $stmt -> bindParam('mdp', $pwd);
        $stmt -> execute(); 
        //Bind sur variables et donc évaluation de la valeur de celles-ci au moment du execute(), pour un usage d'invocations multiples au sein d'un même script;
        $nom="albertine2";
        $stmt -> execute(); //donc pas besoin de refaire bindParam(), exécute une 2e fois avec la nouvelle val de $nom
        
        // A proscrire, la solution suivante pour des raisons de sécurité. Imaginons un user qui arriverait à mettre dans $id (venant d'un formulaire par exemple, sans contrôle de la part du programmeur) "0 or 1=1" => delete de tout!!!! Pb de sécu par injection SQL 

        //$sql = "delete from user where use_id=$id;";
        //$dbh->exec($sql);


        $sql = "SELECT * FROM USER";
        $stmt = $dbh -> prepare($sql);
        //faire binParam() ou bindValue() si paramètres
        //3. Exécution de la requête
        $stmt->execute(); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //donc le tableau associatif résultant prendra comme clef les noms des colonnes
        $tab=$stmt->fetchAll(); //pour remplir le tableau du set résultat
        foreach($tab as $row) {
            echo $row["use_id"]," ",$row["use_nom"]," ",$row["use_prenom"]," ",$row["use_ddn"]," ",$row["use_sexe"]," ",$row["use_pwd"],"<br>";
        }

    }catch (Exception $ex) {
    die("ERREUR FATALE : ". $ex->getMessage().'<form><input type="button" value="Retour" onclick="history.go(-1)"></form>');
    }
   ?>
</body>
</html>