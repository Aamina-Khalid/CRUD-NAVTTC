<?php

  require_once "../app/database.php";
  use App\Database;
  $db = new Database();

  $title= "Add/Edit Your Data";
  
  // super global variable
  if($_POST){
    $id = $_POST['id'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $dob = $_POST['dob'];

     if($id)
     {
      $db->updateData($id, $name, $email, $dob);
     }
     else
     {
      $db->addData($name, $email, $dob);
     }

     header("Location: index.php");
  }

  // ternary operator
  $id = $_GET['id'] ?? null;

  if($id){
    $id_data = $db->getID($id);
  }
  else{
    $id_data = array();
  }
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

      <!-- Form -->
      <form method="post">
      
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name" class="form-control" value="<?php echo $id_data['name'] ?? null;?>">
      <!-- for and id values should be same -->
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter Your Email" class="form-control" value="<?php echo $id_data['email'] ?? null;?>">
      </div>

      <div class="mb-3">
        <label for="Date Of Birth" class="form-label">Date of Birth</label>
        <input type="date" id="Date Of Birth" name="dob" placeholder="Enter Your DOB" class="form-control" value="<?php echo $id_data['dob'] ?? null;?>">
      </div>

      <input type="hidden" name="id" value="<?php echo $id ?>">

      <div>
        <button type="submit" class="btn btn-primary"> Save </button>
        <button type="submit" class="btn btn-secondary"> Cancel </button>
      </div>

    </form>
        
</body>
</html>