<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Showing Data</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<h1>Selected Club Data</h1>


<?php
$club_id = $_GET['club_id'];
// connection to database
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395834', 'gc200395834', 'RfOMQChbzO');
// selecting data from clubs table
$sql = "Select * from clubs WHERE club_id = :club_id";
// execute & store the result
$cmd = $db->prepare($sql);
$cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
$cmd->execute();

//having data from the table clubs
$clubs = $cmd->fetchAll();
// starting table
echo '<table class="table table-striped table-hover"><thead><th>Club Name</th><th>Ground</th><th>Club Id</th></thead>';
// loop through the data & show each restaurant on a new row
foreach ($clubs as $c) {
    echo "<tr><td> {$c['club_name']} </td>
        <td> {$c['ground']} </td>
         <td> {$c['club_id']} </td></tr>";
        }
// close the table
echo '</table>';

// disconnect
$db = null;

?>
<a href="Form.php">Back To Main Page</a>






</body>

</html>