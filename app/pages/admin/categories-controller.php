<?php

// add new
if($action=='add') 
{  
  if (!empty($_POST)) 
  {
    // validate
    $errors = [];

    if(empty($_POST['category'])){
      $errors['category'] = 'Category is required';
    }
    else if(!preg_match('/^[a-zA-Z0-9 ]/', $_POST['category'])){ 
      $errors['category'] = 'Category can only contain letters and numbers';
    }

    $slug = str_to_url($_POST['category']);

    $query = "SELECT id FROM categories WHERE slug = :slug limit 1";
    $slug_row = query($query,['slug'=>$slug]);


    if($slug_row){
      $slug .= rand(1000,9999);
    }

    if(empty($errors)){
      // save to database
      $data=[];
      $data['category'] = $_POST['category'];
      $data['slug'] = $slug;
      $data['disabled'] = $_POST['disabled'];
      
      $query = "INSERT INTO categories (category, slug, disabled) VALUES(:category, :slug, :disabled)";
      query($query,$data);

      
      redirect('admin/categories');
    }
  }
}
else if($action == 'edit') {  
  $query = "SELECT * FROM categories WHERE id = :id limit 1";
  $row = query_row($query, ['id' => $id]);
  
  if (!empty($_POST)) {
    if ($row) {
      // validate
      $errors = [];

      if(empty($_POST['category'])){
        $errors['category'] = 'A Category is required';
      }
      else if(!preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['category'])){ 
        $errors['category'] = 'Category can only contain letters and numbers';
      }


      if(empty($errors)){
        // save to database
        $data = [
          'id' => $id,
          'category' => $_POST['category'],
          'disabled' => $_POST['disabled']
        ];

        $query = "UPDATE categories SET category = :category, disabled = :disabled WHERE id = :id limit 1";

        query($query, $data);
        redirect('admin/categories');
      }
    }
  }
}
else if($action == 'delete') {  
  $query = "SELECT * FROM categories WHERE id = :id limit 1";
  $row = query_row($query, ['id' => $id]);
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($row) {
      // validate
      $errors = [];

      

      if(empty($errors)){
        // delete from database
        $data = [
          'id' => $id
        ];

        $query = "DELETE from categories WHERE id = :id limit 1";
        query($query, $data);
        
        redirect('admin/categories');
      }
    }
  }
}
