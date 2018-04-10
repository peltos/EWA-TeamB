<?php
// do any authentication first, then add POST variable to session

$streamerId = $_POST["streamerId"];
$isActive = $_POST["isActive"];

echo $streamerId . " - " . $isActive;

if ($isActive == 'true'){
    $sql = "INSERT INTO Favorite (Member_memberEmail, Streamer_streamID) VALUES (:useEmail, :streamerId)";
    $query = $this->db->prepare($sql);
    $parameters = array(':useEmail' => $_SESSION["email"], ':streamerId' => $streamerId);

    $query->execute($parameters);
}
elseif($isActive == 'false'){
    $sql = "DELETE FROM Favorite WHERE Member_memberEmail = :useEmail AND Streamer_streamID = :streamerId;";
    $query = $this->db->prepare($sql);
    $parameters = array(':useEmail' => $_SESSION["email"], ':streamerId' => $streamerId);

    $query->execute($parameters);
}else{
    alert("Something went wrong. Try later again");
}
?>