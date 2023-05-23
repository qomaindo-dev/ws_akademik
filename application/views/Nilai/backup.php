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
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th width="10%">UH</th>
                    <th width="10%">UTS</th>
                    <th width="10%">UAS</th>
                    <th width="10%">Hasil</th>
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
                <td><?php echo $value->nama_siswa; ?></td>
                <td><input name="uh" id="uh" onkeyup="sum();" placeholder="" class="form-control" type="number" maxlength="4"></td>
                <td><input name="uts" id="uts" onkeyup="sum();" placeholder="" class="form-control" type="number" maxlength="4"></td>
                <td><input name="uas" id="uas" onkeyup="sum();" placeholder="" class="form-control" type="number" maxlength="4"></td>
                 <td><input name="hasil" maxlength="5" id="hasil" placeholder="" class="form-control" type="text"></td>
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

<script>
  var i = 0;
  function sum(){
    // $i++;
    var uh = document.getElementById('uh').value;
    var uts = document.getElementById('uts').value;
    var uas = document.getElementById('uas').value;
    var hasil = ((parseInt(uh)+parseInt(uts)+parseInt(uas))/3);
    // var subtotal= (parseInt(price)*parseInt(qty))-parseInt(totDisc);
    if (!isNaN(hasil)) {
      document.getElementById('hasil').value = hasil;
    }
  }

</script>