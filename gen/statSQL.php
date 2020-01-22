<?php
    include('database/connection.php');
    $sql = "SELECT * FROM pokemon WHERE id = '".$_GET['id']."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $totale = $stmt->rowCount();

    if ($totale == 0) header('location: index.php');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $info = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon-species/'.$row['gameCode']),true);
    $evolution = json_decode(file_get_contents($info['evolution_chain']['url']),true); 
    $evolution = $evolution['chain'];

    $thisPokemon = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon/'.$row['gameCode']),true);

    echo '
    <div class="card" style="width:150px">
    <img src="'.$thisPokemon["sprites"]["front_default"].'" alt="Avatar" style="width:100%">
        <div class="container">
            <h6><b>'.$row["nome"].'</b></h6>
            <h6>lvl '.$row["level"].'</h6>
        </div>
    </div>';

    $IDS = [];
    while(isset($evolution['evolves_to'][0])){
        echo '<p>'. $evolution['species']['url'] .'</p>';
        array_push($IDS, $evolution['species']['url']);
        $evolution = $evolution['evolves_to'][0];
    };
    array_push($IDS, $evolution['species']['url']);

    $i = 0;
    $des = $info['flavor_text_entries'];
    while ($des[$i]['language']['name'] != 'en' ) 
        $i = $i + 1;
    echo '<p>'. $evolution['species']['url'] .'</p>';
    echo '<p>'.$des[$i]['flavor_text'].'</p>';


    
?>