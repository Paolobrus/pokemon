<?php
    include('database/connection.php');
    $sql = "SELECT * FROM allenatore WHERE mail = '".$_POST['mail']."' AND password = '".$_POST['password']."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $totale = $stmt->rowCount();
    if ($totale == 1){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $row['username'];
        header('location: index.php');
    } 
?>