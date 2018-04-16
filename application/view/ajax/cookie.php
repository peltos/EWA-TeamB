<?php
// do any authentication first, then add POST variable to session

session_start();
$cookie = $_POST["cookie"];

if ($cookie == 'true')
    $_SESSION['cookie'] = true;
else{
    $_SESSION['cookie'] = false;
}
?>