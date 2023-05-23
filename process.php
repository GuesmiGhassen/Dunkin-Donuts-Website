<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="contact";
$mysql = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if(isset($_POST['btn'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['msg'];
    $req = "INSERT INTO contact_us SET first_name='$fname', last_name='$lname', email='$email', message='$message'";
    $data = $mysql->query($req);

    if($data) {
        echo "<script>alert('Query successfully Submitted.Thank you')</script>";
        header('Location: success.html'); // redirect to success.html
      
       
    } else {
        echo "<script>alert('Something Went wrong!!')</script>";
    }
}
?>
