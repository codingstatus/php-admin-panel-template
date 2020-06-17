<?php
require_once('../config/database.php'); 
$db= $conn; // update with your database connection

// ============= color setting ============ //
// update 
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='color_setting')
{

  extract($_POST);
   
   
      $data= [
        'navbar_background'=>$navbar_background,
        'sidebar_background'=>$sidebar_background,
        'text_color'=>$text_color,
        'save_button_color'=>$save_button_color,
        'edit_button_color'=>$edit_button_color,
        'delete_button_color'=>$delete_button_color,
        'view_button_color'=>$view_button_color,
        'label_text_color'=>$label_text_color
       
     ];
  

    $tableName=$_GET['name']; 
    $id= $_GET['id'];
  echo "hh";
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>colors was updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  
}

//================ admin Rol==================///

// update
if( !empty($_GET['id']) && !empty($_GET['tableName']) && $_GET['role']=='admin'){
   $id=legal_input($_GET['id']);
   $tableName=legal_input($_GET['tableName']);
   $query="SELECT status FROM admin_profile WHERE id=$id";
   $res= $db->query($query);
   $role=$res->fetch_assoc();
   if($role['status']==1)
   {
      $data=[
        'status'=>0
      ];
      $return ="fas fa-user-alt-slash iconRole";
   }else{

    $data=[
        'status'=>1
      ];
      $return="fas fa-user-alt iconRole";
  }

    $updateData=update_data($data,$tableName, $id);
    if($updateData)
    {
     echo $return;
    }else{
      echo $db->error;
    }

}

//=========home content =================--//

// insert
if(empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='home_content'){
   extract($_POST);
  if(!empty($first_title)){
   
      $data= [
        'content_section'=>$content_section,
       'first_title' =>$first_title,
       'second_title'=>$second_title,
       'description'=>$description
       
     ];
  

    $tableName=$_GET['name']; 

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>Home Content saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }

}else{
  echo "<span class='fail'>Home Content field is empty</span>";
}

}

// update 
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='home_content')
{

  extract($_POST);
   
   if(!empty($first_title)){
   
      $data= [
        'content_section'=>$content_section,
       'first_title' =>$first_title,
       'second_title'=>$second_title,
       'description'=>$description
       
     ];
  

    $tableName=$_GET['name']; 
    $id= $_GET['id'];
  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>How content was updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  }else{
   echo "<span class='fail'>Home Content field is empty</span>";
  }
}



// ======== change password ===========//
if(!empty($_GET['name']) && $_GET['name']=='change_password'){
    $old=md5($_POST['password']);
    $new=md5($_POST['new_password']);
    if(!empty($old) && !empty($new))
    {
      $query="SELECT password FROM admin_profile WHERE password='$old'";
      $result=$conn->query($query);
      if($result->num_rows >0)
      {
         $updateq="UPDATE admins SET password='$new' WHERE password='$old'";
         $run= $conn->query($updateq);
         if($run){
          echo "<span class='success'>your password was changed successfully</span>";

         }

      }else{
        echo "<span class='fail'>Old password is not exist</span>";
      }

    }else{
      echo "<span class='fail'>all fields are required</span>";
    }
  }

// =========admin profile ================= //

// insert
if(empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='admin_profile'){
   extract($_POST);
  if(!empty($full_name) & !empty($password)){
   if($password==$cpassword)
   {
      $data= [
       'full_name' =>$full_name,
       'email'=>$email,
       'mobile'=>$mobile,
       'address'=>$address,
       'password'=>md5($password)
       
     ];
  

    $tableName=$_GET['name']; 

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>Admin Profile saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }
  }else{
    echo "<span class='fail'>confirm password is not matched</span>";
  }

}else{
  echo "<span class='fail'>Admin Profile field is empty</span>";
}

}

