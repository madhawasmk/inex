<!DOCTYPE html>
<html lang="en">
<head>
  <title>InEx Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$("form").submit(function(){
				event.preventDefault();
				$.post("<?php echo base_url("index.php/transaction/create"); ?>",
				{
					txttrdate: document.forms['frmaddtr']['txttrdate'].value,
					txttdetail: document.forms['frmaddtr']['txttdetail'].value,
					cmbtrcategory: document.forms['frmaddtr']['cmbtrcategory'].value,
					numtramount: document.forms['frmaddtr']['numtramount'].value
				},
			  	function(data, status){
					document.getElementById("alertbox").className = "alert alert-success";
					document.getElementById("alertbox").innerHTML = data.message;
					document.getElementById("alertbox").style.display = "block";
					document.forms['frmaddtr'].reset();
			  	}).fail(function(jqXHR, status, errorThrown){
					const obj = JSON.parse(jqXHR.responseText);
					console.log(obj);
					document.getElementById("alertbox").className = "alert alert-danger";
					document.getElementById("alertbox").innerHTML = obj.messages.message;
					document.getElementById("alertbox").style.display = "block";
				});
			});
			
		});
	</script>
	<link href="<?php echo base_url("assets/style.css"); ?>" rel="stylesheet">
</head>
<body>

<div class="container-fluid p-4 bg-primary text-white text-center">
  <h1>Income-Expense Book</h1>
</div>
  <div class="menuback"></div>
<div class="container mt-5">
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link " href="<?php echo base_url("home"); ?>">Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" href="#">Categories</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo base_url("categories/add"); ?>">Add Categories</a></li>
      <li><a class="dropdown-item" href="<?php echo base_url("categories/edit"); ?>">Edit Categories</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#">Transactions</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo base_url("transactions/add"); ?>">Add Transactions</a></li>
      <li><a class="dropdown-item" href="<?php echo base_url("transactions/edit"); ?>">Edit Transactions</a></li>
    </ul>
  </li>
	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Reports</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="reports/income">Income Analysis</a></li>
      <li><a class="dropdown-item" href="reports/expense">Expense Analysis</a></li>
    </ul>
  </li>	
	<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url("index.php"); ?>">Sign out</a>
  </li>	
</ul> 
	
  <div class="row">
	<div class="col-sm-12">  
      <h3>Add Transactions</h3>
		<div class="" id="alertbox"></div>
      	<?php 
			$attributes = [
				'name' => 'frmaddtr'
			];
			echo form_open('',$attributes);
			echo "<div class='mb-3 mt-3'>";
			$attributes = [
				'name' => 'txttrdate',
				'class' => 'form-control',
				'type' => "date",
				'value' => "",
				'required' => true,
			];
			echo form_label("Transaction Date : ","Transaction Date");
			echo form_input($attributes); 
			echo "</div>";
		
			echo "<div class='mb-3 mt-3'>";
			$attributes = [
				'name' => 'txttdetail',
				'class' => 'form-control',
				'type' => "text",
				'value' => "",
				'required' => true,
			];
			echo form_label("Transaction Detail : ","Transaction Detail");
			echo form_input($attributes); 
			echo "</div>";
		
			echo "<div class='mb-3 mt-3'>";
			$attributes = array(
				'class' => 'form-control',
				'required' => 'required',
				'id' => 'cmbtrcategory',
			);
			echo form_label("Transaction Category : ","Transaction Category");
			echo form_dropdown('cmbtrcategory',$cats,"",$attributes);
			echo "</div>";

			echo "<div class='mb-3 mt-3'>";
			$attributes = [
				'name' => 'numtramount',
				'class' => 'form-control',
				'type' => "number",
				'value' => "",
				'required' => true,
				'min' => 0,
			];
			echo form_label("Transaction Amount : ","Transaction Amount");
			echo form_input($attributes); 
			echo "</div>";
		
			$attributes = [
				'name' => 'btnsave',
				'id' => 'btnsave',
				'class' => 'btn btn-primary',
				'content' => "Save"
			];
			echo form_submit("","Save",$attributes); 
			echo form_close();
		?>
		
  </div>
</div>
</body>
</html>
