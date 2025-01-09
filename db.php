<?php
$conn = mysqli_connect("localhost", "root", "", "multi_auth");
if ($conn) {
    // echo "Successfully";
} else {
    echo "Faield";
}
error_reporting(0);
?>