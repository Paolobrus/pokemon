<?php
    include('database/connection.php');
    $sql = "SELECT * FROM `pokemon` WHERE `trainer` = '".$_SESSION['user']."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $totale = $stmt->rowCount();

?>