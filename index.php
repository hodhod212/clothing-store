<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/user_style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="page_home">
<div class="wrapper">
<header>
    <!--<div class="branding"> <img src="./images/logo.png" alt="Logo">
    </div>-->
    <div class="description">
      <h1>ClothingStore  </h1>
    </div>
    <nav>
      <ol>
        <li><a href="../index.php">HOME</a></li>
        <li><a href="../clothes.php">CLOTHES</a></li>
        <li><a href="../schedule/index.php">SHOOES</a></li>
        <li><a href="../#.php">ACCESSORIES</a></li>
        
        <li>
		<?php  if (isset($_SESSION['user'])) : ?>
				
						<a href="index.php?logout='1'" >Logout</a>
				<?php endif ?>
		</li>
      </ol>
    </nav>
  </header>
	
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/drottning.jpg"  >

			<div>
				
			</div>
		</div>
	</div>
	<?php include './includes/footer.php'; ?>
       
	   </div>  
		   </body>
</html>