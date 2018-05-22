<?php
// do any authentication first, then add POST variable to session

session_start();
$messageClear = $_POST["messageClear"];

if ($messageClear == 'true') $_SESSION['message'] = '';

?>