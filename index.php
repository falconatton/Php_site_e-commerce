<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="./style/stylesheet.css" type="text/css" rel="stylesheet"/>

//cdn jquery
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
//cdn bootstrap
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">





</head>


<!-- Le corps -->

<body class="container-fluid">



<header>
    <?php require_once('includes/header.php'); ?>
</header>


<div>

        <?php require_once('includes/sidebar.php'); ?>


        <form action="" method="POST">

            <div class="form-group row">
                <label for="InputTitreDuProduit" class="col-sm-8 col-form-label">Titre du produit</label>
                    <input type="text" class="form-control" id="TitreDuProduit">
            </div>

            <div class="form-group row" class="col-sm-8">
                <label for="InputDescriptionDuProduit" class="col-sm-8 col-form-label">Description du produit</label>
                    <textarea class="col-sm-12" aria-label="textareaDescriptionDuProduit"></textarea>
            </div>


            <div class="form-group row">
                <label for="InputPrice" class="col-sm-8 col-form-label">Prix (en Euros)</label>
                    <input type="text" class="form-control" id="Price">
            </div>

    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
    </form>

</div>
</div>
</div>

<!-- footer -->
<footer >
    <?php require_once('includes/footer.php'); ?>
</footer>
</div>
</body>
</html>








