<?php
    if(!isset($_GET['a']) || !isset($_GET['b'])) header('location: index.php');
    include('database/connection.php');
    $sql = "SELECT * FROM `pokemon` WHERE `trainer` = '".$_SESSION['user']."' AND id = ".$_GET['a'];
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $totale = $stmt->rowCount();
    if ($totale == 1){
        $first = $stmt->fetch(PDO::FETCH_ASSOC);
    } else header('location: index.php');

    $sql = "SELECT * FROM `pokemon` WHERE id = ".$_GET['b'];

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $totale = $stmt->rowCount();
    if ($totale == 1){
        $second = $stmt->fetch(PDO::FETCH_ASSOC);
    } else header('location: index.php');

    $mosseFirst = [$first['firstSpell'],$first['secondSpell'],$first['thirdSpell'],$first['fourthSpell']];
    $mosseSecond = [$first['firstSpell'],$first['secondSpell'],$first['thirdSpell'],$first['fourthSpell']];

    echo print_r($first);
    echo '<br>';
    echo print_r($second);
    echo '<p>Mosse disponibili:
    <ul>
    <li>'.$mosseFirst[0].'</li>
    <li>'.$mosseFirst[1].'</li>
    <li>'.$mosseFirst[2].'</li>
    <li>'.$mosseFirst[3].'</li>
    </ul>
    </p>'
    

?>