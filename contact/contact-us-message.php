
<br><br>
<div class="content-box">
	
	<h4>Contact Us Message</h4>
	<br>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>S.N</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Message</th>
				<th>Delete</th>
			</tr>
			<?php
  $sql1="SELECT * FROM contacts ORDER BY id DESC";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $i; ?></td>
   		<td><?php echo $data['full_name']; ?></td>
   		<td><?php echo $data['email']; ?></td>
   		<td><?php echo $data['subject']; ?></td>
   		<td><?php echo $data['message']; ?></td>
   		<td><a href="javascript:void(0)" class="text-danger delete"  name="contacts" id="<?php echo $data['id']; ?>"><i class='far fa-trash-alt'></i></a></td>
   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No Message</td>
</tr>
<?php } ?>
		</table>
	</div>
</div>