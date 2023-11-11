<?php require 'include/header.php'; ?>
<title>Profil</title>
</head><body>
</div>
<?php
    
    session_start();
    if(isset($_SESSION['id']))
    {
?>
    <div id="login">
        <h1 class="text-center text-white pt-5">Vos commentaires</h1>
        <h5 class="text-center text-white pt-5">Tous vos commentaires nous intérèsses merci de les  poster : </h5>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">


                <table>
                    <tr>
                        <td>Nom d'utilisateur: </td><td><?=$_SESSION['username'] ?></td>
                    </tr>
                    
                    <tr>
                        <td>Commentaires:  </td><td><?=$_SESSION['commentaire'] ?></td>
                    </tr>

                </table>

<?php

    }
?>


                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>                 