<!DOCTYPE html>
<html lang="en">
<head>
  <title>InEx Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link href="<?php echo base_url("assets/style.css"); ?>" rel="stylesheet">
	<script>
		$(document).ready(function(){
			$.get("<?php echo base_url("report/expense"); ?>",{},
			function(data, status){
				console.log(data);
				var result="";
				var total = 0.00;
				for(i=0; i<data.length; i++){
					result += "<tr>";
					result += "<td class='text-center'>"+data[i].trdate+"</td>";
					result += "<td class='text-center'>"+data[i].trname+"</td>";
					result += "<td class='text-center'>"+data[i].catname+"</td>";
					result += "<td style='text-align: right; padding-right: 10px;'>"+parseFloat(data[i].tramount).toFixed(2)+"</td>";
					total += parseFloat(data[i].tramount);
					result += "</tr>";
				}
				result += "<tr><th class='text-center' colspan='3'>Total</th><th style='text-align: right; padding-right: 10px;'>"+total.toFixed(2)+"</th></tr>";
				
				document.getElementById("expensetable").innerHTML += result;
				
			}).fail(function(jqXHR, status, errorThrown){
				const obj = JSON.parse(jqXHR.responseText);
				document.getElementById("alertbox").className = "alert alert-danger";
				document.getElementById("alertbox").innerHTML = obj.messages.message;
				document.getElementById("alertbox").style.display = "block";
			});
		});


	</script>
</head>
<body>

<div class="container-fluid p-4 bg-primary text-white text-center">
  <h1>Income-Expense Book</h1>
</div>
	<div class="menuback"></div>
<div class="container mt-5">
	
	<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url("home"); ?>">Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Categories</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo base_url("categories/add"); ?>">Add Categories</a></li>
      <li><a class="dropdown-item" href="<?php echo base_url("categories/edit"); ?>">Edit Categories</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Transactions</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo base_url("transactions/add"); ?>">Add Transactions</a></li>
      <li><a class="dropdown-item" href="<?php echo base_url("transactions/edit"); ?>">Edit Transactions</a></li>
    </ul>
  </li>
	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#">Reports</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo base_url("reports/income"); ?>">Income Analysis</a></li>
      <li><a class="dropdown-item" href="<?php echo base_url("reports/expense"); ?>">Expense Analysis</a></li>
    </ul>
  </li>	
	<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url("index.php"); ?>">Sign out</a>
  </li>	
</ul> 
	
	<div class="row">
	<div class="col-sm-12">  
      <h3>Expense Analysis</h3>
		<div id="alertbox" style="display:none;"></div>
		
		<table class="table table-bordered table-hover">
			<tbody id="expensetable">
				<tr>
					<th class="text-center">Date</th>
					<th class="text-center">Description</th>
					<th class="text-center">Category</th>
					<th class="text-center">Amount</th>
				</tr>
			</tbody>
		</table>
  </div>
</div>
</body>
</html>
