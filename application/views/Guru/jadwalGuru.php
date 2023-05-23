<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Selamat Datang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Jadwal Mengajar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
                <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jadwal Mengajar Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>Nama Mata Pelajaran</th>
                          <th>Kelas</th>
                          <th>Hari</th>
                          <th>Jam</th>
                      </tr>
                        </thead>
                        <tbody>
                         <?php
                          if ($jadwalNya==0) {
                                          
                                 ?>
                                 <td colspan="6">
                                 <h1><center>Data Kosong</center></h1>
                               </td>
                                 <?php       
                                        
                                       }
                                        else if (isset($jadwalNya)) {
                                          $no=1;
                                        foreach ($jadwalNya as $key => $value) {
                                        ?>
                      <tbody>
                        <td><?php echo $value->mata_pelajaran; ?></td>
                        <td><?php echo $value->kelas; ?></td>
                        <td><?php echo $value->hari; ?></td>
                        <td><?php echo $value->jam; ?> WIB</td>
                      </tbody>
                             <?php 
                                   $no++;
                                   } 
                               } else {
                                echo '
                                    <tr>
                                        <td colspan="8" align="center">Data not Found</td>
                                    </tr>
                                ';
                               }
                            ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
        </section>
      </div>