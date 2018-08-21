<?php

session_start();
include_once 'fonction.php';
$bdd = new fonction();

?>


<link href="./style/stylesheet.css" type="text/css" rel="stylesheet"/>

//cdn jquery
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
//cdn bootstrap
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

<h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1><br>
<a href="?action=add">Ajouter un produit</a>
<a href="?action=modifyanddelete">Modifier / Suprimer un produit</a><br>

<?php
if (isset($_POST['title'])&& isset($_POST['description']) && isset($_POST['price'])&& !empty($_POST['title']) && !empty($_POST['description'])&& !empty($_POST['price'])){
    $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price',FILTER_SANITIZE_STRING);
    $bdd->insertDb("aa","aa","azza");
}

try {

    $db = new PDO('mysql:host=localhost;dbname=e-commerce website', 'root', '');
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);//les noms de champs seront en caracteres minuscules
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//les erreurs lanceront des exceptions

} catch (Exception $e) {

    die('Une erreur est survenue');

}


//si la variable........ existe alors
if (isset($_SESSION['username'])) {
//si la variable........ existe alors
    if (isset($_GET['action'])) {
//si la variable........ existe alors
        if ($_GET['action'] == 'add') {
//si la variable........ existe alors
            if (!isset($_POST['submit'])) {



                $img=$_FILES['img']['name'];
                $img_tmp=$_FILES['img']['temp_name'];
                if (empty($img_tmp)){
                    $image=explode('-', $img);
                    $image_ext=end($image);

                    if (in_array(strtolower($image_ext), array('png', 'jpg', 'jpeg', 'svg', 'bmp'))==false){
                        echo 'Veuillez télécharger une image ayant pour extension : png, jpg, jpeg, svg, bmp';

                    }else{

                        $image_size=getimagesize($img_tmp);
                        if ($image_size['mime']=='image/jpeg'){
                            $image_src=imagecreatefromjpeg(image_temp);

                        } else if($image_size['mime']=='image/png'){
                            $image_src=imagecreatefrompng(image_temp);


                        }else{
                            $image_src=false;
                            echo 'Veuillez entrer un format d\'image valide';

                             }

                             if ($image_src!==false){
                            $image_width=200;
                            if ($image_size[0]==$image_width){
                                $image_finale=$image_src;

                             }else{

                                $new_width[0]=$image_width;
                                $new_height[1]=200;
                                $image_finale=imagecreatetruecolor($new_width[0], $new_height[1]);

                                imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);
                              }
                            imagejpeg($image_finale, 'img/'.$title.'.jpg');
                        }
                    }


                }else{
                    echo 'Veuillez remplir tous les champs';


                }



                if (isset($_POST['title'])&& isset($_POST['description']) && isset($_POST['price'])&& !empty($_POST['title']) && !empty($_POST['description'])&& !empty($_POST['price'])){
                    $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING);
                    $description = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
                    $price = filter_input(INPUT_POST, 'price',FILTER_SANITIZE_STRING);
                    $bdd->insertDb($title,$description,$price);
                }

            }

            ?>


            <form action="" method="post" class="form-signin">
                <h3 class="h3 mb-3 font-weight-normal"></h3>
                <label for="text" class="sr-only">Titre du produit :</label>
                <input type="text" name="title" id="text" class="form-control" placeholder="titreDuProduit">


                <!--  Description du produit -->
                <h3 class="h3 mb-3 font-weight-normal"></h3>
                <label for="textarea" class="sr-only">Description du produit :</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Description">


                <!--  prix -->
                <h3 class="h3 mb-3 font-weight-normal"></h3>
                <label for="text" class="sr-only">Prix :</label>
                <input type="text" name="price" id="text" class="form-control" placeholder="prix">


                <!--  bouton de validation -->
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="modifier"></button>
            </form>


            <?php

        } else if ($_GET['action'] == 'modifyanddelete') {

            $select = $db->prepare("SELECT * FROM products");
            $select->execute();


            while ($s = $select->fetch(PDO::FETCH_OBJ)) {
                echo $s->title;

                ?>

                <a href="?action=modify&amp;id=<?php echo $s->id; ?>">Modifier</a>
                <a href="?action=modify&amp;id=<?php echo $s->id; ?>">X</a><br><br>

                <?php
            }

        } else if ($_GET['action'] == 'modify') {


            $id = $_GET['id'];
            $select = $db->prepare("SELECT * FROM products WHERE id=$id");
            $select->execute();

            $data = $select->fetch(PDO::FETCH_OBJ);


            ?>

            <!--

            <form action="" method="post" class="form-signin">
                <h3 class="h3 mb-3 font-weight-normal"></h3>
                <label for="text" class="sr-only">Titre du produit :</label>
                <input type="text" value="<?php echo $data->title; ?>" id="text" class="form-control"
                       placeholder="e-mail">



                <h3 class="h3 mb-3 font-weight-normal"></h3>
                <label for="textarea" class="sr-only">Description du produit :</label>
                <input type="text" value="<?php echo $data->description; ?>" id="description" class="form-control"
                       placeholder="Description">



                <h3 class="h3 mb-3 font-weight-normal"></h3>
                <label for="text" class="sr-only">Prix :</label>
                <input type="text" value="<?php echo $data->price; ?>" name="price" id="text" class="form-control"
                       placeholder="prix">



                <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
            </form>


-->





            <form action="" method="post" enctype="multipart/form-data">
                <h3>Titre du produit :</h3><input type="text" value="<?php echo $data->title; ?>" name="title"/>
                <h3>Description du produit :</h3><textarea value="<?php echo $data->description; ?>" name="description"></textarea>
                <h3>Prix :</h3><input type="text" value="<?php echo $data->price; ?>" name="price"/><br><br>
                <input type="file"  name="img"/>
                <input type="submit" value="modifier" name="submit"/>
            </form>


            <?php

            //si la variable........ existe alors
            if (isset($_POST['submit'])) {

                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                $update = $db->prepare("UPDATE products SET title='$title', description='$description', price='$price' WHERE id=$id");
                $update->execute();

                header('Location: index.php?action=modifyanddelete');


            }


        } else if ($_GET['action']=='delete') {
            $id = $_GET['id'];
            $delete = $db->prepare("DELETE FROM products WHERE id=$id");
            $delete->execute();
        } else {

            die('une erreur s\'est produite.');

        }

    } else {


    }

} else {

    header('Location: ../index.php');

}

?>


