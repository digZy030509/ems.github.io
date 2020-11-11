<?php 

require 'conn.php'; 
$id = $_GET['j_id'];
$sql = "DELETE FROM jobs WHERE j_id='$id'";

if (mysqli_query($conn, $sql)) {
    header('Location: job_list.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>