<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: /login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/user_style.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
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
        <li>	<?php  if (isset($_SESSION['user'])) : ?>
				<i style="color: #888;float:right;">	<?php echo $_SESSION['user']['username']; ?>
						(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						
						<a href="home.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
					

				<?php endif ?></li>
        
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
			<img style="width:280px;" src="../images/kung.png"  >
	</div>
	<?php include '../includes/footer.php'; ?>	
</body>
</html>