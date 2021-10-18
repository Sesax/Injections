<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
<?php 
    if( isset($_SESSION['login']) ) {
        $dsn = 'mysql:dbname=robot;host=127.0.0.1:3307';
        $dbUser = 'root';
        $dbPwd = '';
        try {

            $db = new PDO($dsn, $dbUser, $dbPwd);

            $login = $_SESSION['login'];
            echo "Bienvenue ".$login."<br>";

            $sql = "SELECT id FROM user WHERE identifiant=:login";
            $req = $db->prepare($sql);
            $req->execute([":login" => $login]);
            $res = $req->fetch();
            $id = $res['id'];

            $sql = "SELECT * FROM fiche WHERE createur=:id";
            $req = $db->prepare($sql);
            $req->execute([":id" => $id]);
            $result = $req->fetchAll();

?>

            <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">

<?php 

            foreach ($result as $value) {
                echo '
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="data:image/jpeg;base64,'.base64_encode($value['plan']).'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$value['titre'].'</h5>
                            <p class="card-text">'.$value['description'].'</p>
                        </div>
                    </div>
                </div>
                ';
            }

?>

            </div>
            </div>

<?php 

            echo "<br>";

        } catch (PDOException $e) {
            
        }
?>
    <form action="addFiche.php" method="POST">
        <input type="submit" value="addFiche" />
    </form>
    <form action="deco.php" method="POST">
        <input type="submit" value="Deconnexion" />
    </form>
<?php 
    } else {
?>
    <fieldset>
    <legend>Connexion</legend>
        <form action="traitement.php" method="POST">
            <label>Login</label>
            <input type="text" name="identifiant">
            <br>
            <label>Mot de passe</label>
            <input type="password" name="mdp">
            <br>
            <input type="submit" value="Connexion" />
        </form>
    </fieldset>

<?php } ?>

</body>
</html>