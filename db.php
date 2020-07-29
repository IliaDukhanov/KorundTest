<?php $user = "root"; $password = ""; 
try {
    $db = new PDO("mysql:host=localhost;dbname=workers_attendance", $user, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}