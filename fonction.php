<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/08/2018
 * Time: 11:42
 */

class fonction
{

    function getConnection(){
        $db = new PDO('mysql:host=localhost;dbname=e-commerce website', 'root', '') or die('erreur');
        return $db;
    }
    function insertDb($title,$description,$price){
        $connection = getConnection()->prepare("INSERT INTO `products`(`title`, `description`, `prix`) VALUES (?,?,?)");
        $connection->execute(array($title, $description, $price));

    }
}