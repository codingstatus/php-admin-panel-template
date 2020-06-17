<?php

if(isset($_POST['addcat'])){   
      $msg=create_category();     
}

// insert query
function create_category(){

      global $conn;
      $parent_id= legal_input($_POST['parent_id']);
      $category_name= legal_input($_POST['category_name']);

      $query=$conn->prepare("INSERT INTO categories (parent_id, category_name) VALUES (?,?)");
      $query->bind_param('is',$parent_id,$category_name);
      $exec= $query->execute();
      if($exec){

        $msg="Category was created sucessfully";
        return $msg;
      
      }else{
        $msg= "Error: ". $query . "<br>" . mysqli_error($conn);
      }
}


$catData=multilevel_categories();
function multilevel_categories($parent_id=0){

  global $conn;
  $query = $conn->prepare('SELECT * FROM categories WHERE parent_id=?');
  $query->bind_param('i',$parent_id); 
  $query->execute();
  $exec=$query->get_result();

  $catData=[];
  if($exec->num_rows>0){

    while($row= $exec->fetch_assoc())
    {
        $catData[]=[
          'id'=>$row['id'],
          'parent_id'=>$row['parent_id'],
          'category_name'=>$row['category_name'],
          'nested_categories'=>multilevel_categories($row['id'])
        ];  
   }

   return $catData;
        
  }else{
    return $catData=[];
  }
}

function display_list($nested_categories)
{
  $list = '<ul>';
  foreach($nested_categories as $nested){

    $list .= '<li>'.$nested['category_name'].'</li>';
    
    if( ! empty($nested['nested_categories'])){
      $list .= display_list($nested['nested_categories']);
    }
  }
  $list .= '</ul>';
  
  return $list;
}

function display_option($nested_categories,$mark=' ')
{
  $option='';
  foreach($nested_categories as $nested){

    $option .= '<option value="'.$nested['id'].'">'.$mark.$nested['category_name'].'</option>';
    
    if( ! empty($nested['nested_categories'])){
      $option .= display_option($nested['nested_categories'],$mark.'__');
    }
  } 
  return $option;
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

?>
