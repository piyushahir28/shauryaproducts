<?php
  session_start();

  //initialise variable

  $username = "";
  $password = "";

  $errors = array();

  //connect to database
  $db = mysqli_connect('localhost','root','','shaurya_products') or die("Could not connect to databases");

  //User Registration
  if(isset($_POST['sign_user'])){
  //Register Users
  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $contact = mysqli_real_escape_string($db, $_POST['number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $pwd = mysqli_real_escape_string($db, $_POST['psw']);

  //form validations
  if(empty($username))array_push($errors, "username is required");
  if(empty($contact))array_push($errors, "contact number is required");
  if(empty($email))array_push($errors, "E-mail is required");
  if(empty($dob))array_push($errors, "DOB is required");
  if(empty($pwd))array_push($errors, "password is required");

  //Register the user if no error

  if (count($errors) == 0) {

    $password = md5($pwd);
    $query = "INSERT INTO user(username,email,contact,dob,password) VALUES('$username','$email','$contact','$dob','$password')";
    mysqli_query($db, $query);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header('location: home.php');
  }
  }

  //Login User

  if(isset($_POST['login_user'])){
    
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $pwd = mysqli_real_escape_string($db, $_POST['psw']);

    if(empty($username))array_push($errors, "username is required");
    if(empty($pwd))array_push($errors, "password is required");

    if (count($errors) == 0) {

      $password = md5($pwd);
      $query = "SELECT username, password FROM user WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);

      if(mysqli_num_rows($results)) {
        
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Logged in Sucessfully";
        
        header('location: home.php');
      }else{
        array_push($errors, "Wrong username and password");
      }
    }
  }

  //Login Admin

  if(isset($_POST['login_admin'])){
    
    $username = mysqli_real_escape_string($db, $_POST['uname']);
    $pwd = mysqli_real_escape_string($db, $_POST['psw']);

    if(empty($username))array_push($errors, "username is required");
    if(empty($pwd))array_push($errors, "password is required");

    if (count($errors) == 0) {

      $password = $pwd;
      $query = "SELECT username, password FROM admin WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);

      if(mysqli_num_rows($results)) {
        
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Logged in Sucessfully";
        
        header('location: admin.php');
      }else{
        array_push($errors, "Wrong username and password");
      }
    }
  }

  //Add Product
  if(isset($_POST['add_product'])){

  $productName = mysqli_real_escape_string($db, $_POST['p_name']);
  $productPrice = $_POST['price'];
  $productImage = mysqli_real_escape_string($db, $_POST['p_image']);

    $query = "INSERT INTO product(p_name,price,p_image) VALUES('$productName',$productPrice,'$productImage')";
    mysqli_query($db, $query);

    
    $_SESSION['success'] = "Product Added";
    echo $_SESSION['success'];

    header('location: admin.php');
  }

  $query = "SELECT * FROM product";
  $ourProducts = mysqli_query($db, $query);
  $_SESSION['productDetails'] = $ourProducts;  

?>