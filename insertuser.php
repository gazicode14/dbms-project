<?php
 $conn = mysqli_connect("localhost","root","","crudweb");
 $name = $_POST['sname'];
 $roll = $_POST['sroll'];
 $mail = $_POST['semail'];
 $pass = $_POST['spass'];
 if(empty($name)|| empty($roll)||empty($mail)||empty($pass))
 {
    header('location:index.php');
    exit;
 }
 $sql = "INSERT into student(name,roll,email,password) VALUES('" . $name . "','" . $roll . "','" . $mail . "','" . $pass . "')";

 $stmt = $conn->prepare($sql);
 $stmt->execute();
 header('location:index.php');

?>