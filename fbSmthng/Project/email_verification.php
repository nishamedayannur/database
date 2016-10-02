<!DOCTYPE html>
<html>
<head>
	<title>Email_verification</title>

	<?php $this->load->helper('url');
	defined('BASEPATH') or exit('No direct script access allowed'); 
	 #$this->load->library('session'); ?>
	<title></title>
	<link rel="shortcut icon" type="text/css" href="<?php echo base_url().'images/fb.ico' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/bootstrap.min.css' ?>">
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/jquery-2.2.3.min.js' ?>"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="email_vrfy_font">
			<div class="col-md-offset-4 co-md-4 col-md-offset-4  ">
				<img src="<?php echo base_url().'images/fb_head.png' ?>" class="email_fb_head">
			</div>
			<div class="col-md-offset-4 col-md-4 col=md-offset-4 verify_email">
				<label class="">Verify email</label>
			</div>
			<div class="col-md-offset-4 col-md-4 col-md-offset-4 email_vrfy_msg">
				<label>We send an email to <?php //session_start();
				echo $_SESSION['user'];; ?> to make sure that you own it. please check your inbox, then follow the instructions to finish setting up your.</label>
			</div>
			<div class="col-md-offset-4 col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn_resnd_email">Resend email</button>
			</div>
			<div class="col-md-offset-4 col-md-4 col-md-offset-4 email_verfy email_verfy_foot">
				<div class="col-md-4">
					<a href="">Terms of Use</a>
				</div>
				<div class="col-md-5">
					<a href="">Privacy and Cockies</a>
				</div>
				<div class="col-md-3">
					<a href="">Sign out</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>