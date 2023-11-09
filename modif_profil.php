<?php require 'include/header.php';?>
<title>Profil</title>
</head><body>
</div>
<?php 
session_start();

if(isset($_POST['modification']) AND isset($_SESSION['id']))
{ 
    $id = $_SESSION['id'];

    if(empty($_POST["username"]) || !preg_match('/[a-aZ-Z0-9]+/', $_POST["username"]))
{
    $message = "Votre username doit etre une chaine de caractères !";
}
elseif(empty($_POST["password"]) || $_POST["password"] != $_POST["password2"])
{
    $message = "Entrer un mot de passe valide";
}
else
{
    require_once 'include/start_bdd.php';


    $req = $bdd->prepare('SELECT * FROM menbres.table_menbres WHERE username = :username');

    $req->bindvalue(':username', $_POST['username']);
    $req->execute();
    $result = $req->fetch();

    if($result)
    {
        $message = 'Le nom d\'utilisateur existe déjas';
    }
    else
    {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $requete = $bdd->prepare('UPDATE menbres.table_menbres SET username = :username,
        password = :password WHERE id = :id');
    
        $requete->bindvalue(':username', $_POST['username']);
        $requete->bindvalue(':password', $password);
        $requete->bindvalue(':id', $id);
    
        $requete->execute();


        header('location: index.php');
    }
}}
?>

<div id="login">
        <h1 class="text-center text-white pt-5">Inscription</h1>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">


                    <center><div class="container" style="background-color:#FB6969;">
                        <font color="#8B0505"> <?php if(isset($message))echo $message; ?> </font>
                        </div></center>

                        <center><div class="container" style="background-color:#95D588;">
                        <font color="#115702"> <?php if(isset($message1))echo $message1; ?> </font>
                        </div></center>


                        <form id="login-form" class="form" action="" method="post">

                        <div class="form-group">
                            <label for="username" class="text-info">Username</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        
                        <div class="form-group">
                            <label for="password" class="text-info">Mot de passe</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password2" class="text-info">Confirmation du mot de passe</label><br>
                            <input type="password" name="password2" id="password2" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="modification" class="btn btn-info btn-md" value="modifier">
                            <a href="index.php" class="btn btn-info btn-md">Se connecter</a>

                        </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
