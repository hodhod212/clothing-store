<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/user_style.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>


<body id="page_home">
<div >
<?php include './includes/header.php'; ?>
    
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