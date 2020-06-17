


<?php
  $query="SELECT * FROM color_setting ORDER BY id DESC LIMIT 0, 1";
  $result= $conn->query($query);
  echo $conn->error;

  $data=$result->fetch_assoc();
  $id=!empty($data['id'])?$data['id']:'';
  $navbarBackground=!empty($data['navbar_background'])?$data['navbar_background']:'';
  $sidebarBackground=!empty($data['sidebar_background'])?$data['sidebar_background']:'';
  $textColor=!empty($data['text_color'])?$data['text_color']:'';
  $saveButtonColor=!empty($data['save_button_color'])?$data['save_button_color']:'';
  $editButtonColor=!empty($data['edit_button_color'])?$data['edit_button_color']:'';
  $deleteButtonColor=!empty($data['delete_button_color'])?$data['delete_button_color']:'';
  
  $viewButtonColor=!empty($data['view_button_color'])?$data['view_button_color']:'';
  $labelTextColor=!empty($data['label_text_color'])?$data['label_text_color']:'';
  
?>

<style type="text/css">
  .sidebar{
    background-color:<?php echo $sidebarBackground; ?>!important;
  }
  a.nav-link, h3.title, h4.text-light{
   color:<?php echo $textColor; ?>!important;
  }
  .btn-secondary{
    background-color:<?php echo $saveButtonColor; ?>!important;
    border:0px;
  }
  a.text-success{
    color:<?php echo $editButtonColor; ?>!important;
  }
  a.delete{
    color:<?php echo $deleteButtonColor; ?>!important;

  }
  label{
    color:<?php echo $labelTextColor; ?>!important;

  }
  
</style>
<div class="container-fluid bg-secondary menu sticky-top" style="background-color: <?php echo $navbarBackground; ?>!important">
    <div class="row">
      <div class="col-sm-2">
         <ul class="nav">
    <li class="nav-item">
      <a class="nav-link shortname" href="#"><?php echo !empty($acronym)?$acronym:''; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><?php echo !empty($fullName)?$fullName:''; ?></a>
    </li>
    
  </ul>

   
      </div>
      <div class="col-sm-6">
         <ul class="nav">
  
    
  
    <li class="nav-item">
      <h4 class="text-light" style="position: relative;top: 8px">Admin Panel</h3>
    </li>
  </ul>
      </div>
      <div class="col-sm-4">
        <ul class="nav justify-content-end">
  
    <li class="nav-item">
    <a href="dashboard.php?cat=setting&subcat=admin-panel" class="nav-link content-link" title="setting"><i class='fas fa-cog'></i></a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link " href="logout.php" title="logout"><i class='fas fa-sign-out-alt'></i>
</a>
    </li>
  </ul>
      </div>
    </div>


</div>