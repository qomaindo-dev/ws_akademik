<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
    if (isset($Siswa)) {
        foreach ($Siswa as $data) {
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php if (isset($data->photo)): ?>
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url()?>assets/images/siswa/<?php echo $data->photo?>" alt="User profile picture">
            <?php else: ?>
             <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/images/img/default-profile-image.png')?>" alt="User profile picture">

            <?php endif; ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $data->nama_siswa ?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NIS</b> <a class="float-right"><?php echo $data->nis ?></a>
                  </li> 
                  <li class="list-group-item">
                    <b>Kelas</b> <a class="float-right"><?php echo $data->kelas ?></a>
                  </li>
                     <button onclick="undisableTxt()" id="edit" class="btn btn-sm btn-warning">Edit Data Diri <i class="nav-icon fa fa-pencil"></i></button>
                </ul>

               <!--  <a href="javascript:void(0)" onclick="edit_password_employee()" class="btn btn-primary btn-block"><i class="fa fa-pencil"> Ubah Password</i></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="header">
                
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Biodata</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Detail User</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <form class="form-horizontal" action="<?php echo base_url('page_siswa/DataDiriSiswa/update_diri') ?>" method="post">
                       <input type="hidden" class="form-control" id="nis" name="nis" value="<?php echo $data->nis ?>">
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Nama</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data->nama_siswa ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">NISN</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data->nisn ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Jenis Kelamin</label>

                        <div class="col-sm-10">
                            <!-- <select class="form-control" name="jkel" id="jkel" disabled>
                            
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempua</option>
                              <option><?php echo $data->jenis_kelamin ?></option>
                          </select> -->
                          <input type="text" class="form-control" id="jkel" name="jkel" value="<?php echo $data->jenis_kelamin ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" id="alamat" name="alamat" disabled><?php echo $data->alamat ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Tempat Lahir</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="tlahir" name="tlahir" value="<?php echo $data->tempat_lahir ?>" disabled>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Tanggal Lahir</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo $data->tgl_lahir ?>" disabled>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Agama</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="agama" name="agama" value="<?php echo $data->agama ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Tahun Ajaran</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $data->tahun_ajaran ?>" disabled>
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Nomor Telpon</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $data->no_tlp ?>" disabled>
                        </div>
                      </div>
                       <!-- <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Kelas</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $data->kelas ?>" disabled>
                        </div>
                      </div> -->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button id="Ubah" type="submit" class="btn btn-sm btn-success" disabled="">Ubah Data <i class="nav-icon fa fa-check"></i></button>
                          
                        </div>
                      </div>
                    </form>
                    <!-- /.post -->
                  </div>

                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<?php
        }
    }
?>
    <!-- /.content -->
  </div>

  <script>
    function undisableTxt() {
  document.getElementById("nama").disabled = false;
  document.getElementById("nisn").disabled = false;
  document.getElementById("jkel").disabled = false;
  document.getElementById("alamat").disabled = false;
  document.getElementById("tlahir").disabled = false;
  document.getElementById("tgl").disabled = false;
  document.getElementById("agama").disabled = false;
  document.getElementById("tahun_ajaran").disabled = false;
  document.getElementById("notelp").disabled = false;
  document.getElementById("Ubah").disabled = false;
  document.getElementById("edit").disabled = true;
  // document.getElementById("jkel").value = 'Laki-laki';
  // document.getElementById("jkel").html = '<select class="form-control" name="jkel" id="jkel"><option value="Laki-laki">Laki-laki </option><option value="Perempuan">Perempuan</option></select>';
  // html += '<select class="form-control" name="jkel" id="jkel"><option value="Laki-laki">Laki-laki </option><option value="Perempuan">Perempuan</option></select>';
  // $('#jkel').append('html');
  // return false;
}

  </script>