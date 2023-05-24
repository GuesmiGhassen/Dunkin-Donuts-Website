<?php
session_start();
include_once "Config.php";
if(!isset($_SESSION['log_name'])){
        $nom = '';
    }else{
        $nom =$_SESSION['log_name']; 
    };
    
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    unset($_SESSION['panier'][$id_del]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="panier.css">
</head>
<!---------- HEADER -------------->

<header id="head">
        <div class="navbar">
            <div class="nav_logo">
                <a href="Home.php"><img src="/images/logo.png" alt="Dunkin' Donuts Logo" /></a>
            </div>
            <div class="nav">
                <div><a href="Home.php">Home</a></div>
                <div><a href="Home.php#page2">BestSellers</a></div>
                <div><a href="main.php">Menu</a></div>
                <div><a href="Contactus.php">Contact</a></div>
            </div>
        </div>

        <div class="main">
            <div class="user">
            <?php
                if($nom == ''){
                    echo '<a href="index.php" style="text-decoration: none;"><img src="/images/admin.png" alt="Sign In" width="20px" /><span>Log In</span></a>';
                }else{
                    echo '<a href="LogOut.php" style="text-decoration: none;"><img src="/images/admin.png" alt="Sign In" width="20px" /><span> '.$nom.'</span></a>';
                }
                    
            ?>
            </div>
            <div class="basket">
                <a href="panier.php" class="link"><img src="/images/panier.png" alt="Basket" width="30px" /><span>
                <?php 
                    if(!empty($_SESSION['panier'])){
                        echo array_sum($_SESSION['panier']);
                    }else{
                        echo 0;
                    }
                    ?></span></a>
            </div>
        </div>
    </header>

<body>
<div class="final">
    <!---------- PAGE1 -------------->

    <div class="page1">
        <div class="panier">
            <section>
                <table>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $total = 0;
                    if(!empty($_SESSION['panier'])){
                            $ids = array_keys(($_SESSION['panier']));
                            if (empty($ids)) {
                                echo "";
                            } else {
                                $products = mysqli_query($conn, "SELECT*FROM products WHERE id IN(" . implode(',', $ids) . ")");
                                
                                foreach ($products as $product) :
                                    $total=$total+$product['price']*$_SESSION['panier'][$product['id']];

                            ?>
                                    <tr>
                                        <td><img src="/images/<?= $product['img'] ?>"></td>
                                        <td><?= $product['name'] ?></td>
                                        <td><?= $product['price'] ?> DT</td>
                                        <td><?= $_SESSION['panier'][$product['id']]?></td>
                                        <td><a href="panier.php?del=<?= $product['id'] ?>"><img src="./images/delete.png" class="deli"></a></td>
                                    </tr>
                            <?php endforeach;
                            }     
                    }else{
                        echo 'You haven\'t selected any item yet !';
                    }
                    ?>
                    <tr class="total">
                                <th>Total : <?php 
                                if($total!=0){
                                    echo $total .'DT' ;
                                }else{
                                    echo 0;
                                }
                                ?>
                                </th>
                            </tr>
                </table>
            </section>
            <br>
            
        </div>
        
       <button type="submit">
        <?php 
            if(!empty($_SESSION['panier'])){
                echo '<a href="Commande.php"><span>Next</span></a>';
            }else{
                echo '<a href="Main.php"><span>Menu</span></a>';
            }
        ?>
       </button>
    </div>


    <!---------- FOOTER -------------->

    <div class="footer">
      <div class="footer-bg">
        <hr>
        <div class="container">
          <div class="child1">
            <h1>Our Partners</h1>
            <br>
            <ul class="ul2">
              <li class="ch1">➤ jetBlue</li>
              <li class="ch1">➤ BASKIN.ROBBINS</li>
              <li class="ch1">➤ New York Football Gants</li>
              <li class="ch1">➤ JETS</li>
              <li class="ch1">➤ MLB.tv</li>
              <li class="ch1">➤ mets.com</li>
            </ul>
          </div>
          <div class="child2">
            <h1> To Find us </h1>
            <br>
            <ul class="ul2">
              <li class="ch1">➤ New York City, NY</li>
              <li class="ch1">➤ Boston, MA</li>
              <li class="ch1">➤ Philadelphia, PA</li>
              <li class="ch1">➤ Miami, FL</li>
              <li class="ch1">➤ Chicago, IL</li>
              <li class="ch1">➤ Los Angeles, CA</li>
              <li class="ch1">➤ Atlanta, GA</li>
              <li class="ch1">➤ Dallas, TX</li>
              <li class="ch1">➤ Washington, D.C.</li>
              <li class="ch1">➤ Seattle, WA</li>
            </ul>
          </div>
          <div class="child3">
            <h1>Informations</h1>
            <br>
            <ul class="ul2">
              <li id="none" class="ch1"><a href="https://www.google.com/maps/search/?api=1&query=410%20Napa%20Junction%20Rd%2C%20Suite%20100%2C%20American%20Canyon%2C%20CA%2094503%20US&output=classic&query_place_id=ChIJ87LgYA0MhYARljhzl8_lXZQ"><img src="./images/map.png" width="20" id="im"> Donuts America</li></a>
              <li id="none" class="ch1"><img src="./images/phone-call.png" width="20" id="im"> 1-800-447-0013</li>
              <li id="none" class="ch1">   <a href="mailto: dunkin'@gmail.com">  <img src="./images/email.png" width="20" id="im"> Dunkin'@gmail.com</li> </a>
            </ul>

          </div>
        </div>
        <hr>
        <div class="cont2">
          <h2 class="titre2">Follow us </h2>
          <br>
          <div class="container1">
            <div class="child11"> <a href="https://www.facebook.com/DunkinDonuts/?brand_redir=6979393237"><img src="./images/facebook.png" width="30" id="im"> </a></div>
            <div class="child22"> <a href="https://www.instagram.com/dunkin/?hl=en"><img src="./images/instagram.png" width="30" id="im"> </a></div>
            <div class="child33"> <a href="https://twitter.com/dunkindonuts?lang=en"><img src="./images/twitter.png" width="30" id="im"> </a></div>
            <div class="child44"> <a href="https://www.pinterest.com/DunkinDonuts/"><img src="./images/pinterest.png" width="30" id="im"> </a></div>
            <div class="child55"> <a href="https://www.youtube.com/user/dunkindonuts#"><img src="./images/youtube.png" width="30" id="im"> </a></div>
            <div class="child66"> <a href="https://www.tiktok.com/@dunkin"><img src="./images/tiktok.png" width="30" id="im"></a></div>
          </div>
          <br>
        </div>
      </div>

    </div>


  </div>
</body>
<script src="Home.js"></script>

</html>
