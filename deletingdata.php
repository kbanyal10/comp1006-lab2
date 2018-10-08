<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Data</title>
</head>
<body>

<?php
// The selected id will be now stored in club_id through get
$club_id = $_GET['club_id'];
//If the id is empty and we are trying to delete than it will direct the user to the main page
if (empty($club_id)) {
    header('location:showingdata.php');
}

// connection to the databse
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');
// taking data from the table clubs and that too specifically id
$sql = "DELETE FROM clubs WHERE club_id = :club_id";
$cmd = $db->prepare($sql);
$cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
$cmd->execute();
// disconnect
$db = null;
// redirect to the main page
header('location:showingdata.php');
?>
}
</body>
</html>