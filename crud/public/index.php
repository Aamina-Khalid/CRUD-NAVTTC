<?php
  require_once "../app/database.php";
  use App\Database;

  $db = new Database();

  $title= "Simple PHP CRUD Application";

  $all_data = $db->getData();
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BS CS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Title -->
    <title><?php echo $title?></title>
</head>

<body class="container">
    
    <h2 class="my-5 text-center"><?php echo $title?></h2>
    
    <!-- Table -->
<table class="table">

    <head>
        <tr>
           <th>Name</th>
           <th>Email</th>
           <th>DOB</th>
           <th>Action</th>
        </tr>
    </head>
    
    <tbody>

        <?php foreach ($all_data as $data): ?>
        <tr>
            <td><?php echo $data ['name']?></td>
            <td><?php echo $data ['email']?></td>
            <td><?php echo $data ['dob']?></td>
           <td>
               <a href="add_edit.php?id=<?php echo $data['id'];?>" class="btn btn-primary">Edit</a>
               <a href="delete.php?id=<?php echo $data['id'];?>" class="btn btn-danger">Delete</a>
           </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <!-- Add Data -->
<a href="add_edit.php" class="btn btn-success">Add Data</a>

    <!-- BS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>