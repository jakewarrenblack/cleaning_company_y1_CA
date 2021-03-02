<?php
 include('delete.php');
//we import the following classes as we use the functions in these classes
//to connect to the database and carry out queries in the database
require_once 'classes/Connection.php';
require_once 'classes/Cleaner.php';
require_once 'classes/Util.php';
require_once 'delete.php';

// try ... catch the purpose of a try catch block is to try perform the action in the try block and
// if an exception occurs while trying to perform the action catch the exception in the catch block and deal with it gracefully
try {
    
    // where is the function selectAll()? see if you can find it in the code I have given you. 
    $cleaners = Cleaner::selectAll(); //Calls on function found in Race.php.
    $rymanLevis = Cleaner::selectByCategory("Ryman Levi");
    $randallTarlys = Cleaner::selectByCategory("Randall Tarly");
      // ** at this stage the variable $races should have an array of races selected from the database
		
 
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
// end of the php code for the moment. 
?>

<!-- now we are using HTML to create a table to output the Race information -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/fca6ae4c3f.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <title>Cleaners</title>
</head>

<body onload="document.body.style.opacity='1'">





    <div class="container">





        <a href="addRaceForm.php">
        <button class="dropbtn">Add Cleaner</button>
        </a>
<br>
        <br>
        <h1>List of Cleaners</h1>
        <hr>


        <h3>All Cleaners</h3>

        <table class="blueTable">
            <thead>
                <tr>
                    <th>Cleaner_ID</th>
                    <th>Supervisor_Name</th>
                    <th>Cleaner_Name</th>
                    <th>Cleaner_Email</th>
                    <th>Cleaner_Phone</th>
                    <th>Cleaner_PPS</th>
                    <th>Cleaner_Rate</th>
                    <th>Cleaner_Type</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
            </thead>
            <tbody>

                <!--- Start of a PHP block, this foreach loop loops through the array called $races, takes the next elemeent in the array
                and puts it in the variable called $race, we then output the individual elements in $race -->
                <?php foreach ($cleaners as $cleaner) { 
				
                // selectByID() is another method I have provided, can you find it and explain whats going on here.
				$supervisor = Util::selectByID('supervisor_tbl', $cleaner->Supervisor_ID);
			
                 //end of the PHP
				?>
                <tr>

                    <td><?= $cleaner->id; ?></td>
                    <td><?= $supervisor["Supervisor_Name"] ?></td>

                    <td><a href="viewRace.php?id=<?= $cleaner->id; ?>"><?= $cleaner->Cleaner_Name; ?></a></td>
                    <td><?= $cleaner->Cleaner_Email; ?> </td>
                    <td><?= $cleaner->Cleaner_Phone; ?> </td>
                    <td><?= $cleaner->Cleaner_PPS; ?> </td>
                    <td><?= $cleaner->Cleaner_Rate; ?> </td>
                    <td><?= $cleaner->Cleaner_Type; ?> </td>
                    <td><a href="updateForm.php?id=<?php echo $cleaner->id; ?>" class="del_btn"><i class="fas fa-pen"></i></a></td>
                    <td><a href="delete.php?del=<?php echo $cleaner->id; ?>" class="del_btn"><i class="fas fa-trash"></i></a></td>

                </tr>
                <!-- another bit of PHP, with one } to finish off the foreach loop -->
                <?php } ?>
            </tbody>
        </table>
        <br>

        <br>
        <br>
        <!--If the delete function runs, $_SESSION['message'] is set.-->
        <?php if (isset($_SESSION['message'])): ?>
    <html>
        <div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
    </div>
    </html>
<?php endif ?>

<!--        <img src="schedule.PNG">-->


<br>
<br>
        <h1>View by Supervisor</h1>

<br>
        <div class="dropdown">
            <button class="dropbtn">Select Supervisor</button>
            <div class="dropdown-content">
                <a href="#" onclick="showLevi()">Ryman Levi</a>
                <a href="#" onclick="showTarly()">Randall Tarly</a>
            </div>
        </div>



