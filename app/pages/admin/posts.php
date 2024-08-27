<?php if($action == 'add') :?> 
    <div class="col-md-6 mx-auto">
    <form method="post" enctype="multipart/form-data">
    <h1 class="h3 mb-3 fw-normal">Create post</h1>
      <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">Please fix the errors</div>
      <?php endif; ?>

      <div class="my-2">
        Featured Image:<br>
        <label class="d-block">
          <img class="d-block mx-auto my-2 image-preview-edit" src="<?=get_image('')?>" style="cursor:pointer;width: 150px;height: 150px;object-fit:cover;">
          <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
        </label>
        <?php if(!empty($errors['image'])): ?>
          <div class="text text-danger"><?=$errors['image']?></div>
        <?php endif; ?>
        <script>
          function display_image_edit(file){
            document.querySelector('.image-preview-edit').src = URL.createObjectURL(file);
          }
        </script>
      </div>

    <div class="form-floating">
      <input value="<?=old_value('title')?>" name="title" type="text" class="form-control" id="floatingInput" placeholder="Username">
      <label for="floatingInput">Title</label>
    </div>
    <?php if(!empty($errors['title'])): ?>
      <div class="text text-danger"><?=$errors['title']?></div>
    <?php endif; ?>
    
    <div>
      <textarea rows="4" name="content" type="text" class="form-control mb-2" id="floatingInput" placeholder="Post content"><?=old_value('content')?></textarea>
    </div>
    <?php if(!empty($errors['content'])): ?>
      <div class="text text-danger"><?=$errors['content']?></div>
    <?php endif; ?>
    
    <div class="form-floating my-3">
      <select name="category_id" class="form-select">

      <?php 

        $query = "SELECT * FROM categories order by id desc";
        $categories = query($query);
      
      ?>
        <option value=""> --Select-- </option>
        <?php if(!empty($categories)):?>
          <?php foreach($categories as $category):?>
            <option <?= old_select('category_id',$category['id']) ?> value="<?=$category['id']?>"><?=$category['category']?></option>
          <?php endforeach;?>
        <?php endif;?>

      </select>
      <label for="floatingInput">Category</label>
    </div>
    <?php if(!empty($errors['category'])): ?>
      <div class="text text-danger"><?=$errors['category']?></div>
    <?php endif; ?>
    
    <a href="<?=ROOT?>/admin/posts">
      <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
    </a>
    <button class="mt-4 btn btn-lg btn-primary float-end" type="submit">Create</button>
      </form>
      </div>
