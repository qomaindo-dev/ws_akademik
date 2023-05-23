<!-- Content Wrapper. Contains page content --> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input nilai Siswa</h1>
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
              <form action="<?php echo base_url('nilai/Nilai/saveNilai') ?>" method="post">
        <table id="tb_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr align="center">
                    <th width="5%">No</th>
                    <th>Nama Siswa</th>
                    <th width="10%">UH 1</th>
                    <th width="10%">UH 2</th>
                    <th width="10%">UH 3</th>
                    <th width="10%">UH 4</th>
                    <th width="10%">UTS</th>
                    <th width="10%">UAS</th>
                    <!-- <th width="10%">Hasil</th> -->
                </tr>
            </thead>
            <tbody>
               <?php 
              if ($siswaData==0) {
                echo "<td colspan='8'><center><h3>DATA KELAS MASIH BELUM ADA SISWANYA</h3></center></td>";
              }else{
                  $no = 1;
                  $i = 1;
                foreach ($siswaData as $value) {
              ?>
               <tr>
                <td>
                  <?php echo $no ;?>
                </td>
                <td>
                  <?php echo $value->nama_siswa ;?>
                </td>
                <td>
                  <input name='uh1[]' id='uh1$i' placeholder='' class='form-control' type='text' required="" onkeypress="return inputAngka(event)">
                </td>
                <td>
                  <input name='uh2[]' id='uh2$i' placeholder='' class='form-control' type='text' required="" onkeypress="return inputAngka(event)">
                </td>
                <td>
                  <input name='uh3[]' id='uh3$i' placeholder='' class='form-control' type='text' required="" onkeypress="return inputAngka(event)">
                </td>
                <td>
                  <input name='uh4[]' id='uh4$i' placeholder='' class='form-control' type='text' required="" onkeypress="return inputAngka(event)">
                </td>
                <td>
                  <input name='uts[]' id='uts$i' placeholder='' class='form-control' type='text' required="" onkeypress="return inputAngka(event)">
                </td>
                <td>
                  <input name='uas[]' id='uas$i' placeholder='' class='form-control' type='text' required="" onkeypress="return inputAngka(event)">
                </td>
                  <input name='nis[]' id='nis$i' placeholder='' class='form-control' value="<?php echo $value->nis; ?>" type='hidden'>
              </tr>
              <?php
              $no++;
              $i++;
                 }
              }?>
              
              <input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>">
              <input type="hidden" name="semester" value="<?php echo $semester; ?>">
            </tbody>
            <div class="col-sm-12">
            <button class="btn btn-success" type="submit">Simpan</button>
          </div>
          <br>
        </table>
        </form>
    </div>
</div>

</section>
</div>

<script type="text/javascript">
      function inputAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
</script>

<!-- 
<script>
  var i = 0;
  function sum(){
    // $i++;
    var uh = document.getElementById('uh"+i+"').value;
    var uts = document.getElementById('uts"+i+"').value;
    var uas = document.getElementById('uas"+i+"').value;
    var hasil = ((parseInt(uh)+parseInt(uts)+parseInt(uas))/3);
    // var subtotal= (parseInt(price)*parseInt(qty))-parseInt(totDisc);
    if (!isNaN(hasil)) {
      document.getElementById('hasil"+i+"').value = hasil;
    }
  }

</script>