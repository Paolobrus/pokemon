<?php
    include('database/connection.php');
    $sql = "SELECT * FROM `pokemon` WHERE `trainer` = '".$_SESSION['user']."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $totale = $stmt->rowCount();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $json = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon/'.$row['gameCode']), true);
        //echo $img;
        $img = $json["sprites"]["front_default"];
        #echo print_r($row);
        echo '
        
        <div class="card" style="width:150px">
            <img src="'.$img.'" alt="Avatar" style="width:100%">
            <div class="container">
                <h6><b>'.$row["nome"].'</b></h6>
                <h6>lvl '.$row["level"].'</h6>
                <form action="./statistics.php" method="get">
                <input type="submit" value="see" class="myButton">
                <input type="hidden" name="id" value='.$row["id"].'>
                </form>
            </div>
        </div>
        
        ';
    }



?>

