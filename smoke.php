<?php 
include 'db.php';
include 'api.php';
?>
	  
<!DOCTYPE html>
<html>
    <head>
        <title>Smoke</title>
    </head>
    <body>
      <div class="container-fluid" >
        <form id="form" action="" method="POST">
          <button name="back">Back to work</button>
			<?php session_start();
			if( isset( $_POST['back'] ) )
			{
				setSmokeEndTime($db,$_SESSION['workday_id'],date("Y-m-d H:i:s"));
				header ('Location: http://workday/work.php');  
				exit();
			}
			?>
		</form>
      </div>
    </body>
</html>
