<br>
<br>
<div class="row">
   <div class="col">
    <h4>Theme Setting</h4>
   </div>
   <div class="col">

   </div>
  </div>
<br>

<?php
  $query="SELECT * FROM theme_setting LIMIT 0,1";
  $res= $conn->query($query);
  $data=$res->fetch_assoc();

  $id=!empty($data['id'])?$data['id']:'';
  $headerBackground=!empty($data['header_background'])?$data['header_background']:'';
  $footerBackground=!empty($data['footer_background'])?$data['footer_background']:'';
  $downloaderBoxBackground=!empty($data['downloader_box_background'])?$data['downloader_box_background']:'';
  $downloaderBoxButton=!empty($data['downloader_box_button'])?$data['downloader_box_button']:'';
  $firstTitle=!empty($data['first_title'])?$data['first_title']:'';
  $secondTitle=!empty($data['second_title'])?$data['second_title']:'';
  $thirdTitle=!empty($data['third_title'])?$data['third_title']:'';
  $footerMenuLink=!empty($data['footer_menu_link'])?$data['footer_menu_link']:'';
  $headerMenuLink=!empty($data['header_menu_link'])?$data['header_menu_link']:'';
  $icon=!empty($data['icon'])?$data['icon']:'';
  $paragraph=!empty($data['paragraph'])?$data['paragraph']:'';
  $logoName=!empty($data['logo_name'])?$data['logo_name']:'';

?>
<form id="updateForm" name="theme_setting"  rel="<?php echo $id; ?>" enctype="multipart/form-data">
<div class="row">
  <div class="col">
    <div class="form-group">
    <label>Header Background</label>
    <input type="color" class="form-control" name="header_background" value="<?php echo $headerBackground; ?>">
   </div>
  </div>
    <div class="col">
    <div class="form-group">
    <label>Downloader Box Background  </label>
    <input type="color" class="form-control" value="<?php echo $downloaderBoxBackground; ?>" name="downloader_box_background">
   </div>

  </div>
  
    <div class="col">
      <div class="form-group">
    <label>Footer Background   </label>
    <input type="color" class="form-control" value="<?php echo $footerBackground; ?>" name="footer_background">
   </div>
  </div>
   <div class="col">
      <div class="form-group">
    <label>Downloader Box Button  </label>
    <input type="color" class="form-control" value="<?php echo $downloaderBoxButton; ?>" name="downloader_box_button">
   </div>
  </div>
</div>
<div class="row">
  
    <div class="col">
    <div class="form-group">
    <label>Main Title - h1 </label>
    <input type="color" class="form-control" value="<?php echo $firstTitle; ?>" name="first_title">
   </div>

  </div>
    <div class="col">
      <div class="form-group">
    <label>Second Title - h2  </label>
    <input type="color" class="form-control"  value="<?php echo $secondTitle; ?>" name="second_title">
   </div>
  </div>
  <div class="col">
      <div class="form-group">
    <label>Third Title - h3  </label>
    <input type="color" class="form-control"  value="<?php echo $thirdTitle; ?>" name="third_title">
   </div>
  </div>
    <div class="col">
      <div class="form-group">
    <label>Footer Menu Link   </label>
    <input type="color" class="form-control"  value="<?php echo $footerMenuLink; ?>"name="footer_menu_link">
   </div>
  </div>
</div>
<div class="row">
    <div class="col">
      <div class="form-group">
    <label>Icon   </label>
    <input type="color" class="form-control" name="icon" value="<?php echo $icon; ?>">
   </div>
  </div>
   <div class="col">
      <div class="form-group">
    <label>Paragraph - P   </label>
    <input type="color" class="form-control" name="paragraph" value="<?php echo $paragraph; ?>">
   </div>
  </div>
  <div class="col">
      <div class="form-group">
    <label>Logo Name   </label>
    <input type="color" class="form-control" name="logo_name" value="<?php echo $logoName; ?>">
   </div>
  </div>
  <div class="col">
    <div class="form-group">
    <label>Header Menu Link </label>
    <input type="color" class="form-control" name="header_menu_link" value="<?php echo $headerMenuLink; ?>">
   </div>
  </div>

  </div>
<div class="row">
  <div class="col">
    <div class="form-group">
      <button class="btn btn-secondary">Save</button>
    </div>
  </div>

</div>
</form>