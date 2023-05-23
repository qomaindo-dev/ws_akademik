<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Siswa | Junior High School</title>
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
								<li class="menu-item"><a href="<?php echo base_url()?>Halamansiswa/student">Siswa</a></li>
								<li class="menu-item"><a href="<?php echo base_url()?>Halamansiswa/kontak">Contact</a></li>
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
					</div> <!-- .container -->
				</div> <!-- .primary-header -->

				<div class="page-title">
					<div class="container">
						<h2>Siswa Sekolah</h2>
					</div>
				</div>
			</header>
		</div>

		<main class="main-content">
			<div class="fullwidth-block inner-content">
				<div class="container">
					<div class="fullwidth-content">
						<p class="leading">Siswa -Siswi Berprestasi Tahun Ajaran 2018/2019</p>
						<p></p>


						<ul class="students-grid">
							<li class="student">
								<figure class="avatar"><img src="<?php echo base_url('assets/vendor/images/avatar.png');?>" alt="Student 1"></figure>
								<h3 class="student-name"><a href="#">Monica Kingston</a></h3>
								<p class="student-sum">Kelas 7 A</p>
							</li>
							<li class="student">
								<figure class="avatar"><img src="<?php echo base_url('assets/vendor/images/90.png');?>" alt="Student 1"></figure>
								<h3 class="student-name"><a href="#">Sarah James</a></h3>
								<p class="student-sum">Kelas 8 B</p>
							</li>
							<li class="student">
								<figure class="avatar"><img src="<?php echo base_url('assets/vendor/images/download.png');?>" alt="Student 1"></figure>
								<h3 class="student-name"><a href="#">Arthur Smith</a></h3>
								<p class="student-sum">Kelas 9 A</p>
							</li>
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