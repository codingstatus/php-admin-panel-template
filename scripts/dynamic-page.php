<?php 
      
include('../config/database.php');

       $cat= !empty($_GET['cat'])?$_GET['cat']:'';
       $subcat = !empty($_GET['subcat'])?$_GET['subcat']:'';
      
          if($cat=='website-setting' && $subcat=='add-website-menu'){
          
          include('../scripts/multilevel-script.php');
          
        }

        if(!empty($cat) && !empty($subcat)){

            
            $sub=explode('-', $subcat);
if($sub[0]=='add')
{
           $val=[];
          foreach ($sub as $key => $value) {
            if($value==$sub[0])
            {
             continue;
            }
            $val[]=$value;
            
         }
        
      include("../".$cat."/".implode('-',$val).".php");   
 }else{
  include("../".$cat."/".$subcat.".php");
 }
 

          
        }else{
            echo "<h1 class='text-success text-center'>Welcome To Admin Panel</h1>";
        }



        ?>