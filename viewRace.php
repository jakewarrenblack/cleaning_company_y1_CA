<?php
require_once 'classes/Connection.php';
require_once 'classes/Cleaner.php';
require_once 'classes/Util.php';

try {
   
    $cleaner = Cleaner::find($_GET['id']);
    if ($cleaner === FALSE) {
        throw new Exception("Cleaner not found");
    }
	else {
		$supervisor = Util::selectByID('supervisor_tbl', $cleaner->Supervisor_ID);
        
	}
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}


?>

<style>
    label {
        font-weight: bold;
        display: block;
    }

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Race</title>
    <link rel="stylesheet" href="style.css">
</head>

<body onload="document.body.style.opacity='1'"> 
    <div class="container">

    <h1>View Single Cleaner</h1>
    <hr>
    <h3><?= $cleaner->Cleaner_Name ?></h3>


    <table class="blueTable">
            <thead>
                <th>Cleaner_ID</th>
                <th>Cleaner_Name</th>
                <th>Cleaner_Type</th>
            </thead>


            <tbody>
                <tr>

                    <td><?= $cleaner->id ?></td>

                    <td><?= $cleaner->Cleaner_Name ?></td>

                    <td><?= $cleaner->Cleaner_Type ?></td>

                </tr>
            </tbody>
    </table>
    
    <br>
<br>
    <input type="button" class="dropbtn" value="Go back!" onclick="history.back()">

</div>
</body>

</html>
