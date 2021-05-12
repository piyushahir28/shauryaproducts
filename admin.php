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
	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-secondary fixed-top">
        <a href="#" class="navbar-brand">Shaurya Products</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse1">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse1">
        	<ul class="nav navbar-nav">
				<li class="nav-item"><a href="#" class="nav-link active">Products</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Orders</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Users</a></li>
	       	</ul>
	      	<ul class="navbar-nav ml-auto">
	        	<div class="nav-item dropdown">
                    		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-check"></i><strong>Piyush</strong></a>
		                    <div class="dropdown-menu">
		                        <a href="#" class="dropdown-item"><i class="fas far fa-id-badge"></i>&nbsp;&nbsp;Profile</a>
		                        <a href="#" class="dropdown-item"><i class="fas fas fa-cog"></i>&nbsp;&nbsp;Setting</a>
		                        <a href="home.php?logout='1'" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
		                    </div>
		        </div>
	      	</ul>        
	    </div>
    </nav>

    <div class="modal" id="AddProduct">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"> &times; </button>
              </div>
              <div class="modal-body">
                <form action="server.php" method="post" class="sign-up-form" id="formhai">
                    <h2 class="title">Add Product</h2>
                    <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input type="text" id="number" name="p_name" placeholder="Product Name">
                    </div>
                    <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input type="number" id="email" name="price"placeholder="Product Price" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="text" placeholder="Product Image" name="p_image" id="psw" required />
                    </div>
                      
                    <input type="submit" name="add_product" value="ADD" class="btns solid" />
                  </form>
              </div>
          </div>
        </div>
    </div>


    <br><br>
    <div class="jumbotron text-center">
  <h1>Shaurya Products Admin Panel</h1>
  <p>Welcome to the World of Kullhad</p> 
</div>
<a href="#AddProduct" data-toggle="modal" class="nav-link"><button type="button" align="left" class="btn btn-success btn-lg float-right">Add Product</button></a>
<div><h1>Products Details :</h1></div>
<br>

	<table  class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image Path</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  		$result = $_SESSION['productDetails'];
    while ($row = mysqli_fetch_assoc($result)){?>
    
    <tr>
      <th scope="row"><?php echo $row['p_id']?></th>
      <td><?php echo $row['p_name']?></td>
      <td><?php echo $row['price']?></td>
      <td><?php echo $row['p_image']?></td>
      <td><button type="button" class="btn btn-success btn-sm">Update</button>  <button type="button" class="btn btn-danger btn-sm">Delete</button></td>
    </tr>
	<?php
	}
 	?>
  </tbody>
</table>
</body>
</html>