<?php
function getAllUsers($db) {

    $sql = "SELECT * FROM profile";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result[$row['id']] = $row;
    }
    return $result;
}
function getWorkdayId($db, $profile_id) {

    $sql = "SELECT * FROM workday WHERE profile_id = :profile_id ORDER BY id DESC LIMIT 1";
    $result = array();

    $stmt = $db->prepare($sql);
	$stmt->bindValue(':profile_id', $profile_id, PDO::PARAM_STR);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result = $row;
    }
    return $result;
}
function setEntryTime($db, $profile_id, $date_start){
	$sql = "INSERT INTO workday(profile_id, date_start) 
			VALUES(:profile_id, TIMESTAMP(:date_start))";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':profile_id', $profile_id, PDO::PARAM_STR);
	$stmt->bindValue(':date_start', $date_start, PDO::PARAM_STR);
	$stmt->execute();
}
function setLeaveTime($db, $profile_id, $date_stop){
	$sql = "UPDATE workday 
	SET date_stop = TIMESTAMP(:date_stop)
	WHERE profile_id = :profile_id ORDER BY id DESC LIMIT 1";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':profile_id', $profile_id, PDO::PARAM_STR);
	$stmt->bindValue(':date_stop', $date_stop, PDO::PARAM_STR);
	$stmt->execute();
}
function autoLeave($db, $workday_id, $date_stop){
	$sql = "UPDATE workday 
	SET date_stop = TIMESTAMP(:date_stop)
	WHERE id = :workday_id";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':workday_id', $workday_id, PDO::PARAM_STR);
	$stmt->bindValue(':date_stop', $date_stop, PDO::PARAM_STR);
	$stmt->execute();
}
function autoLate($db, $profile_id, $date_start){
	$sql = "INSERT INTO lateness(profile_id, date) 
			VALUES(:profile_id, TIMESTAMP(:date_start))";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':profile_id', $profile_id, PDO::PARAM_STR);
	$stmt->bindValue(':date_start', $date_start, PDO::PARAM_STR);
	$stmt->execute();
}
function setSmokeTime($db, $workday_id, $date_start){
	$sql = "INSERT INTO workday_pause(workday_id, date_start) 
			VALUES(:workday_id, TIMESTAMP(:date_start))";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':workday_id', $workday_id, PDO::PARAM_STR);
	$stmt->bindValue(':date_start', $date_start, PDO::PARAM_STR);
	$stmt->execute();
}
function setSmokeEndTime($db, $workday_id, $date_stop){
	$sql = "UPDATE workday_pause 
	SET date_stop = TIMESTAMP(:date_stop)
	WHERE workday_id = :workday_id ORDER BY id DESC LIMIT 1";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':workday_id', $workday_id, PDO::PARAM_STR);
	$stmt->bindValue(':date_stop', $date_stop, PDO::PARAM_STR);
	$stmt->execute();
}