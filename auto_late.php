<?php 
include 'db.php';
include 'api.php';
$users = getAllUsers($db);
foreach ($users as $user) {
	$workday = getWorkdayId($db, $user['id']);
	if($workday['date_start'] > "09:00:00")
	{
		autoLate($db, $user['id'], $workday['date_start']);
	}
}