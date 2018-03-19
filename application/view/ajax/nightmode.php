<?php
// do any authentication first, then add POST variable to session

session_start();
$nightmode = $_POST["modus"];

if ($nightmode == 'dark-theme')
    $_SESSION['nightmode'] = 'true';
else{
    $_SESSION['nightmode'] = 'false';
}
?>