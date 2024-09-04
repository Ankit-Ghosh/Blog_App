<?php
  include '../app/pages/includes/header.php';
?>


<h3 class="mx-4 my-5">Featured</h3>

<div class="row mb-2 justify-content-center">
    <?php

    $query = "SELECT posts.*,categories.category FROM posts join categories on posts.category_id = categories.id ORDER BY id DESC LIMIT 3";
    $rows = query($query);

    if($rows){
      foreach($rows as $row){
        include '../app/pages/includes/post-card.php';
      }
    }else{
      echo "<div class='alert alert-warning'>No posts found</div>";
    }
    
    
    ?>
</div>

<?php
  include '../app/pages/includes/footer.php';
?>

