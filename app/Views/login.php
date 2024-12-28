<!DOCTYPE html>
<html lang="en">
<head>
  <title>InEx Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<style>
		#alertbox{
			display: none;
		}		
	</style>
	<script>
		$(document).ready(function(){
			$("form").submit(function(){
				event.preventDefault();
				
				$.post("<?php echo base_url("user/login"); ?>",
				{
					txtusername: document.forms['frmlogin']['txtusername'].value,
					txtpassword: document.forms['frmlogin']['txtpassword'].value
				},
			  	function(data, status){
					if(data.status == "0"){
						document.getElementById("alertbox").innerHTML = data.message;
						document.getElementById("alertbox").style.display = "block";
					}
					else{
						window.location.replace("<?php echo base_url("home"); ?>");
					} 
			  	});
			});
		});
	</script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Income-Expense Book</h1>
</div>
  
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
      <h3>Login</h3>
		<div class="alert alert-danger" id="alertbox">
		</div>
      	<?php 
			$attributes = [
				'name' => 'frmlogin'
			];
			echo form_open('',$attributes); 
			echo "<div class='mb-3 mt-3'>";
			$attributes = [
				'name' => 'txtusername',
				'class' => 'form-control text-center',
				'placeholder' => 'Username',
				'type' => "text",
				'value' => "",
				'required' => true,
			];
			echo form_input($attributes); 
			echo "</div>";
		
			echo "<div class='mb-3 mt-3'>";
			$attributes = [
				'name' => 'txtpassword',
				'class' => 'form-control text-center',
				'placeholder' => 'Password',
				'type' => "password",
				'value' => "",
				'required' => true,
			];
			echo form_input($attributes); 
			echo "</div>";
			$attributes = [
				'name' => 'btnsignin',
				'id' => 'btnsignin',
				'class' => 'btn btn-primary',
				'type' => "button",
				'content' => "Sign In"
			];
			echo form_submit("","Sign In",$attributes); 
		
		?>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
</body>
</html>
