<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(isset($_POST['mail']) && isset($_POST['password'])) include('gen/loginSQL.php');
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="center">
        <form action="" method="post">
            <h3>Email</h3>
            <input type="email" name="mail">
            <h3>Password</h3>
            <input type="password" name="password">
            <p></p>
            <input type="submit" value="Submit">
        </form>
    </div>
    
</body>
</html>