// update
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='admin_profile'){
   extract($_POST);
  if(!empty($full_name) & !empty($password)){
   if($password==$cpassword)
   {
      $data= [
       'full_name' =>$full_name,
       'email'=>$email,
       'mobile'=>$mobile,
       'address'=>$address,
       'password'=>md5($password)
       
     ];
  

  
    $tableName=$_GET['name']; 
    $id= $_GET['id'];
  

    if(!empty($data) && !empty($tableName)){
         $updateData=update_data($data,$tableName, $id);

       if($updateData){
         echo "<span class='success'>Admin Profile saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }
  }else{
    echo "<span class='fail'>confirm password is not matched</span>";
  }

}else{
  echo "<span class='fail'>Admin Profile field is empty</span>";
}

}



// =========contact email ============== //

// insert 
if(empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='contact_email'){
   extract($_POST);
  if(!empty($email)){
     $data= [
       'email' =>$email
       
     ];

    $tableName=$_GET['name']; 

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>Contact Email saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }

}else{
  echo "<span class='fail'>Contact Email field is empty</span>";
}

}

// update 
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='contact_email')
{

  extract($_POST); 
  if(!empty($email)){
     $data= [ 
       'email'=>$email,  
     ];
  
    $tableName=$_GET['name']; 
    $id= $_GET['id'];
  
  $updateData=update_data($data,$tableName, $id);

   if($updateData){
    echo "<span class='success'>Contact Email updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  }else{
   echo "<span class='fail'>Contact Email field is empty</span>";
  }
}



// ============ website setting ================//

// update 
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='website_setting')
{

  extract($_POST);
   
  if(!empty($website_title) && !empty($meta_keyword) && !empty($meta_description) ){
    $tableName=legal_input($_GET['name']);
    $id=legal_input($_GET['id']);
    // logo image upload //
  $uploadTo="../assets/images/";   
  $websiteLogo=$_FILES['website_logo']['name'];
  $tempWebsiteLogo=$_FILES['website_logo']['tmp_name'];

  // favicon image   
  $websiteFavicon=$_FILES['website_favicon']['name'];
  $tempWebsiteFevicon=$_FILES['website_favicon']['tmp_name'];

  
  $websiteFeviconPath=$uploadTo.basename($websiteFavicon);

  $websiteLogoPath=$uploadTo.basename($websiteLogo);

   $websiteFeviconType= strtolower(pathinfo($websiteFeviconPath,PATHINFO_EXTENSION));
// for selected file type
  $websiteLogoType= strtolower(pathinfo($websiteLogoPath,PATHINFO_EXTENSION));
// for allowed file to upload
  $allowedFileType=['jpg','jpeg','png','gif'];
  $uploadingError="";
// check allowed type file
if(!in_array($websiteLogoType, $allowedFileType)){
  $uploadingError="Only 'jpg','jpeg','png','gif' formate of logo image are allowed";
}
if(!in_array($websiteFeviconType, $allowedFileType)){
  $uploadingError="Only 'jpg','jpeg','png','gif' formate of logo image are allowed";
}
     
// for empty file
 if(empty($uploadingError)){
   move_uploaded_file($tempWebsiteLogo,$websiteLogoPath);
   move_uploaded_file($tempWebsiteFevicon,$websiteFeviconPath);

 
    $data= [
       'website_title' =>$website_title,
       'website_name'=>$website_name,
       'website_logo'=>$websiteLogo,
       'website_favicon'=>$websiteFavicon,
       'meta_keyword'=>$meta_keyword,
       'meta_description' =>$meta_description,
       'google_varification_code'=>$google_varification_code,
       'google_analytics_code'=>$google_analytics_code
       
     ];


  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>logo updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

   
 }else{
 echo $uploadingError;
 }


  }else{
   echo "<span class='fail'>Website Setting fields empty</span>";
  }
}


// =========website menu =================--//

