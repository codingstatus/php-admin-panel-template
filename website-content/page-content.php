<div class="content-box">
		<?php
if($_GET['subcat']=='add-page-content'){
?>
	<br><br>
	<!--============form section start===============-->
	<div class="row">
		<div class="col">
			<h4>Page Content</h4>
		</div>
		<div class="col text-right">
			<a href="dashboard.php?cat=website-content&subcat=page-content" class="btn btn-secondary content-link"> View </a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<!---===== form start====-->
            <div class="form-group">
            	<select class="form-control" name="section">
            		<option>Select Page</option>
            		<option>About Us</option>
            		<option>Privacy Policy</option>
            		<option>Desclaimer</option>
            		<option>Terms & Conditions</option>
            	</select>
            </div>
			<div class="form-group">
				<input type="text" class="form-control" name="" placeholder="Home Title (h1)" name="title">
			</div>
			<div class="form-group">
				<textarea placeholder="Description" class="form-control" name="description">
					
				</textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-secondary">Save</button>
			</div>
			<!---====== form end==========-->
		</div>
		<div class="col">
		</div>
	</div>


	<!---==================form section end=========================-->
<?php } else{?>
	<!-----=================table content start=================-->
	<br><br>
	<div class="row">
		<div class="col">
			<h4>Page Content</h4>
		</div>
		<div class="col text-right">
			<a href="dashboard.php?cat=website-content&subcat=add-page-content" class="btn btn-secondary content-link"> Add New</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>S.N</th>
				<th>Title</th>
				<th>Page</th>
				<th>Description</th>
			</tr>
			
		</table>
	</div>
</div>
</div>
	<!-----==================table content end===================-->
<?php } ?>
</div>