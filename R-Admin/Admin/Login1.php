<!DOCTYPE html>
<html>

<head>
 
  <meta charset = "UTF-8">
  <meta http-equiv="X-UA-Compatible" content = "IE-edge">
  <meta name = "viewport" content = "width = device-width">
   <title>
   Admin
  </title>
  <link type = "text/css" rel = "stylesheet" href = "css/bootstrap.css"/>
  <link type = "text/css" rel = "stylesheet" href = "css/mystyle.css"/>
  <link rel = "stylesheet" href = "http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>

    <?php
            session_start();
            $email = "";
			$password = "";
            $username = "root";
            $pass = "";
            $server = "localhost";
            $database = "adminlogin";
            $db_handle = mysql_connect($server,$username,$pass);
            $db_found = mysql_select_db($database,$db_handle);
				
			if(isset($_POST['login'])){
                   
                if(!empty($_POST['email']) && !empty($_POST['password'])){
        
					$email  = $_POST['email'];
					$password = $_POST['password'];
		
					$result = mysql_query("select * from user where email = '$email' and password = '$password'")
							or die("Failed to query database ".mysql_error());
								$db_field = mysql_fetch_assoc($result);
								
				    if($db_field['email'] == $email && $db_field['password'] == $password){
                            echo "<div class='container'>
                            <div class='alert alert-success'>
                                <strong>Success!</strong> login succsess !! welcome.
                            </div>";
                           header('location: Home.php');
					}
                    else{
						echo "<div class='container'>
                        <div class='alert alert-danger'>
                            <strong>Incorrect Combination!</strong> Failed to login!!.
                          </div> ";
					}
                }
            
          
                 
?>

    
    <script type = "text/javascript" src = "js/jquery-3.2.1.min.js"></script>
	<script type = "text/javascript" src = "js/bootstrap.js"></script>
	
    </body>
</html>