// insert
if( !empty($_GET['name']) && $_GET['name']=='categories' && empty($_GET['id'])){
   extract($_POST);
   
  if(!empty($category_name)){
    $header=!empty($header_menu)?$header_menu:0;
    $footer=!empty($footer_menu)?$footer_menu:0;
     $data= [
       'parent_id' =>$parent_id,
       'category_name'=>$category_name,
       'menu_link'=>$menu_link,
       'header_menu'=>$header,
       'footer_menu'=>$footer,
       'description'=>$description
     ];
  

    $tableName=$_GET['name']; 

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>Website menu saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }

}else{
  echo "<span class='fail'>Website menu field is empty</span>";
}

}

// update 
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='categories')
{

  extract($_POST);
   
  if(!empty($category_name)){
    $header=!empty($header_menu)?$header_menu:0;
    $footer=!empty($footer_menu)?$footer_menu:0;
     $data= [
       'parent_id' =>$parent_id,
       'category_name'=>$category_name,
        'menu_link'=>$menu_link,
       'header_menu'=>$header,
       'footer_menu'=>$footer,
       'description'=>$description
     ];
  

    $tableName=$_GET['name']; 
    $id= $_GET['id'];
  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>adsense code updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  }else{
   echo "<span class='fail'>adsense code field is empty</span>";
  }
}











//=========theme setting =================--//

if( !empty($_GET['name']) && $_GET['name']=='theme_setting' && !empty($_GET['id'])){
   extract($_POST);
     $data= [
       'header_background' =>$header_background,
       'footer_background'=>$footer_background,
       'downloader_box_background'=>$downloader_box_background,
       'downloader_box_button'=>$downloader_box_button,
       'first_title'=>$first_title,
       'second_title'=>$second_title,
       'third_title'=>$third_title,
       'footer_menu_link'=>$footer_menu_link,
       'header_menu_link'=>$header_menu_link,
       'icon'=>$icon,
       'paragraph'=>$paragraph,
       'logo_name'=>$logo_name
     ];
  

     $tableName=$_GET['name']; 
     $id=$_GET['id'];

    if(!empty($data) && !empty($tableName)){
       $updateData=update_data($data,$tableName, $id);

       if($updateData){
         echo "<span class='success'>Theme setting updated sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }



}

//======adsense code====//

//======adsense code====//

// insert data
if( !empty($_GET['name']) && $_GET['name']=='code'){
   extract($_POST);
  if(!empty($code) && !empty($section)){
     $data= [
       'code' =>$code,
       'section'=>$section
     ];
  

    $tableName='adsense_code'; 

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>adsense Code saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }

}else{
  echo "<span class='fail'>adsense code  field is empty</span>";
}

}

// update data
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='update_code')
{

   $id= legal_input($_GET['id']);
   $name=legal_input($_GET['name']);
   $tableName='adsense_code';
   extract($_POST);
  if(!empty($code) && !empty($section)){
     $data= [
       'code' =>$code,
       'section'=>$section
     ];
  

  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>adsense code updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  }else{
   echo "<span class='fail'>adsense code field is empty</span>";
  }
}



// ======= delete data from database ============//

if(!empty($_GET['deleteId']) && !empty($_GET['deleteData']))
{

   $id= legal_input($_GET['deleteId']);
   $deleteData=legal_input($_GET['deleteData']);
   $tableName= $deleteData;
  
   $deleteData=delete_data($tableName, $id);
 
    if($deleteData){
      echo "<span class='success'>".$tableName." data was deleted</span>";
    }else{
      echo  "<span class='fail'>Error...Check your query</span>";
    }
   
}


//======head script====//

// insert data
if(!empty($_GET['name']) && $_GET['name']=='head_script'){
   extract($_POST);
  if(!empty($script)){
     $data= [
       'script' =>$script
     ];
  

    $tableName='head_section_script'; 

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>Head Script saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }

}else{
  echo "<span class='fail'>Head Script  field is empty</span>";
}

}

