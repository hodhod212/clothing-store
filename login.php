<?php
/* [INIT] */
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
require PATH_LIB . "lib-db.php";
require PATH_LIB . "lib-cart.php";
$cartLib = new Cart();
$products = $cartLib->pGet();

/* [DRAW HTML] */
?>
<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/user_style.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	 <!-- [SCRIPTS & STYLES] -->
	 <link rel="stylesheet" href="public/theme.css">
    <script src="public/general.js"></script>
    <script src="public/cart.js"></script>
</head>


<body id="page_home">
<div >
<header >
      <div id="page-cart" onclick="cart.toggle();">
        &#128722; <span id="page-cart-count">0</span>
      </div>
	  <div class="description">
      <h1>ClothingStore  </h1>
    </div>
    <nav>
      <ol>
        <li><a href="../index.php">HOME</a></li>
        <li><a href="../clothes.php">CLOTHES</a></li>
        <li><a href="../schedule/index.php">SHOOES</a></li>
        <li><a href="../#.php">ACCESSORIES</a></li>
        <li><a href="register.php">REGISTER</a></li>
        <li><a href="newsletter/index.html">Subscribe for newsletter</a></li>
      </ol>
    </nav>
    </header>
  <!-- [PRODUCTS] -->	
  <div id="products"><?php
      if (is_array($products)) {
        foreach ($products as $id => $row) {
          ?>
          <div class="pdt">
            <img src="images/<?= $row['product_image'] ?>"/>
            <h3 class="pdtName"><?= $row['product_name'] ?></h3>
            <div class="pdtPrice">$<?= $row['product_price'] ?></div>
            <div class="pdtDesc"><?= $row['product_description'] ?></div>
            <input class="pdtAdd" type="button" value="Add to cart" onclick="cart.add(<?= $row['product_id'] ?>);"/>
          </div>
        <?php
        }
      } else {
        echo "No products found.";
      }
      ?></div>

    <!-- [CART] -->
    <div id="cart" class="ninja"></div>
    
	<div class="header">
		<h2>Login</h2>
	
	
	<form method="post" action="login.php" autocomplete ="new-password">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" autocomplete ="new-password">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" autocomplete ="new-password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn" >Login</button>
		</div>
	</form>
	</div>
	</div>
 
    <?php include './includes/footer.php'; ?>
       
</div>  
    </body>


</html>