<?php
    include 'Config.php';
    session_start();
    unset($_SESSION['panier']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed</title>
    <link rel="stylesheet" href="./delivery.css">
</head>
<body>
    <div class="suceess"><img src="./images/commande.png" class="fo"></div>
    <div class="col">
   
    <h1 class="t1">Your order is on its way </h1>
    <p class="t2">Thank you for your trust</p>
    
</div>
<button class="Bou"><a href="Home.php"><span>Home Page</span></a></button></div>

</body>

</html>