<?php
require_once 'classes/Connection.php';
require_once 'classes/Cleaner.php';

try {
    $cleaner = new Cleaner();
    
    $cleaner->Supervisor_ID = $_POST['Supervisor_Name'];
    $cleaner->Cleaner_Name = $_POST['Cleaner_Name']; 
    $cleaner->Cleaner_Email = $_POST['Cleaner_Email'];
    $cleaner->Cleaner_Phone = $_POST['Cleaner_Phone'];
    $cleaner->Cleaner_PPS = $_POST['Cleaner_PPS'];
    $cleaner->Cleaner_Rate = $_POST['Cleaner_Rate'];
    $cleaner->Cleaner_Type = $_POST['Cleaner_Type'];
    
  

    $cleaner->save();

    header("Location: index.php");
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>
