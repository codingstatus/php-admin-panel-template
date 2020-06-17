<br><br>

<div class="content-box">

	<!--=========form start============-->
	<?php
	if(!empty($_GET['edit'])){

   $editId= $_GET['edit'];
   $query="SELECT id, email FROM contact_email WHERE id=$editId";
   $res= $conn->query($query);
   $data=$res->fetch_assoc();
   $email=$data['email'];
   
   $upId=$data['id'];
   $idAttr="updateForm";
   
}else{
   $email='';
   $upId='';
   $editId='';
    $idAttr="adminForm";
}

	?>

	<h4>Contact Email</h4>
	<br>
	<form id="<?php echo $idAttr; ?>" name="contact_email" rel="<?php echo $upId; ?>">
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label>Contact Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
               
			</div>
			<div class="form-group">
				<button class="btn btn-secondary">Save</button>
			</div>
		</div>
		<div class="col-sm-8">

			<div class="table-responsive">
				<table class="table">
					<tr>
					<th>S.N</th>
					<th>Email</th>
					<th>Edit</th>
					<th>Delete</th>
					</tr>
<?php
  $sql1="SELECT * FROM contact_email ORDER BY id DESC";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $i; ?></td>
   		<td><?php echo $data['email']; ?></td>
   		<td><?php echo $data['email']; ?></td>
   		
   		<td><a href="dashboard.php?cat=contact&subcat=contact-email&edit=<?php echo $data['id']; ?>" class="text-success content-link"><i class=' far fa-edit'></i></a></td>
        <td><a href="javascript:void(0)" class="text-danger delete" name="contact_email" id="<?php echo $data['id']; ?>"><i class='far fa-trash-alt'></i></a></td>
   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="4">No Message</td>
</tr>
<?php } ?>
				</table>
			</div>

		</div>

	</div>
	
</form>

	<!---==============form end============-->


	</div>