// update data
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='update_head_script')
{

   $id= legal_input($_GET['id']);
   $name=legal_input($_GET['name']);
   $tableName='head_section_script';
   extract($_POST);
  if(!empty($script)){
     $data= [
       'script' =>$script
     ];
  

  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>Head Script updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  }else{
   echo "<span class='fail'>Head Script field is empty</span>";
  }
}






//======Admin====//

// insert data
if(!empty($_GET['name']) && $_GET['name']=='new_admin'){
   extract($_POST);
  if(!empty($full_name) && !empty($email) & !empty($password)){
     $data= [
       'full_name' =>legal_input($full_name),
       'email' =>legal_input($email),
       'password'=>md5($password)
     ];
  

    $tableName='admins'; 

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>New Admin saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }

}else{
  echo "<span class='fail'>Title  field is empty</span>";
}

}

// update data
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='update_new_admin')
{

   $id= legal_input($_GET['id']);
   $name=legal_input($_GET['name']);
   $tableName='admins';
   extract($_POST);
 if(!empty($full_name) && !empty($email) & !empty($password)){
     $data= [
       'full_name' =>legal_input($full_name),
       'email' =>legal_input($email),
       'password'=>md5($password)
     ];
  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>Admin updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  }else{
   echo "<span class='fail'>title field is empty</span>";
  }
}


// contact details
// update data
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='contact_details')
{

   $id= legal_input($_GET['id']);
   $name=legal_input($_GET['name']);
   $tableName=$_GET['name'];
   extract($_POST);
 if(!empty($email) && !empty($mobile)){
     $data= [
       'email' =>$email,
       'mobile' =>$mobile,
       'address'=>$address,
       'google_map'=>$google_map,
       'facebook' =>$facebook,
       'google_plus'=>$google_plus,
       'twitter' =>$twitter,
       'linkedin' =>$linkedin,
       'youtube' =>$youtube,
       'instagram' =>$instagram,
       
     ];
  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>Contact Details updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

  }else{
   echo "<span class='fail'>Contact details field is empty</span>";
  }
}




//======contact detail===//




//======logo====//

// insert data
if(!empty($_GET['name']) && $_GET['name']=='logo'){
   extract($_POST);
  if(!empty($logo_name)){
    $tableName='logo'; 

///image 
  $uploadTo="uploads/";   //file drectory
  $fileName=$_FILES['logo_image']['name'];
  $fileTempName=$_FILES['logo_image']['tmp_name'];
  
  $slectedFilePath=$uploadTo.basename($fileName);
// for selected file type


     $data= [
    'logo_name' =>$logo_name,
    'logo_image' =>$slectedFilePath
    
    ];

  $slectedfileType= strtolower(pathinfo($slectedFilePath,PATHINFO_EXTENSION));
// for allowed file to upload
  $allowedFileType=['jpg','jpeg','png','gif'];
  $uploadingError="";
// check allowed type file
if(!in_array($slectedfileType, $allowedFileType)){
  $uploadingError="Only 'jpg','jpeg','png','gif' file types are allowed";
}
     
// for empty file
 if(empty($uploadingError)){

$totalRowsData=check_unique_content($tableName, $data);
   

      if($totalRowsData>0)
      {
        echo "<span class='fail'>Only one Website Title is allowed...You can update id </span>";
      }else{
   move_uploaded_file($fileTempName,$slectedFilePath);


    

    if(!empty($data) && !empty($tableName)){
       $insertData=insert_data($data,$tableName);
       if($insertData){
         echo "<span class='success'>logo saved sucessfully</span>";
       }else{
         echo "<span class='fail'>Error!.. check your query</span>";
       }
    }

}

   
 }else{
 echo $uploadingError;
 }


    /// image


}else{
  echo "<span class='fail'>logo fields must be required</span>";
}

}

