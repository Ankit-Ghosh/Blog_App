<?php if($action == 'add') :?> 
    <div class="col-md-6 mx-auto">
    <form method="post">
    <h1 class="h3 mb-3 fw-normal">Create category</h1>
      <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">Please fix the errors</div>
      <?php endif; ?>

    <div class="form-floating">
      <input value="<?=old_value('category')?>" name="category" type="text" class="form-control" id="floatingInput" placeholder="Category">
      <label for="floatingInput">Category</label>
    </div>
    <?php if(!empty($errors['category'])): ?>
      <div class="text text-danger"><?=$errors['category']?></div>
    <?php endif; ?>
    
    <div class="form-floating my-3">
      <select name="disabled" class="form-select">
        <option value="0">Yes</option>
        <option value="1">No</option>
      </select>
      <label for="floatingInput">Active</label>
    </div>
   
    <a href="<?=ROOT?>/admin/categories">
      <button class="btn btn-primary w-100 py-2 mt-4" type="button">Back</button>
    </a>
    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Create</button>
      </form>
      </div>
<?php elseif($action == 'edit') :?> 
  <div class="col-md-6 mx-auto">
    <form method="post">
      <h1 class="h3 mb-3 fw-normal">Edit category</h1>

      <?php if(!empty($row)):?>
      
        <?php if(!empty($errors)): ?>
          <div class="alert alert-danger">Please fix the errors</div>
        <?php endif; ?>
        
        <div class="form-floating">
          <input value="<?=old_value('category',$row['category'])?>" name="category" type="text" class="form-control" id="floatingInput" placeholder="Category">
          <label for="floatingInput">Category</label>
        </div>
        <?php if(!empty($errors['category'])): ?>
          <div class="text text-danger"><?=$errors['category']?></div>
        <?php endif; ?>

        <div class="form-floating my-3">
          <select name="disabled" class="form-select">
            <option <?= old_select('disabled','0',$row['disabled']) ?> value="0">Yes</option>
            <option <?= old_select('disabled','1',$row['disabled']) ?> value="1">No</option>
          </select>
          <label for="floatingInput">Active</label>
        </div>

        <a href="<?=ROOT?>/admin/categories">
          <button class="btn btn-primary w-100 py-2 mt-4" type="button">Back</button>
        </a>
        <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Save</button>
      <?php else:?>
        <div class="alert alert-danger">Category not found</div>
      <?php endif;?>

    </form>
  </div>

  <?php elseif($action == 'delete') :?> 
    <div class="col-md-6 mx-auto">
      <form method="post">
        <h1 class="h3 mb-3 fw-normal">Delete category</h1>
  
        <?php if(!empty($row)):?>
        
          <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">Please fix the errors</div>
          <?php endif; ?>

          <div class="form-floating">
            <div class="form-control"><?=old_value('category',$row['category'])?></div>
          </div>
          <?php if(!empty($errors['category'])): ?>
            <div class="text text-danger"><?=$errors['category']?></div>
          <?php endif; ?>
          <div class="form-floating">
            <div class="form-control"><?=old_value('slug',$row['slug'])?></div>
          </div>
          <?php if(!empty($errors['slug'])): ?>
            <div class="text text-danger"><?=$errors['slug']?></div>
          <?php endif; ?>
          
          
          <a href="<?=ROOT?>/admin/categories">
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
      Categories
      <a href="<?=ROOT?>/admin/categories/add">
        <button class="btn btn-primary">Add New</button> 
      </a>
    </h4>

    <table class="table-responsive">
        <table class="table">
            <tr>
                <th>#</th> 
                <th>Category</th> 
                <th>Slug</th> 
                <th>Disabled</th>
                <th>Action</th>
            </tr>

            <?php
            $limit = 3;
            $offset = ($PAGE['page_number'] - 1) * $limit;

            $query = "SELECT * FROM categories order by id desc limit $limit offset $offset";
            $rows = query($query);

            ?>

            <?php if(!empty($rows)):?>
                <?php foreach($rows as $row):?>
                <tr>
                    <td><?=$row['id']?></td> 
                    <td><?=esc($row['category'])?></td> 
                    <td><?=$row['slug']?></td> 
                    <td><?=$row['disabled']?></td> 
                    <td>
                      <a href="<?=ROOT?>/admin/categories/edit/<?=$row['id']?>">
                        <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                      </a>
                      <a href="<?=ROOT?>/admin/categories/delete/<?=$row['id']?>">
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