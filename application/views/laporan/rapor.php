<h2 align="center">Hasil Belajar Siswa</h2>
<br>
<br>

<table height="100" width="100%">
	 <?php
                   if ($DataSiswa==0) {
             ?>
                 <td colspan="4">
                        <h1><center>Data Kosong</center></h1>
                 </td>
             <?php       
                    }else if (isset($DataSiswa)) {
                         $no = 1;
                        foreach ($DataSiswa as $key => $list) {
                        	 ?>
	<tr>
		<td>Nama Sekolah</td>
		<td>:</td>
		<td>SMP Junior High School</td>
		<td></td>
		<td></td>
		<td>Kelas</td>
		<td><div class="align">:</div></td>
		<td><?php echo $list->kelas ?></td>
	</tr>

	<tr>
		<td>Alamat</td>
		<td><div class="align">:</div></td>
		<td>Jl. Mawar No.19</td>
		<td></td>
		<td></td>
		<td>Semester</td>
		<td><div class="align">:</div></td>
		<td><?php echo $list->semester ?></td>
	</tr>

	<tr>
		<td>Nama Peserta Didik</td>
		<td><div class="align">:</div></td>
		<td><?php echo $list->nama_siswa ?></td>
		<td></td>
		<td></td>
		<td>Tahun Ajaran</td>
		<td><div class="align">:</div></td>
		<td><?php echo $list->tahun_ajaran ?></td>
	</tr>

	<tr>
		<td>Nomor Induk Siswa</td>
		<td><div class="align">:</div></td>
		<td><?php echo $list->nis ?></td>

	</tr>

	<?php }
}?>
</table>
<hr style="">
<p style="font-weight: bold;"> CAPAIAN KOMPETENSI</p>
<table border="1" width="100%">
	<thead>
		<tr>
			<th width="40%" align="center" rowspan="2">Mata Pelajaran</th>
			<th width="40%" colspan="6" align="center">Nilai</th>
			<th width="20%" align="center" rowspan="2">Grade</th>
		</tr>
		<tr>
			<th align="center">UH 1</th>
			<th align="center">UH 2</th>
			<th align="center">UH 3</th>
			<th align="center">UH 4</th>
			<th align="center">UTS</th>
			<th align="center">UAS</th>
		</tr>
		<tr>
			<th colspan="8" align="left">Kelompok A :</th>
		</tr>
		<tbody >
			 <?php
                   if ($cetakRaport==0) {
             ?>
                 <td colspan="4">
                        <h1><center>Data Kosong</center></h1>
                 </td>
             <?php       
                    }else if (isset($cetakRaport)) {
                         $no = 1;
                        foreach ($cetakRaport as $key => $list) {
                        	if ($list->kelompok == "A") {
             ?>

		<tr>
			<td><?php echo $list->mata_pelajaran ?></td>
			<td align="center"><?php echo $list->uh1 ?></td>
			<td align="center"><?php echo $list->uh2 ?></td>
			<td align="center"><?php echo $list->uh3 ?></td>
			<td align="center"><?php echo $list->uh4 ?></td>
			<td align="center"><?php echo $list->uts ?></td>
			<td align="center"><?php echo $list->uas ?></td>
			<td align="center"><?php echo $list->grade ?></td>
		</tr>
	<?php }
}
?>
	</tbody>
		<tr>
			<th colspan="8" align="left">Kelompok B :</th>
		</tr>
	</thead>
	<tbody >
	 	<?php foreach ($cetakRaport as $list) {
	 		if ($list->kelompok == "B") {
	 	?>
		<tr>
			<td align="center"><?php echo $list->mata_pelajaran ?></td>
			<td align="center"><?php echo $list->uh1 ?></td>
			<td align="center"><?php echo $list->uh2 ?></td>
			<td align="center"><?php echo $list->uh3 ?></td>
			<td align="center"><?php echo $list->uh4 ?></td>
			<td align="center"><?php echo $list->uts ?></td>
			<td align="center"><?php echo $list->uas ?></td>
			<td align="center"><?php echo $list->grade ?></td>
		</tr>
	<?php }
	}
}
?> 
	</tbody>
</table>