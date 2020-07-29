<?php 
include 'db.php';
include 'api.php';
?>
	  
<!DOCTYPE html>
<html>
    <head>
        <title>Entry</title>
    </head>
    <body>
      <div class="container-fluid" >
        <form id="form" action="" method="POST">
          <div class="form-group">
            <label>Login</label>
            <input name="login" class="form-control" id="login" placeholder="Login"></input>
          </div>
            <?php
			echo date("Y-m-d H:i:s");
              if(isset($_POST['login']) && $_POST['login'] != "") {
                $login = $_POST['login'];
                $users = getAllUsers($db);
                foreach ($users as $user) {
                  if ($user['login'] == $login) {
					setEntryTime($db, $user['id'], date("Y-m-d H:i:s"));
                    session_start();
                    $_SESSION['logged_user'] = $user['id'];
					$workday = getWorkdayId($db, $user['id']);
					$_SESSION['workday_id'] = $workday['id'];
                    header('location: http://workday/work.php');
                  }
                }
                echo('<p>Я вас не знаю</p>');
              }
            ?>
          <button id="submit">Enter</button>
        </form>
      </div>
    </body>
</html>