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
</head>
<body>

<div class="container-fluid p-4 bg-primary text-white text-center">
  <h1>Income-Expense Book</h1>
</div>
	<div class="menuback"></div>
<div class="container mt-5">
	
	<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo base_url("home"); ?>">Home</a>
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
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Reports</a>
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
      <h3>Dashboard</h3>
		<div class="row">
			<div class="col-sm-4">
				<div class="card">
				  <div class="card-header text-center bg-secondary text-white">Categories</div>
				  <div class="card-body text-center">
					<button class="btn btn-success btn-lg" onClick="window.location='<?php echo base_url("categories/add"); ?>'">Add</button><br><br>
					 <button class="btn btn-warning btn-lg" onClick="window.location='<?php echo base_url("categories/edit"); ?>'">Edit</button> 
				</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
				  <div class="card-header text-center bg-secondary text-white">Transactions</div>
				  <div class="card-body text-center">
					<button class="btn btn-success btn-lg" onClick="window.location='<?php echo base_url("transactions/add"); ?>'">Add</button><br><br>
					 <button class="btn btn-warning btn-lg" onClick="window.location='<?php echo base_url("transactions/edit"); ?>'">Edit</button> 
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
				  <div class="card-header text-center bg-secondary text-white">Reports</div>
				  <div class="card-body text-center">
					<button class="btn btn-success btn-lg" onClick="window.location='<?php echo base_url("reports/income"); ?>'">Income</button><br><br>
					 <button class="btn btn-warning btn-lg" onClick="window.location='<?php echo base_url("reports/expense"); ?>'">Expense</button> 
					</div>
				</div>
			</div>
		</div>
  </div>
</div>
</body>
</html>
