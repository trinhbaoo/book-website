<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Contents</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/user_style.css">

   <style>
      .content-box {
         border: 1px solid #ccc;
         margin-bottom: 20px;
         padding: 10px;
         font-size: 25px; 
      }
   </style>
</head>
<body>
   <h1>User Contents</h1>
   <div class="content-container">
      <?php include 'admin_add.php'; ?>
   </div>

   <!-- Custom admin js file link -->
   <script src="js/user_script.js"></script>
</body>
</html>
