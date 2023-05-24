<?php
    include 'config.php';
    session_start();
    if(!isset($_SESSION['log_name'])){
        $nom = '';
    }else{
        $nom =$_SESSION['log_name']; 
    };
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="Home.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

    <title>Dunkin' Donuts</title>
</head>

<body>
    <!---------- HEADER -------------->

    <header id="head">
        <div class="navbar">
            <div class="nav_logo">
                <a href="#"><img src="/images/logo.png" alt="Dunkin' Donuts Logo" /></a>
            </div>
            <ul class="nav">
                <li><a href="#">Home</a></li>
                <li><a href="#page2">BestSellers</a></li>
                <li><a href="main.php">Menu</a></li>
                <li><a href="Contactus.php">Contact</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="user">
            <?php
                if($nom == ''){
                    echo '<a href="index.php"><img src="/images/admin.png" alt="Sign In" width="20px" /><span>Log In</span></a>';
                }else{
                    echo '<a href="LogOut.php"><img src="/images/admin.png" alt="Sign In" width="20px" /><span> '.$nom.'</span></a>';
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

    <div class="final">
        <!---------- PAGE1 -------------->

        <section class="page1">
            <div class="text">
                <h2 class="main-text">Welcome !</h2>
                <p class="para">It's not just a coffee It's <span>DUNKIN'</span></p>
            </div>
            <div class="main-img">
                <img src="/images/latte1.png" alt="Latte" width="450px" />
            </div>
            <div class="products">
                <div class="product prod1">
                    <img src="/images/green1.png" alt="Iced Matcha Latte" />
                </div>
                <div class="product prod2">
                    <img src="/images/chocolat1.png" alt="Frozen Chocolat" />
                </div>
                <div class="product prod3">
                    <img src="/images/orange1.png" alt="Iced Latte" />
                </div>
            </div>
        </section>
        <!---------- PAGE2 -------------->
        <div class="page2" id="page2">
            <div id="part">
                <h1 class="tt1">The happiest hour</h1>
                <h1 class="tt2">Of the year</h1>
                <div class="slider" id="slider">
                    <img src="./images/left.png" width="30" id="leftArrow" class="nextbtn" onclick="prevSlide()" />
                    <div class="slide" id="div">
                        <img src="./images/chocolat.png" class="img1 img2" />
                        <div class="card">
                            <h2 class="tit">Frozen Chocolate</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>

                    <div class="slidehover" id="divhover">
                        <img src="./images/green.png" class="img1 img3" />
                        <div class="card">
                            <h2 style="color: aliceblue">Signature Latte</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id="div">
                        <img src="./images/latte.png" class="img1 img4" />
                        <div class="card">
                            <h2 class="tit">Signature Latte</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id="div">
                        <img src="./images/iced-macchiato.png" class="img1 img5" />
                        <div class="card">
                            <h2 class="tit">Iced Macchiato</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id="div">
                        <img src="./images/orange.png" class="img1 img6" />
                        <div class="card">
                            <h2 class="tit">Iced Cofee</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id="div">
                        <img src="./images/iced-americano.png" class="img1 img7" />
                        <div class="card">
                            <h2 class="tit">Iced Americano</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id="div">
                        <img src="./images/iced-tea.png" class="img1 img8" />
                        <div class="card">
                            <h2 class="tit">Iced Tea</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id="div">
                        <img src="./images/green.png" class="img1 img" />
                        <div class="card">
                            <h2 class="tit">Frozen Matcha</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id="div">
                        <img src="./images/hot-chocolate.png" class="img1" />
                        <div class="card">
                            <h2 class="tit">Hot Chocolate</h2>
                            <div class="intro">
                                <p>Calories</p>
                                <span id="line">
                                    <p>Total fats 0g</p>
                                    <p id="z">0%</p>
                                </span>
                                <span id="line">
                                    <p>Saturated fats 0g</p>
                                    <p id="ze">0%</p>
                                </span>
                                <p>TransFats</p>
                            </div>
                        </div>
                    </div>
                    <img src="./images/right.png" width="30" class="prevbtn" id="rightArrow" onclick="nextSlide()" />
                </div>
                <button id="viewmore"><a href="main.html"><span style="color: aliceblue;">View more</span></a> </button>
            </div>
        </div>

        <!---------- PAGE3 -------------->
        <section>
            <h1 class="h"> Our Happy clients... </h1>
            <div class="page3" id="page3">
                <div class="wrapper">
                    <div class="testimonial-container" id="testimonial-container"></div>
                    <button id="prev">&lt;</button>
                    <button id="next">&gt;</button>
                </div>
            </div>
        </section>

        <!---------- PAGE4 -------------->

        <section class="page4" id="page4">
            <div class="main-counter">
                <h2 class="title">Get to know us more</h2>
                <div class="counter">
                    <div class="ul1">
                        <div class="count count1">
                            <img src="./images/coffee.png" class="coffee" />
                            <p class="number1">890</p>
                            <span></span>
                            <p>Cups of coffee</p>
                        </div>
                        <div class="count count2">
                            <img src="./images/smile.png" class="smile" />
                            <p class="number2">1050</p>
                            <span></span>
                            <p>Satisfied clients</p>
                        </div>
                        <div class="count count3">
                            <img src="./images/store.png" class="store" />
                            <p class="number3">10</p>
                            <span></span>
                            <p>Stores</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!---------- FOOTER -------------->

        <div class="footer" id="footer">
            <div class="footer-bg">
                <hr>
                <div class="container">
                    <div class="child1">
                        <h1>Our Partners</h1>
                        <br />
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
                        <h1>To Find us</h1>
                        <br />
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
                        <br />
                        <ul class="ul2">
                            <li id="none" class="ch1"><a href="https://www.google.com/maps/search/?api=1&query=410%20Napa%20Junction%20Rd%2C%20Suite%20100%2C%20American%20Canyon%2C%20CA%2094503%20US&output=classic&query_place_id=ChIJ87LgYA0MhYARljhzl8_lXZQ"><img src="./images/map.png" width="20" id="im"> Donuts America</li></a>
              <li id="none" class="ch1"><img src="./images/phone-call.png" width="20" id="im"> 1-800-447-0013</li>
              <li id="none" class="ch1">   <a href="mailto: dunkin'@gmail.com">  <img src="./images/email.png" width="20" id="im"> Dunkin's @gmail.com</li> </a>
                        </ul>
                    </div>
                </div>
                <hr />
                <div class="cont2">
                    <h2 class="titre2">Follow us</h2>
                    <br />
                    <div class="container1">
                        <div class="child11"> <a href="https://www.facebook.com/DunkinDonuts/?brand_redir=6979393237"><img src="./images/facebook.png" width="30" id="im"> </a></div>
                        <div class="child22"> <a href="https://www.instagram.com/dunkin/?hl=en"><img src="./images/instagram.png" width="30" id="im"> </a></div>
                        <div class="child33"> <a href="https://twitter.com/dunkindonuts?lang=en"><img src="./images/twitter.png" width="30" id="im"> </a></div>
                        <div class="child44"> <a href="https://www.pinterest.com/DunkinDonuts/"><img src="./images/pinterest.png" width="30" id="im"> </a></div>
                        <div class="child55"> <a href="https://www.youtube.com/user/dunkindonuts#"><img src="./images/youtube.png" width="30" id="im"> </a></div>
                        <div class="child66"> <a href="https://www.tiktok.com/@dunkin"><img src="./images/tiktok.png" width="30" id="im"></a></div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="homepage.js"></script>
    <script src="Home.js"></script>
    <script src="Counter.js"></script>
</body>

</html>
