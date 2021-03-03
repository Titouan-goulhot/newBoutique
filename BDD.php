<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mydb;port=3307', 'root', 'Ressorts999!');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
