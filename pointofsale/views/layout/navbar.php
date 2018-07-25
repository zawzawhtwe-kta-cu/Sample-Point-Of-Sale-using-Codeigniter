<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap-theme.min.css'); ?>">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/data_table/datatables.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo base_url('public/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/data_table/datatables.min.js'); ?>"></script>
</head>
<body>
<nav class="navbar navbar-inverse mynavbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="">POS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?=base_url('')?>">Point of sale</a></li>
        <li><a href="<?=base_url('add_product')?>">Add product</a></li>
        <li><a href="<?=base_url('add_category')?>">Add Category</a></li> 
      </ul>
    </div>
  </div>
</nav>

