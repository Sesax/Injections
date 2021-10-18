<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Fiches</title>
</head>
<body>
    <div class="container">
        <form action="fiche.php" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text" placeholder="Titre" name="titre" id="titre">
            <input class="form-control" type="text" placeholder="Description" name="description" id="description">
            <input class="form-control" type="date" placeholder="Date d'ajout" name="date_ajout" id="date_ajout">
            <input class="form-control" type="file" placeholder="Plan" name="plan" id="plan">
            <input class="form-control" type="text" placeholder="Temps de réalisation" name="temps_de_realisation" id="temps_de_realisation">
            <input class="form-control" type="text" placeholter="Complexite" name="complexite" id="complexite">
            <button class="btn btn-primary" type="submit">Ajouter une fiche</button>
        </form>
    </div>