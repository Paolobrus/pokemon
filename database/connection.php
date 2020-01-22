<?php
try {
    $hostname = "localhost";
    $dbname = "pokemon";
    $user = "user";
    $pass = "password";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die();
}
?>
