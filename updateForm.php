<?php
require_once 'classes/Connection.php';
require_once 'classes/Util.php';
require_once 'classes/Cleaner.php';

try {
    $supervisors = Util::selectAll('supervisor_tbl');
    $cleaner = Cleaner::find($_GET['id']);
    $cleaners = Util::selectAll('cleaner_tbl');

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
        
        <form method="POST" action="addRace.php" class="cleaner_form" id="myForm">
            
            <h1 class="form-title">UPDATE CLEANER</h1>
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
                <input type="text" name="Cleaner_Name" class="form-row" placeholder="Name" value=" <?= $cleaner->Cleaner_Name ?>" required>
            </div>
          
            <div>
                <label>Email</label>
                <input type="email" name="Cleaner_Email" class="form-row" placeholder="Email" value="<?= $cleaner->Cleaner_Email ?>" required>
            </div>
            
            <div>
                <label>Phone</label>
                <input type="text" name="Cleaner_Phone" class="form-row" placeholder="Phone" value="<?= $cleaner->Cleaner_Phone ?>" required>
            </div>
            
            <div>
                            <label>PPS</label>
                <input type="text" name="Cleaner_PPS" class="form-row" placeholder="PPS Number" value="<?= $cleaner->Cleaner_PPS ?>" required>
            </div>
            
             <div>
                            <label>Rate</label>
                <input type="text" name="Cleaner_Rate" class="form-row" placeholder="Hourly Rate" value="<?= $cleaner->Cleaner_Rate ?>" required>
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
            <input class="dropbtn-form1" onclick="formReset()" type="reset" value="Reset" />
    </div>
            <input type="submit" class="dropbtn-form">
            
            
        </form>
        </div>             
           
        <script>
        function formReset() {
            document.getElementById("cleaner_email").innerHTML = " aaaa";
        }
        </script>



    </body>
</html>
