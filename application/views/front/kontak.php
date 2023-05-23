<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Contact | Junior High School</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/vendorfonts/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/style.css');?>">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="site-content">
			<header class="site-header">
				<div class="primary-header">
					<div class="container">
						<a href="index.html" id="branding">
							<img width="60px" height="50px" src="<?php echo base_url('assets/front/img/tutwuri.png');?>" alt="Lincoln high School">
							<h1 class="site-title">Junior High School</h1>
						</a> <!-- #branding -->
						
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item current-menu-item"><a href="<?php echo base_url()?>Halamansiswa">Home</a></li>
								<li class="menu-item"><a href="<?php echo base_url()?>Halamansiswa/informasi">Informasi Sekolah</a></li>
								<li class="menu-item"><a href="<?php echo base_url()?>Halamansiswa/student">Students</a></li>
								<li class="menu-item"><a href="contact.html">Contact</a></li>
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
					</div> <!-- .container -->
				</div> <!-- .primary-header -->

				<div class="page-title">
					<div class="container">
						<h2>Contact Sekolah</h2>
					</div>
				</div>
			</header>
		</div>

		<main class="main-content">
			<div class="fullwidth-block inner-content">
				<div class="container">

					<div class="row">
						<div class="col-md-6">
							<form action="#" class="contact-form">
								<p>
									<label for="name">Name</label>
									<span class="control"><input type="text" id="name" placeholder="Yout name"></span>
								</p>
								<p>
									<label for="email">Email</label>
									<span class="control"><input type="text" id="email" placeholder="Email"></span>
								</p>
								<p>
									<label for="website">Website</label>
									<span class="control"><input type="text" id="website" placeholder="Website"></span>
								</p>
								<p>
									<label for="message">Name</label>
									<span class="control"><textarea id="message" placeholder="Message"></textarea></span>
								</p>
								<p class="text-right">
									<input type="submit" value="Send message">
								</p>
							</form>
						</div>
						<div class="col-md-6">
							<div class="contact-info">
								<address>
									<strong>Address</strong>
									<p>Company Name INC. <br>290-2912 Oits Ave <br>Bronx, NY 10465</p>
								</address>
								<div class="contact">
									<strong>Contact</strong>
									<p>
										<a href="tel:532930098891">(532) 930 098 891</a>
										<a href="mailto:office@companyname.com">office@companyname.com</a> <br>
														
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .fullwidth-block -->
		</main>

		<footer class="site-footer">
			<div class="container">
				

				<div class="copy">Copyright 2014 Lincoln High School. All rights reserved.</div>
			</div>

		</footer>

		<script src="<?php echo base_url('assets/vendor/js/jquery-1.11.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/plugins.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/app.js');?>"></script>
		
	</body>

</html>