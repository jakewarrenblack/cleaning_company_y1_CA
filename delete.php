<?php


session_start();
$db = mysqli_connect('localhost', 'root', '', 'cleaning_db');

//In index.php we say delete.php?del=<?php echo $cleaner->id;
//So now 'del' has got our cleaner id. We say $id = ...retrieve our id.
//Now we can insert this id into our sql statement to delete from the cleaner_tbl for our selected id.
if(isset($_GET['del'])){
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM cleaner_tbl WHERE id=$id");
    
    $_SESSION['message'] = "Cleaner Deleted";
    header('location: index.php');
    //HTTP header is code that sends data between a server and a browser. header() sends a HTTP header to the client.
}



?>