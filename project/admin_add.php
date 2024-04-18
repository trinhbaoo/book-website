<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_content'])){

   $title = mysqli_real_escape_string($conn, $_POST['title']);
   $content = mysqli_real_escape_string($conn, $_POST['content']);

   $select_content_title = mysqli_query($conn, "SELECT title FROM `contents` WHERE title = '$title'") or die('query failed');

   if(mysqli_num_rows($select_content_title) > 0){
      $message[] = 'Content title already exists';
   }else{
      $add_content_query = mysqli_query($conn, "INSERT INTO `contents`(title, content) VALUES('$title', '$content')") or die('query failed');

      if($add_content_query){
         $message[] = 'Content added successfully!';
      }else{
         $message[] = 'Content could not be added!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contents</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- Content CRUD section starts  -->

<section class="add-contents">

   <h1 class="title">Add   </h1>

   <form action="" method="post">
      <h3>Add </h3>
      <input type="text" name="title" class="box" placeholder="tên sách/truyện" required>
      <textarea name="content" class="box" placeholder="nội dung" required></textarea>
      <input type="submit" value="Add Content" name="add" class="btn">
   </form>

</section>

<!-- Content CRUD section ends -->

<!-- Show Contents  -->

<section class="show-contents">

   <div class="box-container">

      <?php
         $select_contents = mysqli_query($conn, "SELECT * FROM `contents`") or die('query failed');
         if(mysqli_num_rows($select_contents) > 0){
            while($fetch_contents = mysqli_fetch_assoc($select_contents)){
      ?>
      <div class="box">
         <div class="title"><?php echo $fetch_contents['title']; ?></div>
         <div class="content"><?php echo $fetch_contents['content']; ?></div>
         <button class="read-btn">Read</button>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">No contents added yet!</p>';
      }
      ?>
   </div>

</section>

<!-- Custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>