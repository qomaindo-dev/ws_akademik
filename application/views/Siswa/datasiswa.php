<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">


        <br />
        <!-- <button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</button>
        <a href="<?php echo base_url('siswa/detailsiswa') ?>">Detail</a>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br /> -->
        <br />
        <div class="card">
            <div class="card-body">
        <table id="tb_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr align="center">
                    <th>NO</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <!-- <th>Kelas</th> -->
                   <!-- <th width="18%">Action</th> -->
                </tr>
            </thead>
            <tbody>
              <?php 
              if ($siswaData==0) {
                echo "<td colspan='3'><center><h3>DATA KELAS MASIH BELUM ADA SISWANYA</h3></center></td>";
              }else{
              $no = 1;
              foreach ($siswaData as $value) {
              ?>

              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $value->nis; ?></td>
                <td><?php echo $value->nama_siswa; ?></td>
                <td><?php echo $value->jenis_kelamin; ?></td>
                <!-- <td><a class="btn btn-sm btn-success" href="<?php echo base_url('Laporan/cetak_rapor')?>"><i class="fa fa-print"></i>Cetak</a> -->
                </td>
              </tr>
              <?php $no++;
                 }
              }?>
              
            </tbody>

        </table>
    </div>
</div>

</section>
</div>