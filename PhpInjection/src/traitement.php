<?php

session_start();

if (isset($_POST['identifiant'])) {
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];
    if (count(connect($identifiant, $mdp)) == 1){
        $_SESSION["login"] = $identifiant;
        header('location: index.php');
    } else {
        echo 'Connexion échouée';
    }
}

function connect($identifiant, $mdp){
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];

    $dsn = 'mysql:dbname=robot;host=127.0.0.1:3307';
    $dbUser = 'root';
    $dbPwd = '';
    try {
        $db = new PDO($dsn, $dbUser, $dbPwd);

        $sql = "SELECT identifiant FROM user WHERE identifiant=:identifiant AND mdp=:mdp";
        $req = $db->prepare($sql);
        $req->execute(array(":identifiant" => $identifiant, ":mdp" => $mdp));
        $result = $req->fetchAll();
        return $result;
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' .$e->getMessage();
    }
}
?>