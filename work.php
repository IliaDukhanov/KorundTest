<?php 
include 'db.php';
include 'api.php';
?>
	  
<!DOCTYPE html>
<html>
    <head>
        <title>Ofice</title>
    </head>
    <body>
      <div class="container-fluid" >
        <form id="form" action="" method="POST">
          <button name="leave">Leave</button>
		  <button name="smoke">Smoke</button>
			<?php session_start();
			if( isset( $_POST['leave'] ) )
			{
				setLeaveTime($db,$_SESSION['logged_user'],date("Y-m-d H:i:s"));
				header ('Location: http://workday/index.php');  
				exit();
			}
			if( isset( $_POST['smoke'] ) )
			{
				setSmokeTime($db,$_SESSION['workday_id'],date("Y-m-d H:i:s"));
				header ('Location: http://workday/smoke.php');  
				exit();
			}
			?>
		</form>
      </div>
    </body>
</html>
