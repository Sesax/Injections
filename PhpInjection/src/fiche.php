<?php

session_start();

$dsn = 'mysql:dbname=robot;host=127.0.0.1:3307';
$dbUser = 'root';
$dbPwd = '';

$titre = $_POST['titre'];
$description = $_POST['description'];
$date_ajout = $_POST['date_ajout'];
$temps_de_realisation = $_POST['temps_de_realisation'];
$complexite = $_POST['complexite'];

$login = $_SESSION['login'];

try {
    $db = new PDO($dsn, $dbUser, $dbPwd);

    $sql = "SELECT id FROM user WHERE identifiant=:login";
	$req = $db->prepare($sql);
	$req->execute([":login" => $login]);
	$res = $req->fetch();
	$id = $res['id'];

	if (isset($_FILES["plan"])){
		$img_blob = file_get_contents($_FILES['plan']['tmp_name']);
	}

    $sql = "INSERT INTO fiche (titre, description, date_ajout, plan, tps_rea, complexite, createur)
    VALUES (:titre, :description, :date_ajout, :plan, :temps_de_realisation, :complexite, :id)";
    $req = $db->prepare($sql);
    $req->execute(array(
    			':titre'=> $titre,
    			':description'=> $description,
    			':date_ajout'=> $date_ajout,
    			':plan'=> $img_blob,
    			':temps_de_realisation'=> $temps_de_realisation,
    			':complexite'=> $complexite,
    			':id'=> $id));

    echo "New record created successfully";

    header('location: index.php');

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>