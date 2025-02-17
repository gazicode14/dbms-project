<?php
$conn = mysqli_connect("localhost","root","","crudweb");
session_start();
$smail = $_POST['smail'];
$spass = $_POST['spass'];
$stmt = $conn->prepare("SELECT *FROM student WHERE email='".$smail."' and password='".$spass."'");
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows>0)
{
    session_start();
    $_SESSION['id']=1;
    header('location:index.php');
}
else
{
    header('location:login.php');
}

?>