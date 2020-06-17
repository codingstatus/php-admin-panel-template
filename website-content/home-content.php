<br><br>

<div class="content-box">
	<?php
if($_GET['subcat']=='add-home-content'){

	if(!empty($_GET['edit'])){

   $editId= $_GET['edit'];
   $query="SELECT * FROM home_content WHERE id=$editId";
   $res= $conn->query($query);
   $editData=$res->fetch_assoc();
   $contentSection= $editData['content_section'];
   $firstTitle= $editData['first_title'];
   $secondTitle= $editData['second_title'];
   $description= $editData['description'];

   
   $idAttr="updateForm";
   
}else{
	$contentSection='';
   $firstTitle= '';
   $secondTitle= '';
   $description= '';
  
   $editId='';
    $idAttr="adminForm";
}


?>
	
	<div class="row">
		<div class="col">
			<h4>Home Content</h4>
		</div>
		<div class="col text-right">
			<a href="dashboard.php?cat=website-content&subcat=home-content" class="btn btn-secondary content-link"> View</a>
		</div>
	</div>
	<br>
	<form id="<?php echo $idAttr; ?>" rel="<?php echo $editId; ?>" name="home_content">
	<div class="row">
		<div class="col">
			  <div class="form-group">
			  	
            	<select class="form-control" name="content_section">
            		<option value="">Select Content Section</option>
            		<?php
            		
            		if(!empty($contentSection))
            		{

                      	
                   switch (strtolower($contentSection)) {

                          case 'how to download':
                          ?>
                     <option value="how to download" selected>How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features">Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
                          
                          <?php 
                          break;
                          case 'about downloader':
                          ?>
                    <option value="how to download" >How to Download</option>
            		<option value="about downloader" selected>About Downloader</option>
            		<option value="downloader features">Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
                           <?php
                          break;
                          case 'downloader features':
                           ?>
                     <option value="how to download">How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features" selected>Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
                           <?php
                          break;
                         case 'downloader details':
                           ?>
                     <option value="how to download">How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features" >Downloader Features</option>
            		<option value="downloader details" selected>Downloader Details</option>
                           <?php    		
                            
                    }                      	
                      		
                      		
                      		
                      	 
                       
                      	
                  }else{
            		?>
            		<option value="how to download">How to Download</option>
            		<option value="about downloader">About Downloader</option>
            		<option value="downloader features">Downloader Features</option>
            		<option value="downloader details">Downloader Details</option>
            	<?php } ?>
            	</select>
            </div>
		</div>
		<div class="col">
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Home Page Title (h1)" name="first_title" value="<?php echo $firstTitle; ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Home Page Subtitle (h2)" name="second_title" value="<?php echo $secondTitle; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<!---===== form start====-->
          
			
			
			<div class="form-group">
				<textarea placeholder="Description" class="form-control" name="description">
					<?php echo $description; ?>
				</textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-secondary">Save</button>
			</div>
			<!---====== form end==========-->
		</div>
		
	</div>
</form>
<?php }elseif (!empty($_GET['view'])) {?>
	
	<?php 

  $id= $_GET['view'];
   $query="SELECT * FROM home_content WHERE id=$id";
   $res= $conn->query($query);
   $viewData=$res->fetch_assoc();
   $backId=$viewData['id']-1;
    $firstTitle=$viewData['first_title'];
    $secondTitle=$viewData['second_title'];
    $description=$viewData['description'];
   
   
	?>
	<!-----=================table content start=================-->
	<br>
	<div class="row">
		<div class="col">
			<?php echo "<h4>Menu - ".$viewData['content_section']."</h4>"; ?>
		</div>
		<div class="col text-right">
			<a href="dashboard.php?cat=website-content&subcat=home-content" class="btn btn-secondary content-link">Backe </a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
        <h1><?php echo $firstTitle; ?></h1>
        <h2><?php echo $secondTitle; ?></h2>
        <p><?php echo $description; ?></p>
	</div>
</div>
</div>
	<!-----==================table content end===================-->
	<?php
}

else{?>

	<!-----=================table content start=================-->
	<br>
	<div class="row">
		<div class="col">
			<h4>Home Content</h4>
		</div>
		<div class="col text-right">
			<a href="dashboard.php?cat=website-content&subcat=add-home-content" class="btn btn-secondary content-link">Add New </a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Section</th>
				<th>Content Section</th>
				<th>First Title</th>
				<th>View</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
						<?php
  $sql1="SELECT * FROM home_content ORDER BY id DESC";
  $res1= $conn->query($sql1);
  if($res1->num_rows>0)
  {$i=1;
   while($data=$res1->fetch_assoc()){
   	?>
   	<tr>
   		<td><?php echo $i; ?></td>
   		<td><?php echo $data['content_section']; ?></td>
   		<td><?php echo $data['first_title']; ?></td>
   		
   		<td><a  href="dashboard.php?cat=website-content&subcat=home-content&view=<?php echo $data['id']; ?>" class="text-secondary content-link"><i class='far fa-eye'></i></a></td>
        <td><a href="dashboard.php?cat=website-content&subcat=add-home-content&edit=<?php echo $data['id']; ?>" class="text-success content-link"><i class=' far fa-edit'></i></a></td>
        <td><a href="javascript:void(0)" class="text-danger delete"  name="home_content" id="<?php echo $data['id']; ?>"><i class='far fa-trash-alt'></i></a></td>

   	</tr>
   	<?php
   $i++;}
}else{

?>
<tr>
	<td colspan="6">No Admin Profile Data</td>
</tr>
<?php } ?>
		</table>
	</div>
</div>
</div>
	<!-----==================table content end===================-->
<?php } ?>

</div>