<?php
session_start();
include_once 'fonction.php';
$bdd = new fonction();

/*code de connexion à la base,
le code est mis dans le header afin que la connnexion à la base de données se fasse pour chaque page */


try {

    // Sous WAMP (Windows)
    $db = new PDO('mysql:host=localhost;dbname=e-commerce website;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);//les noms des champs seront en minuscules
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//les erreurs lanceront des exceptions

} catch (Exception $e) {

    die('Une erreur est survenue...' . $e->getMessage());
}


?>



    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.html">LOGO</a>// mettre une photo du logo ici
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link"  href="index.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Accueil</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="../boutique.php"">
                        <i class="fa fa-fw fa-area-chart"></i>
                        <span class="nav-link-text">Boutique</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="panier.php">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Panier</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="inscription.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Inscription</span>
                    </a>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="connexion.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text">Connexion</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="login.html">Login Page</a>
                        </li>
                        <li>
                            <a href="register.html">Registration Page</a>
                        </li>
                        <li>
                            <a href="forgot-password.html">Forgot Password Page</a>
                        </li>
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="CGV.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-sitemap"></i>
                        <span class="nav-link-text">CGV</span>
                    </a>


                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Rechercher...">
                            <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Deconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
