<?php

require_once('includes/header.php');


require_once('includes/sidebar.php');


$select = $db->prepare("SELECT * FROM products");
$select->execute();

while ($s = $select->fetch(PDO::FETCH_OBJ)){

?>

    <img src="img/<?php echo $s->title; ?>">
    <h2><?php echo $s->title; ?></h2><br>
    <h5><?php echo $s->description; ?></h5><br>
    <h4><?php echo $s->price; ?>Euros</h4><br>
    <br><br>

<?php

}

?>

    <br><br><br><br>
<?php

require_once('includes/footer.php');

?>