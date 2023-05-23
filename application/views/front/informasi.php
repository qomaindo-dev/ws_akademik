<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Informasi | Junior High School</title>
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
								<li class="menu-item current-menu-item"><a href="<?php echo base_url()?>page_siswa/Halamansiswa">Home</a></li>
								<li class="menu-item"><a href="<?php echo base_url()?>page_siswa/Halamansiswa/informasi">Informasi Sekolah</a></li>
								<li class="menu-item  "><a href="<?php echo base_url()?>Loginsiswa">Login</a></li>
								<!-- <li class="menu-item"><a href="<?php echo base_url()?>Halamansiswa/student">Students</a></li>
								<li class="menu-item"><a href="<?php echo base_url()?>Halamansiswa/kontak">Contact</a></li> -->
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
					</div> <!-- .container -->
				</div> <!-- .primary-header -->

				<div class="page-title">
					<div class="container">
						<h2>Informasi Sekolah</h2>
					</div>
				</div>
			</header>
		</div>

		<main class="main-content">
			<div class="fullwidth-block inner-content">
				<div class="container">
					<div class="fullwidth-content">
						<h2 class="section-title"><i class="icon-calendar-lg"></i>Pengumuman</h2>

						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Hasil Penilaian Semester Genap</h3>
								<span class="date"><i class="icon-calendar"></i> 28 Juni 2019</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Berdasarkan penyelenggaran Ulangan Akhir Semester (UAS) yang telah dilaksanakan pada tanggal 28 Mei 2019 maka hasil penilaian tersebut dapat di cetak pada tanggal 1 juli 2019</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Jadwal Penilaian Akhir Semester Genap</h3>
								<span class="date"><i class="icon-calendar"></i> 20 Mei 2019</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Menyambut akhir tahun pelajaran 2018/2019, jadwal penilaian akhir semester atau UAS akan dilaksanakan pada tanggal 28 Mei 2019.</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Hasil Penilaian Semester Ganjil</h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Berdasarkan penyelenggaran Ulangan Akhir Semester (UAS) yang telah dilaksanakan pada tanggal 28 Mei 2019 maka hasil penilaian tersebut dapat di cetak pada tanggal 24 Desember 2018</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Jadwal Penilaian Akhir Semester Ganjil</h3>
								<span class="date"><i class="icon-calendar"></i> 6 Desember 2018</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Menyambut akhir semester ganjil tahun ajaran pelajaran 2018/2019, jadwal penilaian akhir semester atau (UAS) semester ganjil akan dilaksanakan pada tanggal 10 Desember 2018.</p>
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