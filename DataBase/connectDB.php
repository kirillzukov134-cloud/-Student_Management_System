<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=Students_Projects', 'root', ''); 
}catch(PDOException $error){
    die('Error: ' . $error->getMessage());
}
