<?php
 $conn = mysqli_connect("localhost","root","","crudweb");
 session_start();
 if($_SESSION['id']==NULL)
 {
    header('location:login.php');
    exit;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <a href="logouthelper.php">Logout</a>
    <div class = "container">
        <form method="POST" action = "insertuser.php">
            <h6>Name</h6>
            <input type = "text" name="sname">
            <h6>Roll</h6>
            <input type = "text" name="sroll">
            <h6>Email</h6>
            <input type = "email" name="semail">
            <h6>Password</h6>
            <input type = "password" name="spass">
            <br>
            <button>Insert User </button>
           
        </form>
    
    <div class = "container">
            <table class="table">
        <thead>
            <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Roll</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Remove</th>
            
            </tr>
        </thead>

        <?php
          $stmt = $conn->prepare("SELECT *FROM student");
          $stmt->execute();
          $res = $stmt->get_result();
          $serial = 0;
        ?>
        <?php
          while($result = $res->fetch_assoc())
          {
            $serial+=1;
        
        ?>


            <tr>
            <th scope="row"><?php echo $serial;?></th>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['roll'];?></td>
            <td><?php echo $result['email'];?></td>
            <td><?php echo $result['password'];?></td>
            <td><a href = "deletehelper.php?x=<?php echo $result['roll'];?>">Delete</td>
            
            </tr>
        <?php 
          }
        ?>

        </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>