<?php
// do any authentication first, then add POST variable to session

$streamerId = $_POST["streamerId"];


if(isset($_POST["streamerId"])){
$sql = "UPDATE Favorite
  SET likes = likes + 1 
  WHERE Member_memberEmail = :useEmail AND Streamer_streamID = :streamerId";
///// ik hoop dat de haakjes hier geen probleem geven
    $query = $this->db->prepare($sql);
    $parameters = array(':useEmail' => $_SESSION["email"], ':streamerId' => $_POST["streamerId"]);

    $query->execute($parameters);
}
?>