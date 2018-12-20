

<!DOCTYPE HTML>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css_lr/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css_lr/bootstrap-responsive.css">
		<link rel="icon" href="favicon-1.ico" type="image/x-icon">
		<style type="text/css">
	      body {
	        padding-top: 40px;
	        padding-bottom: 40px;
	        background-color: #f5f5f5;
	      }

	      .form-signin {
	        max-width: 300px;
	        padding: 19px 29px 29px;
	        margin: 0 auto 20px;
	        background-color: #fff;
	        border: 1px solid #e5e5e5;
	        -webkit-border-radius: 5px;
	           -moz-border-radius: 5px;
	                border-radius: 5px;
	        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	                box-shadow: 0 1px 2px rgba(0,0,0,.05);
	      }
	      .form-signin .form-signin-heading,
	      .form-signin .checkbox {
	        margin-bottom: 10px;
	      }
	      .form-signin input[type="text"],
	      .form-signin input[type="password"] {
	        font-size: 16px;
	        height: auto;
	        margin-bottom: 15px;
	        padding: 7px 9px;
	      }

	    </style>
	</HEAD>

	<BODY>
	<div class="container">
			<?php
					// check for a successful form post
					if (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";
			?> 

      <form class="form-signin" action="login.php" method="POST">
	  	<center>
        <h2 class="form-signin-heading">Please log in.</h2>
        <input type="text" class="input-block-level" name="userid" pattern="[A-z ]{3,}" title="Please enter a valid username." placeholder="User ID" required>
        <input type="password" class="input-block-level" name="password" placeholder="Password" required>
		<input type="hidden" name="save" value="signin">
		<button type="submit" class="btn btn-info">
			<i class="icon-ok icon-white"></i> Login
		</button>
		<button type="reset" class="btn">
			<i class="icon-refresh icon-black"></i> Clear
		</button>
		<br></br>
		<p>Not a registered user? <a href="register.php">Sign up!</a> </p>
		</center>
      </form>

    </div>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js_lr/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js_lr/bootstrap.js"></script>
	</BODY>
<?php
include("db_login.php");
session_start();
if(isset($_POST['save'])){
                   
               
        
					$userid  = mysqli_real_escape_string($con,$_POST['userid']);
					$password = mysqli_real_escape_string($con,$_POST['password']);
$query = "SELECT * FROM register WHERE userid = '$userid' and password = '$password'" ;
						$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
					if(mysqli_num_rows($query_run) == 1)
					{
						
					$_SESSION['userid'] = $userid;
                            echo "<div class='container'>
                            <div class='alert alert-success'>
                                <strong>Success!</strong> login succsess !! welcome.
                            </div>";
                           header('location: index.php');
					}
					  else{
						echo "<div class='container'>
                        <div class='alert alert-danger'>
                            <strong>Incorrect Combination!</strong> Failed to login!!.
                            $error = 'You are not registered.';
                          </div> ";
                      }

                          if (isset($error)) {
    header('Location: login.php?e='.urlencode($error)); exit;
}
					
	}			
					?>


</HTML>