// update data
if(!empty($_GET['id']) && !empty($_GET['name']) && $_GET['name']=='update_logo')
{

   $id= legal_input($_GET['id']);
   $name=legal_input($_GET['name']);
   $tableName='logo';
   extract($_POST);

 if(!empty($logo_name)){


///image 
  $uploadTo="uploads/";   //file drectory
  $fileName=$_FILES['logo_image']['name'];
  $fileTempName=$_FILES['logo_image']['tmp_name'];
  
  $slectedFilePath=$uploadTo.basename($fileName);
// for selected file type
  $slectedfileType= strtolower(pathinfo($slectedFilePath,PATHINFO_EXTENSION));
// for allowed file to upload
  $allowedFileType=['jpg','jpeg','png','gif'];
  $uploadingError="";
// check allowed type file
if(!in_array($slectedfileType, $allowedFileType)){
  $uploadingError="Only 'jpg','jpeg','png','gif' file types are allowed";
}
     
// for empty file
 if(empty($uploadingError)){
   move_uploaded_file($fileTempName,$slectedFilePath);

 
    $data= [
    'logo_name' =>$logo_name,
    'logo_image' =>$slectedFilePath
    ];


  
  $updateData=update_data($data,$tableName, $id);
   if($updateData){
    echo "<span class='success'>logo updated sucessfully</span>";
   }else{
    echo "<span class='fail'>Error!.. check your query</span>";
   }

   
 }else{
 echo $uploadingError;
 }


    /// image

  }else{
   echo "<span class='fail'>logo field is empty</span>";
  }
}











// MySQL Query for database operation 

function update_data($data, $tableName, $id){

     global $db;
     $columnsValues = ''; 
     $num = 0; 
     foreach($data as $column=>$value){ 
                    
             $comma = ($num > 0)?', ':''; 
             $columnsValues.=$comma.$column." = "."'".$value."'"; 
             $num++; 
      } 

       $updateQuery="UPDATE ".$tableName." SET ".$columnsValues." WHERE id=".$id;
      
      $updateResult=$db->query($updateQuery);
      if($updateResult){
        return true;
      }else{
        echo "Error: " . $updateResult . "<br>" . $db->error;
      }


}



function delete_data($tableName, $id){
  global $db;

  $query="DELETE FROM ".$tableName." WHERE id=".$id;
  $result= $db->query($query);
  if($result){
     return true;
  }else{
     echo "Error found in ".$db->error;
  }

}
function delete_menu($tableName, $id, $menu){
  global $db;
  if($menu=='header_menu')
  {
    $query="DELETE FROM ".$tableName." WHERE id=$id AND header_menu=1";

  }else if($menu=='footer_menu'){
$query="DELETE FROM ".$tableName." WHERE id=$id AND footer_menu=1";
  }
  
  $result= $db->query($query);
  if($result){
     return true;
  }else{
     echo "Error found in ".$db->error;
  }

}
// convert illegal input value to ligal value formate
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}


function insert_data(array $data, string $tableName){
       
     global $db;

     $tableColumns = $userValues = ''; 
     $num = 0; 
     foreach($data as $column=>$value){ 
          $comma = ($num > 0)?', ':''; 
          $tableColumns .= $comma.$column; 
          $userValues  .= $comma."'".$value."'"; 
          $num++; 
      } 
    $insertQuery="INSERT INTO ".$tableName."  (".$tableColumns.") VALUES (".$userValues.")";
    $insertResult=$db->query($insertQuery);
    if($insertResult){
       return true;
    }else{
       return "Error: " . $insertQuery . "<br>" . $db->error;
    }

}



function check_unique_content($tableName){

  global $db;
  

       $query="SELECT * FROM ".$tableName;
      $result= $db->query($query);
       $totalRows= $result->num_rows;
      return $totalRows;
      




}
function check_unique_menu($tableName, $menuName){

  global $db;
  

      $query="SELECT * FROM ".$tableName." WHERE menu_name='".$menuName."'";

       $result= $db->query($query);
       if($result)
       {
       $totalRows= $result->num_rows;
       return $totalRows;
      }else{
      return $totalRows=0;
     }

       return $db->error;
     




}

?>