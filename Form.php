<?php
try{
//When we will edit the data variables would be null to store new values
$club_name = null;
$ground = null;
$club_id = null;

//This will only take those in consideration which are already their
if (!empty($_GET['club_id'])) {
    $club_id = $_GET['club_id'];
    // connection to the database is established
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');
    // this will select the data from the clubs table where id will be the same as selected for editing
    $sql = "SELECT * FROM clubs WHERE club_id = :club_id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
    $cmd->execute();
    //This will fetch the data of that particular id
    $r = $cmd->fetch();
    // This is bw storing the new edited values
    $club_name = $r['club_name'];
    $ground = $r['ground'];

    // disconnect
    $db = null;
}
}
catch(Exception $e) {
    //this will send the user on main page
    mail('kbanyal10@gmail.com', 'Barrie Eats Error', $e);
    header('location:error.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Club Details</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<!--This will show the data saved-->
<a href="showingdata.php">View Table</a>

<h1>Club Details</h1>
<!--Form will go to the saving page after getting filled -->
<form method="post" action="savingdata.php">
    <fieldset>
        <label for="club_name" class="col-md-1">Club Name: </label>
        <input name="club_name" id="club_name" required value="<?php echo $club_name; ?>" />
    </fieldset>
    <fieldset>
        <label for="ground" class="col-md-1">Ground: </label>
        <input name="ground" id="ground" required value="<?php echo $ground; ?>" />
    </fieldset>
        </select>
    </fieldset>
    <button class="col-md-offset-1 btn btn-primary">Save</button>
    <input type="hidden" name="club_id" id="club_id" value="<?php echo $club_id; ?>" />
</form>




</body>
</html>