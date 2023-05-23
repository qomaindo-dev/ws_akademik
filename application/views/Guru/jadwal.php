
<div class="row">
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Jadwal Mengajar</h3>
                  <div class="box-tools pull-right">
                   </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Nama Mata Pelajaran</th>
                          <th>Kelas</th>
                          <th>Guru</th>
                          <th>Jam</th>
                        </tr>
                      </thead>
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
                        <td><?php echo $value->nip; ?></td>
                        <td><?php echo $value->jam; ?></td>
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
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->