<?php elseif($action == 'edit') :?> 

  <link rel="stylesheet" href="<?=ROOT?>/assets/summernote/summernote-lite.min.css">
  
  <div class="col-md-12 mx-auto">
	  <form method="post" enctype="multipart/form-data">

	    <h1 class="h3 mb-3 fw-normal">Edit post</h1>


      <?php if(!empty($row)):?>

        <?php if (!empty($errors)):?>
          <div class="alert alert-danger">Please fix the errors below</div>
        <?php endif;?>

        <div class="my-2">
          <label class="d-block">
            <img class="mx-auto d-block image-preview-edit" src="<?=get_image($row['image'])?>" style="cursor: pointer;width: 150px;height: 150px;object-fit: cover;">
            <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
          </label>
          <?php if(!empty($errors['image'])):?>
            <div class="text-danger"><?=$errors['image']?></div>
          <?php endif;?>

          <script>
            
            function display_image_edit(file)
            {
              document.querySelector(".image-preview-edit").src = URL.createObjectURL(file);
            }
          </script>
        </div>

        <div class="form-floating">
          <input value="<?=old_value('title', $row['title'])?>" name="title" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username">
          <label for="floatingInput">Username</label>
        </div>
          <?php if(!empty($errors['title'])):?>
          <div class="text-danger"><?=$errors['title']?></div>
          <?php endif;?>

        <div>
        <textarea id="summernote" rows="4" name="content" id="floatingInput" placeholder="Post content" type="content" class="form-control"><?=old_value('content',$row['content'])?></textarea>
    </div>
    <?php if(!empty($errors['content'])):?>
	      <div class="text-danger"><?=$errors['content']?></div>
      <?php endif;?>

      <div class="form-floating my-3">
	      <select name="category_id" class="form-select">

        <?php  
          $query = "select * from categories order by id desc";
          $categories = query($query);
        ?>
        <option value="">--Select--</option>
        <?php if(!empty($categories)):?>
          <?php foreach($categories as $cat):?>
            <option <?=old_select('category_id',$cat['id'],$row['category_id'])?> value="<?=$cat['id']?>"><?=$cat['category']?></option>
          <?php endforeach;?>
        <?php endif;?>

        </select>
        <label for="floatingInput">Category</label>
      </div>
      <?php if(!empty($errors['category'])):?>
        <div class="text-danger"><?=$errors['category']?></div>
      <?php endif;?>

      <a href="<?=ROOT?>/admin/posts">
			    <button class="mt-4 btn btn-lg btn-primary" type="button">Back</button>
			</a>
      <button class="mt-4 btn btn-lg btn-primary  float-end" type="submit">Save</button>
      <?php else:?>
        <div class="alert alert-danger text-center">Record not found!</div>
      <?php endif;?>

	  </form>
	</div>

  <script src="<?=ROOT?>/assets/js/jquery.js"></script>
  <script src="<?=ROOT?>/assets/summernote/summernote-lite.min.js"></script>
  <script>
    $('#summernote').summernote({
      placeholder: 'Post content',
      tabsize: 2,
      height: 300
    });
  </script>

  <?php elseif($action == 'delete') :?> 
    <div class="col-md-6 mx-auto">
      <form method="post">
        <h1 class="h3 mb-3 fw-normal">Delete post</h1>
  
        <?php if(!empty($row)):?>
        
          <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">Please fix the errors</div>
          <?php endif; ?>

          <div class="form-floating">
            <div class="form-control"><?=old_value('title',$row['title'])?></div>
          </div>
          <?php if(!empty($errors['title'])): ?>
            <div class="text text-danger"><?=$errors['title']?></div>
          <?php endif; ?>
          <div class="form-floating">
            <div class="form-control"><?=old_value('slug',$row['slug'])?></div>
          </div>
          <?php if(!empty($errors['slug'])): ?>
            <div class="text text-danger"><?=$errors['slug']?></div>
          <?php endif; ?>
          
          
          <a href="<?=ROOT?>/admin/posts">
            <button class="btn btn-primary w-100 py-2 mt-4" type="button">Back</button>
          </a>
          <button class="btn btn-danger w-100 py-2 mt-2" type="submit">Delete</button>
        <?php else:?>
          <div class="alert alert-danger">User not found</div>
        <?php endif;?>
  
      </form>
    </div>

    
<?php else:?>

    <h4>
      Posts 
      <a href="<?=ROOT?>/admin/posts/add">
        <button class="btn btn-primary">Add New</button> 
      </a>
    </h4>

    <table class="table-responsive">
        <table class="table">
            <tr>
                <th>#</th> 
                <th>Title</th> 
                <th>Slug</th> 
                <th>Image</th> 
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php
            $limit = 5;
            $offset = ($PAGE['page_number'] - 1) * $limit;

            $query = "SELECT * FROM posts order by id desc limit $limit offset $offset";
            $rows = query($query);

            ?>

            <?php if(!empty($rows)):?>
                <?php foreach($rows as $row):?>
                <tr>
                    <td><?=$row['id']?></td> 
                    <td><?=esc($row['title'])?></td> 
                    <td><?=$row['slug']?></td> 
                    <td>
                      <img src="<?=get_image($row['image'])?>" style="width: 100px;height: 100px;object-fit:cover;">
                    </td> 
                    <td><?=date('jS M, Y', strtotime($row['date']))?></td>
                    <td>
                      <a href="<?=ROOT?>/admin/posts/edit/<?=$row['id']?>">
                        <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                      </a>
                      <a href="<?=ROOT?>/admin/posts/delete/<?=$row['id']?>">
                        <button class="btn btn-danger text-white btn-sm"><i class="bi bi-trash-fill"></i></button>
                      </a> 
                    </td>
                </tr>
                <?php endforeach;?>
            <?php endif;?>

        </table>
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
    </table>

<?php endif;?>