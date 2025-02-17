<?php
 $conn = mysqli_connect("localhost","root","","crudweb");
 $id = $_GET['x'];
 $stmt = $conn->prepare("DELETE FROM student WHERE roll=$id");
 $stmt->execute();
 header('location:index.php');
?>

