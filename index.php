<!DOCTYPE HTML>

<?php
	include('db_login.php');
	session_start();

?>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Table Reservation Date</title>
		<link rel="stylesheet" type="text/css" href="css_lr/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css_lr/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="css_lr/datepicker.css" />
	</HEAD>

	<BODY>
		<br /><br /><br />
		<div class="container">
			<div class="row well">
				<div class="span10">
					<form action="seat.php" method="POST">
						<center>
							<label>Date of Reservation</label>



							<div data-date-format="yyyy-mm-dd" data-date="document.write(date())" class="input-append date myDatepicker">
							    <input type="text" value="" name="doj" size="16" class="span2" required>
							    <span class="add-on"><i class="icon-calendar"></i></span>
							</div>


							<!--<input type="date" class="span2" name="doj" placeholder="YYYY-MM-DD" required/>-->
							<br><br>
							<button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./login.php" class="btn btn-danger"><i class="icon-remove icon-white"></i> Cancel Reservation </a>
						</center>
					</form>
				</div>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js_lr/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js_lr/bootstrap.js"></script>
		<script type="text/javascript" src="js_lr/bootstrap-datepicker.js"></script>
		<script>
			$('.myDatepicker').each(function() {
			    var minDate = new Date();
			    minDate.setHours(0);
			    minDate.setMinutes(0);
			    minDate.setSeconds(0,0);
			    
			    var $picker = $(this);
			    $picker.datepicker();
			    
			    var pickerObject = $picker.data('datepicker');
			    
			    $picker.on('changeDate', function(ev){
			        if (ev.date.valueOf() < minDate.valueOf()){
			            
			            // Handle previous date
			            alert('You can not select past date.');
			            pickerObject.setValue(minDate);
			            
			            // And this for later versions (in case)
			            ev.preventDefault();
			            return false;
			        }
			    });
			});					
		</script>
	</BODY>
</HTML>