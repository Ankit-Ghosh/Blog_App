<?php
  include '../app/pages/includes/header.php';
?>

<div class="mx-auto col-md-11">
    <h3 class="mx-4 my-5">Category</h3>
    
    <div class="row mb-2 justify-content-center">
        <?php
            $limit=6;
            $offset = ($PAGE['page_number']-1)*$limit;
            
            $category_slug = $url[1] ?? null;
            
            if($category_slug){
                $query = "SELECT posts.*,categories.category FROM posts join categories on posts.category_id = categories.id where posts.category_id in (select id from categories where slug = :category_slug) ORDER BY id DESC LIMIT $limit offset $offset";
                $rows = query($query,['category_slug'=>$category_slug]);
            }

            if(!empty($rows)){
                foreach($rows as $row){
                    include '../app/pages/includes/post-card.php';
                }
            }else{
                echo "<div class='alert alert-warning'>No posts found</div>";
            }
        ?>
    </div>

    <div class="col-md-12 my-4">
        <a href="<?=$PAGE['first_link']?>">
            <button class="btn btn-primary">First Page</button>
        </a>
        <a href="<?=$PAGE['prev_link']?>">
            <button class="btn btn-primary">Prev Page</button>
        </a>  
        <a href="<?=$PAGE['next_link']?>">
            <button class="btn btn-primary float-end">Next Page</button>
        </a>
    </div>
</div>

<?php
  include '../app/pages/includes/footer.php';
?>

