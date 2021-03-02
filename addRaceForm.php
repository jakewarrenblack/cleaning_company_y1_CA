<?php
require_once 'classes/Connection.php';
require_once 'classes/Util.php';

try {
    $supervisors = Util::selectAll('supervisor_tbl');
    $cleaners = Util::selectAll('cleaner_tbl');

 
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>
<style>
label {
	font-weight:bold;
	display: block;
}
</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel=stylesheet href="style.css">
        <title>Races</title>
    </head>
    <body onload="document.body.style.opacity='1'"> 
        <div class="container">
        
        <form method="POST" action="addRace.php" class="cleaner_form">
            
            <h1 class="form-title">ADD NEW CLEANER</h1>
            <br>
            
                        <div>
			<label class="select-label">Choose Supervisor</label>
            <select name="Supervisor_Name" required>
                <?php foreach ($supervisors as $supervisor) { ?>

                
                <option value="<?= $supervisor['id']; ?>"><?= $supervisor['Supervisor_Name']; ?></option>
                
                
                
                <?php } ?>
                
                
                
            </select>
            </div>
            
            <div>
                <label>Name</label>
                <input type="text" name="Cleaner_Name" class="form-row" placeholder="Name" required>
            </div>
          
            <div>
                <label>Email</label>
                <input type="email" name="Cleaner_Email" class="form-row" placeholder="Email" required>
            </div>
            
            <div>
                <label>Phone</label>
                <input type="text" name="Cleaner_Phone" class="form-row" placeholder="Phone" required>
            </div>
            
            <div>
                            <label>PPS</label>
                <input type="text" name="Cleaner_PPS" class="form-row" placeholder="PPS Number" required>
            </div>
            
             <div>
                            <label>Rate</label>
                <input type="text" name="Cleaner_Rate" class="form-row" placeholder="Hourly Rate" required>
            </div>
            
                        <div class="pushDown">
			<label class="select-label">Choose Cleaner Type</label>
            <select name="Cleaner_Type" required>
                <option value="Residential">Residential</option>
                <option value="Office">Office</option>
            </select>
            </div>
			
            


<div class="two-buttons">
            <input type="button" class="dropbtn-form1" value="Go back!" onclick="history.back()">
            <input class="dropbtn-form1" type="reset" value="Reset" />
    </div>
            <input type="submit" class="dropbtn-form">
            
            
        </form>
        </div>             
                   
    </body>
</html>
