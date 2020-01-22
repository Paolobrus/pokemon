<!DOCTYPE html>
<?php
    # $json = file_get_contents('https://pokeapi.co/api/v2/pokemon/1');
    # $pokemon = json_decode($json, true);
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');
?>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div class="center">
        <h2 style="padding: 20px 20px">Your pokemons are here</h2>
        <?php
            include('gen/pokemonList.php');
        ?>
    </div>   
</body>
</html>