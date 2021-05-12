<header id="header">
	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-secondary fixed-top">
        <a href="home.php?Shome='1'" class="navbar-brand">Shaurya Products</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse1">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse1">
        	<ul class="nav navbar-nav">
				<li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
				<li class="nav-item"><a href="#" class="nav-link">About</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Products</a></li>
	       	</ul>
	      	<ul class="navbar-nav ml-auto">

	      		<a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
	        	<div class="nav-item dropdown">
	        				<?php if (isset($_SESSION['username'])) : ?>
                    		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-check"></i><strong><?php echo $_SESSION['username']  ?></strong></a>
		                    <div class="dropdown-menu">
		                        <a href="#" class="dropdown-item"><i class="fas far fa-id-badge"></i>&nbsp;&nbsp;Profile</a>
		                        <a href="#" class="dropdown-item"><i class="fas fas fa-cog"></i>&nbsp;&nbsp;Setting</a>
		                        <a href="home.php?logout='1'" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
		                    </div>
		                	<?php endif ?>
		        </div>
	      	</ul>        
	    </div>
    </nav>	
</header>