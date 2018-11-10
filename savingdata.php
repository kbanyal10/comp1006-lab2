<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Clubs</title>
</head>
<body>

<?php
// This variable will store the values
$club_id = $_POST['club_id'];
$club_name = $_POST['club_name'];
$ground = $_POST['ground'];



//connection to the database is established
try {
    require('database.php');
    //If the club id is empty, i.e new entry is being filled than form will store the new entries for everything
    if (empty($club_id)) {
        $sql = "INSERT INTO clubs (club_name, ground) 
    VALUES (:club_name, :ground)";
    } //This else if for old entries, and this will update the existing data
    else {
        $sql = "UPDATE clubs SET club_name = :club_name, ground = :ground WHERE club_id = :club_id";
    }
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':club_name', $club_name, PDO::PARAM_STR, 50);
    $cmd->bindParam(':ground', $ground, PDO::PARAM_STR, 50);
//This indicates that if the id is old than keep the older id in it
    if (!empty($club_id)) {
        $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);

    }
    $cmd->execute();
    // disconnect
    $db = null;
}
catch(Exception $e) {
    //this will send the user on main page
    mail('kbanyal10@gmail.com', 'Barrie Eats Error', $e);
    header('location:error.php');
}

?>

</body>
</html>