<?php session_start();?>
<?php require_once('../inc/config.php'); ?>


<?php 
	//check if a admin is logged in
	if(!isset($_SESSION['adminID'])){
		header("Location: ../admin.php?message=not_login");
	} 
?> 

<?php 

if (isset($_POST['submit'])) {
    $nnotification = $_POST['notification']; 
    $adminID = $_SESSION['adminID'];

    $sql = "INSERT INTO notification (notification, adminID) VALUES ('$nnotification', '$adminID')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ./noti.php?msg=Added Successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarePro Insurance</title>
	<link rel="icon" type="image/png" href="./Logo3t.png">
	
	<!-- ADD CSS FILES -->
    <link rel="stylesheet" href="../styles/generalstyle.css">
	<link rel="stylesheet" href="notistyle.css">
    
	
</head>

<?php include('../header/adminafterlog.php')?>

    <div class="addfile">

<h2>Add New Notification</h2>
    <form action="" method="POST">

        Notification :<br><br>
        <textarea id="notification" name="notification" rows="5" cols="32" placeholder="Type your notification here....."></textarea>

        <input type="submit" name="submit" value="Submit">
    </form>

    </div>


<?php include('../footer/footer.php')?>
