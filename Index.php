<?php
  include 'config.php';
  session_start();
  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn,($_POST['Password']));
    $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    
    $select_users = mysqli_query($conn, "SELECT * FROM `sign` WHERE 
    Name = '$name'AND Email = '$email' AND Password = '$password' AND Phone = '$phone'") 
    or die('query failed');
    
    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'User already exist ! Please Log In';
    }else{
        mysqli_query($conn, "INSERT INTO `sign`(Name,Email,Password,Phone)
        VALUES('$name', '$email', '$password', '$phone')") or die('query failed');
        $message[] = 'Regist !';
        
        $_SESSION['log_name'] = $name;
        header('location:Home.php');
    }
    }

    if(isset($_POST['ok'])){
      $mail = mysqli_real_escape_string($conn, $_POST['mail']);
      $pass = mysqli_real_escape_string($conn,($_POST['pass']));
      
      $select_users = mysqli_query($conn, "SELECT * FROM `sign` WHERE 
      Email = '$mail' AND Password = '$pass'") 
      or die('query failed');
      
      if(mysqli_num_rows($select_users) > 0){
        $message[] = 'Successfully';
        $row = mysqli_fetch_assoc($select_users);
        $_SESSION['log_name'] = $row['Name'];
        header('location:Home.php');
      }else{
          $message[] = 'Please create an account !';
      }
      }
      
      
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <title>Log In</title>
</head>

<body>
  <!---------- HEADER -------------->

  <header id="head">
    <div class="navbar">
      <div class="nav_logo">
        <a href="Home.php"><img src="/images/logo.png" alt="Dunkin' Donuts Logo" /></a>
      </div>
      <ul class="nav">
        <li><a href="Home.php">Home</a></li>
        <li><a href="Home.php#page2">BestSellers</a></li>
        <li><a href="main.php">Menu</a></li>
        <li><a href="contactus.php">Contact</a></li>
      </ul>
    </div>

    <div class="main">
      <div class="user">
        <a href="index.html"><img src="/images/admin.png" alt="Sign In" width="20px" /><span style="font-size: 14px;">Log
            In</span></a>
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

  <div class="final">
    <!---------- Messages -------------->
    <div>
      <?php
      if(isset($message)){
        foreach($message as $message){
        echo '
        <div class="msg">
        <span>'.$message.'</span>
        <i class="bx bx-x" onclick="this.parentElement.remove();"></i>
        </div>
          ';
        }
      }
      ?>
    </div>

    <!---------- PAGE1 -------------->

    <div class="page1">
      <div class="sign" id="sign">
        <div class="form-container sign-up">
        <form action="" method="post">
            <h1 class="Create">Create Account</h1>
            <div class="social-container">
              <a href="#" class="social"><img src="./images/fb.png" alt="Facebook_icon"></a>
              <a href="#" class="social"><img src="./images/google.png" alt="Google_icon"></a>
              <a href="#" class="social"><img src="./images/linkedin.png" alt="LinkedIn_icon"></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" placeholder="Name" name="Name" required/>
            <input type="email" placeholder="Email" name="Email" required/>
            <input type="password" placeholder="Password" name="Password" required/>
            <input type="text" placeholder="Phone" name="Phone" required/>
            <button type="submit" name="submit">Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in">
          <form action="" method="post">
            <h1>Log In</h1>
            <div class="social-container">
              <a href="#" class="social"><img src="./images/fb.png" alt="Facebook_icon"></a>
              <a href="#" class="social"><img src="./images/google.png" alt="Google_icon"></a>
              <a href="#" class="social"><img src="./images/linkedin.png" alt="LinkedIn_icon"></a>
            </div>
            <span>or use your account</span>
            <input type="email" placeholder="Email" name="mail" required/>
            <input type="password" placeholder="Password" name="pass" required/>
            
            <a href="#">Forgot your password?</a>
            <button type="submit" name="ok">Log In</button>
          </form>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1 class="welcome">Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button class="ghost" id="signIn">Log In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1 class="hello">Hello, Friend!</h1>
              <p>Enter your personal details and start your journey with us</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
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
              <li id="none" class="ch1">   <a href="mailto: dunkin'@gmail.com">  <img src="./images/email.png" width="20" id="im"> Dunkin's @gmail.com</li> </a>
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

  <script src="index.js"></script>
  <script src="Home.js"></script>
</body>

</html>
