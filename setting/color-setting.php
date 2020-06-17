<br></br>

<div class="content-box">
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

<form id="updateForm" name="color_setting" rel="<?php echo $id;?>">
	<div class="row">
		<div class="col">
			<h4>Admin Panel Setting</h4>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Navbar Background</label>
				<input type="color" name="navbar_background" class="form-control" value="<?php echo $navbarBackground; ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Sidebar Background</label>
				<input type="color" name="sidebar_background" class="form-control" value="<?php echo $sidebarBackground; ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Text Color</label>
				<input type="color" name="text_color" class="form-control" value="<?php echo $textColor?>">
			</div>
		</div>
			<div class="col">
			<div class="form-group">
				<label>Save Button Color</label>
				<input type="color" name="save_button_color" class="form-control" value="<?php echo $saveButtonColor; ?>">
			</div>
		</div>

	</div>

	<div class="row">
	
		<div class="col">
			<div class="form-group">
				<label>Edit Button Color</label>
				<input type="color" name="edit_button_color" class="form-control" value="<?php echo $editButtonColor; ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Delete Button Color</label>
				<input type="color" name="delete_button_color" class="form-control" value="<?php echo $deleteButtonColor; ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>View Button Color</label>
				<input type="color" name="view_button_color" class="form-control" value="<?php echo $viewButtonColor; ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>label Text Color</label>
				<input type="color" name="label_text_color" class="form-control" value="<?php echo $labelTextColor; ?>">
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
</div>