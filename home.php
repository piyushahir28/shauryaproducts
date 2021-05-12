<?php

	require_once ('server.php');
	require_once ('component.php');

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['productDetails']);
		header('location: index.html');
	}

	if (isset($_POST['add'])){
    //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'home.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}

if (isset($_GET['Shome'])) {
    
    header('location: home.php');
    }
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shaurya Products</title>

	<!--The given link is for Bootstrap(Version-4.5.2)-->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  		
  	<!--The given link is for Social Media Icons-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />


  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<link rel="stylesheet" href="mycss.css">

</head>
<body>
    <?php
    	require_once ('header.php');
	?>
  <br><br>
	<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $_SESSION['productDetails'];
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['p_name'], $row['price'], $row['p_image'], $row['p_id']);
                }
            ?>  
        </div>
	</div>



</body>
</html>