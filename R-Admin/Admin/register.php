<?php


@include('database.php'); 
  
  if(isset($_POST['submit'])) { 
    $username = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['pass']; 
    $lastname = $_POST['lastname'];
    $dept = $_POST['dept'];
    $id = $_POST['id'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];

  
    $result = "SELECT * FROM user WHERE username='$username' OR email='$email' OR id='$id' or firstname='$firstname' OR lastname='$lastname'";
    $query_run = @mysqli_query($con,$result);
    if ( @mysqli_num_rows($query_run) > 0 ) {
        echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
      }
      
    else{
    $sql = "INSERT INTO user (username,password,email,firstname,lastname,dept,id,year,Semester) values('$username','$password','$email','$firstname','$lastname','$dept','$id','$year','$semester')";
    if(@mysqli_query($con,$sql)){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;            
      
  }
    }
  
  }
  
?>


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
  <link type = "text/css" rel = "stylesheet" href = "css/newstyle.css"/>
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="icon" href="favicon-1.ico" type="image/x-icon">
  <link rel = "stylesheet" href = "http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>



<body>
    <div class = "container"><br>   
        <br><img src = "images/user-io.png"><br><br>
        <form action="Login1.php" method = "POST">
            <div class = "form-input">
            <div class = "input-group input-group-sm">
                            <span class = "input-group-addon sizing_addon1"><i class = "fa fa-envelope" aria-hidden = "true"></i></span>
                             <label>Username:</br>
                  <input type="text" id="name" name="name" maxlength="30" required /></label></br>
                            <input type = "text" class = "form-control" aria-describedby = "sizaing-addon1" placeholder = "Email Address" id = "email" name = "email">

            </div>
            </div>
            <div class = "form-input">
            <div class = "top2"> 
             <div class = "input-group input-group-sm">
                            <span class = "input-group-addon sizing_addon1"><i class = "fa fa-unlock" aria-hidden = "true"></i></span>
                            <input type = "Password" class = "form-control" aria-describedby = "sizaing-addon1" placeholder = "Password" id = "password" name = "password">

                            </div>

            </div>
            </div>
            <div class = "top2"> 
             <div class="col-md-4">
                 <div class = "chk-rem">
                   <input type= "checkbox" name = "Remember" id = "Remember" value = "1"/>      Remember me
                 </div>
                </div>
            <div class="col-md-8">
             <input type= "submit" class = "btn-login" value = "Login" name = "login">
            </div>
            </div>
        </form><br><br>
        <div class = "top2"> 
       
         </div>
    </div>
    <script type = "text/javascript" src = "js/jquery-3.2.1.min.js"></script>
	<script type = "text/javascript" src = "js/bootstrap.js"></script>
	
    </body>
</html>


