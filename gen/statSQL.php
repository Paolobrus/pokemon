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
    echo '<p></p>';
    $IDS = [];

    while(isset($evolution['evolves_to'][0])){
        #echo '<p>'. $evolution['species']['url'] .'</p>';
        
        array_push($IDS, $evolution['species']['url']);
        $thisImage = json_decode(file_get_contents($evolution['species']['url']),true)['varieties']['0']['pokemon']['url'];
        $tmp = json_decode(file_get_contents($thisImage),true);
        echo '
                <div class="evolution">
                <img src="'.$tmp['sprites']['front_default'].'" alt="" srcset="">
                <div class="container">
                    <b><h6>'.$tmp['species']['name'].'</h6></b>
                </div>           
              </div>
              <div class="evolution">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg>

              </div>'; 
              foreach($evolution['evolves_to'] as $ev ){  
                  
                }
        $evolution = $evolution['evolves_to'][0];   
    };
    $thisImage = json_decode(file_get_contents($evolution['species']['url']),true)['varieties']['0']['pokemon']['url'];
    $tmp = json_decode(file_get_contents($thisImage),true);
    echo '<div class="evolution">
            <img src="'.$tmp['sprites']['front_default'].'" alt="" srcset="">
            <div class="container">
            <b><h6>'.$tmp['species']['name'].'</h6></b>
                </div>
          </div>';
          
    array_push($IDS, $evolution['species']['url']);

    $i = 0;
    $des = $info['flavor_text_entries'];
    while ($des[$i]['language']['name'] != 'en' ) 
        $i = $i + 1;
    #echo '<p>'. $evolution['species']['url'] .'</p>';
    echo '<p>'.$des[$i]['flavor_text'].'</p>';
?>
