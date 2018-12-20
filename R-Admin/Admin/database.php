<?php
$con = mysqli_connect("localhost","root","","project");


if($con){
echo '<script type="text/javascript">alert("Db connected!")</script>';
  }
  else
  {
	    echo '<script type="text/javascript">alert("Db could not connect!")</script>';
  }

  ?>