<!--
        <button onclick="showLevi()">Show Levi</button>
        <button onclick="showTarly()">Show Tarly</button>
-->

        <script>
            function showLevi() {

                var x = document.getElementById("levi");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }


            }

            function showTarly() {

                var x = document.getElementById("tarly");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }


            }

        </script>



        <hr>

        <br>
<div id="levi">
        <table class="blueTable">
            <h3>Ryman Levi</h3>
            <thead>
                <tr>
                    <th>Cleaner_ID</th>
                    <th>Supervisor_Name</th>
                    <th>Cleaner_Name</th>
                    <th>Cleaner_Email</th>
                    <th>Cleaner_Phone</th>
                    <th>Cleaner_PPS</th>
                    <th>Cleaner_Rate</th>
                    <th>Cleaner_Type</th>


                </tr>
            </thead>
            <tbody>

                <!--- Start of a PHP block, this foreach loop loops through the array called $races, takes the next elemeent in the array
                and puts it in the variable called $race, we then output the individual elements in $race -->
                <?php foreach ($rymanLevis as $rymanLevi) { 
				
                // selectByID() is another method I have provided, can you find it and explain whats going on here.
				$supervisor = Util::selectByID('supervisor_tbl', $cleaner->Supervisor_ID);
			
                 //end of the PHP
				?>
                <tr>
                    <td><?= $rymanLevi->id; ?></td>
                    <td>Ryman Levi</td>
                    <td><?= $rymanLevi->Cleaner_Name; ?> </td>
                    <td><?= $rymanLevi->Cleaner_Email; ?> </td>
                    <td><?= $rymanLevi->Cleaner_Phone; ?> </td>
                    <td><?= $rymanLevi->Cleaner_PPS; ?> </td>
                    <td><?= $rymanLevi->Cleaner_Rate; ?> </td>
                    <td><?= $rymanLevi->Cleaner_Type; ?> </td>

                </tr>

                <!-- another bit of PHP, with one } to finish off the foreach loop -->
                <?php } ?>
            </tbody>
        </table>
        </div>


<div id="tarly">
        <table class="blueTable">
            <h3>Randall Tarly</h3>
            <thead>
                <tr>
                    <th>Cleaner_ID</th>
                    <th>Supervisor_Name</th>
                    <th>Cleaner_Name</th>
                    <th>Cleaner_Email</th>
                    <th>Cleaner_Phone</th>
                    <th>Cleaner_PPS</th>
                    <th>Cleaner_Rate</th>
                    <th>Cleaner_Type</th>


                </tr>
            </thead>
            <tbody>

                <!--- Start of a PHP block, this foreach loop loops through the array called $races, takes the next elemeent in the array
                and puts it in the variable called $race, we then output the individual elements in $race -->
                <?php foreach ($randallTarlys as $randallTarly) { 
				
                // selectByID() is another method I have provided, can you find it and explain whats going on here.
				$supervisor = Util::selectByID('supervisor_tbl', $randallTarly->Supervisor_ID);
			
                 //end of the PHP
				?>
                <tr>
                    <td><?= $randallTarly->id; ?></td>
                    <td>Randall Tarly</td>
                    <td><?= $randallTarly->Cleaner_Name; ?> </td>
                    <td><?= $randallTarly->Cleaner_Email; ?> </td>
                    <td><?= $randallTarly->Cleaner_Phone; ?> </td>
                    <td><?= $randallTarly->Cleaner_PPS; ?> </td>
                    <td><?= $randallTarly->Cleaner_Rate; ?> </td>
                    <td><?= $randallTarly->Cleaner_Type; ?> </td>

                </tr>

                <!-- another bit of PHP, with one } to finish off the foreach loop -->
                <?php } ?>
            </tbody>
        </table>
</div>




    </div>





</body>

</html>
