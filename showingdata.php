<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Showing Data</title>
    <!--Connecting to css and bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<h1>Clubs</h1>

<?php
// connection to database
try {
    require('database.php');
// selecting data from clubs table
    $sql = "SELECT * FROM clubs";
// execute & store the result
    $cmd = $db->prepare($sql);
    $cmd->execute();

//having data from the table clubs
    $clubs = $cmd->fetchAll();
// starting table
    echo '<table class="table table-striped table-hover"><thead><th>Club Name</th><th>Ground</th><th>Actions</th></thead>';
// loop through the data & show each restaurant on a new row
    foreach ($clubs as $c) {
        echo "<tr><td> {$c['club_name']} </td>
        <td> {$c['ground']} </td>
        
        <!--Here we have edit and delete links  -->
        <td><a href=\"Form.php?club_id={$c['club_id']}\">Edit</a> | 
        <a href=\"deletingdata.php?club_id={$c['club_id']}\" 
        class=\"text-danger confirmation\">Delete</a> | <a href=\"showthis.php?club_id={$c['club_id']}\">Show</a></td></tr>";
    }
// close the table
    echo '</table>';
// disconnect
    $db = null;
}
catch(Exception $e) {
    // send
    mail('kbanyal10@gmail.com', 'Barrie Eats Error', $e);
    // show generic error page
    header('location:error.php');
}
?>

<!-- Connecting js and jquery -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/clubs.js"></script>


</body>
</html>