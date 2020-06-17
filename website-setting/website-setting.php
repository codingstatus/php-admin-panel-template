
<br></br>
<div class="content-box">
<div class="row">
  <div class="col">
    <h4>Website Setting</h4>
  </div>
  <div class="col">

  </div>
</div>
<br>
<?php
  $sql1="SELECT * FROM website_setting ORDER BY id DESC LIMIT 0,1";
  $res1= $conn->query($sql1);
  $data=$res1->fetch_assoc();
   $id=!empty($data['id'])?$data['id']:'';
  $websiteTitle=!empty($data['website_title'])?$data['website_title']:'';
  $websiteName=!empty($data['website_name'])?$data['website_name']:'';
  $websiteName=!empty($data['website_name'])?$data['website_name']:'';
  $websiteLogo=!empty($data['website_logo'])?$data['website_logo']:'';
  $websiteFavicon=!empty($data['website_favicon'])?$data['website_favicon']:'';
  $metaKeyword=!empty($data['meta_keyword'])?$data['meta_keyword']:'';
  
  $metaDescription=!empty($data['meta_description'])?$data['meta_description']:'';
  $googleVarificationCode=!empty($data['google_varification_code'])?$data['google_varification_code']:'';
  $googleAnalyticsCode=!empty($data['google_analytics_code'])?$data['google_varification_code']:'';
?>

<form id="updateForm" name="website_setting" rel="<?php echo $id;?>">
  <div class="row">
    <div class="col">
      <div class="form-group">
      <label>Website Title<span style="color:red">*</span></label>
      <input type="text" name="website_title" value="<?php echo $websiteTitle ?>" class="form-control">
    </div>
  </div>
    <div class="col">
      <div class="form-group">
      <label>Website Name<span style="color:red">*</span></label>
      <input type="text" name="website_name" value="<?php echo $websiteName ?>" class="form-control">
      <input type="checkbox" name="visible_website_name" value="1"> Show Website Name
     </div>
    </div>
  </div>

    <div class="row">
    <div class="col">
      <label>Website Logo <span style="color:red">*</span></label>

      <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="customFile" name="website_logo">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    <div class="form-group">
      <img src="assets/images/<?php echo $websiteLogo; ?>" width="200px" height="50px">
    </div>
    </div>
    <div class="col">
      <label>Website Favicon<span style="color:red">*</span></label>
      
     <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="customFile" name="website_favicon">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
<img src="assets/images/<?php echo $websiteFavicon; ?>" width="30px" height="30px">
    </div>
  </div>
  <div class="row">
     <div class="col">
       <div class="form-group">
        <label>Meta Keyword</label>
        <input type="text" name="meta_keyword" value="<?php echo $metaKeyword; ?>" class="form-control">
       </div>
     </div>
  </div>
    <div class="row">
     <div class="col">
       <div class="form-group">
        <label>Meta Description</label>
        <textarea name="meta_description" class="form-control"><?php echo $metaDescription; ?></textarea> 
       </div>
     </div>
  </div>
    <div class="row">
     <div class="col">
       <div class="form-group">
        <label>Google Website Varification Code</label>
        <input type="text" name="google_varification_code" value="<?php echo $googleVarificationCode; ?>" class="form-control">
       </div>
     </div>
  </div>

   <div class="row">
     <div class="col">
       <div class="form-group">
        <label>Google Site Analytics Code Code</label>
         <textarea name="google_analytics_code"  class="form-control"><?php echo $googleAnalyticsCode; ?></textarea> 
       </div>
         <div class="form-group">
            <button class="btn btn-danger">Back</button>
      <button class="btn btn-secondary">Save</button>
     </div>
     </div>

  </div>
</form>

</div>