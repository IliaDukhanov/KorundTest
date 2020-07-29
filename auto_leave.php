<?php 
include 'db.php';
include 'api.php';
if(date("H:i:s") == "00:00:00")
{
	$users = getAllUsers($db);
	foreach ($users as $user) {
		$workday = getWorkdayId($db, $user['id']);
		if($workday['date_stop'] == "")
		{
		   autoLeave($db, $workday['id'], date("Y-m-d H:i:s")); 
		}
    }
}