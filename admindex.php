//Page d'administration du site




<?php

// pour utiliser les variables de session , il faut les déclarer péalablement
session_start();


//definition de mes variables de session
$user='fabien@apprendphp';
$password='123456789';

//Verification du formulaire
if (isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username&&$password){
        if ($username==$user&&$password==$password){


            //definition d'une variable session afin qu'elle soit valable sur toutes les pages du site
            $_SESSION['username'] = $username;
            header('Location : admin.php');

        }else{
            echo 'erreur Identifiant ou Mot de passe';
        }

        }else{

        echo'Veuillez remplir tous les champs du formulaire !';
    }
};


?>




<!--  style -->

<link href="../style/stylesheet.css" type="text/css" rel="stylesheet"/>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

<h1>Administration - Connexion</h1>

<!--  formulaire de connexion -->

<!--  email de connexion -->
<form  action="" method="POST" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
    <label for="email" class="sr-only">E-mail</label>
    <input type="email" id="email" class="form-control" placeholder="e-mail" required autofocus>


    <!--  mdp de connexion -->
    <label for="password" class="sr-only">Mot de passe</label>
    <input type="password" id="password" class="form-control" placeholder="Mot de passe" required>


    <!--  rester connecté -->
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="Se souvenir de moi"> Rester connecté
        </label>
    </div>
    <!--  bouton de validation -->
    <button class="btn btn-lg btn-primary btn-block" type="submit">Se Connecter</button>
</form>
