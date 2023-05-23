<div class="content-wrapper">
<section class="content">
  </br>
 <div class="form-group">
     <div class="card card-secondary card-outline">
        <div class="card-body">
          <div class="form-group">
          <label class="control-label label col-md-4">Kelas</label>
            <div class="col-md-12">
                <form action="<?php echo base_url('nilai/Nilai/cari') ?>" method="post" id="form" class="form-horizontal">
                        <select name="kelas" class="form-control">
                                 <option value="">--Pilih Satu--</option>
                                  <?php
                                    foreach ($kelasData as $data) {
                                                echo "<option value='$data[id_kelas]'>$data[kelas]</option>";
                                    }
                                 ?>
                        </select>
                    </br>
                    <label>Matapelajaran</label>
                  <select name="id_mapel" class="form-control">
                                 <option value="">Pilih Satu--</option>
                    <?php
                                    foreach ($jadwalNya as $data) {
                                            echo "<option value='$data->id_mapel'>$data->mata_pelajaran</option>";
                                      echo "<input type='hidden' name='id_mapel' value='$data->id_mapel'>";
                                    }
                                 ?>
                  </select>
                  <br>
                  <label>Semester</label>
                  <select name="semester" class="form-control">
                                 <option value="">Pilih Satu--</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                  </select>
                  <br>
                <button class="btn btn-primary">Cari</button>
            </form>
            <span class="help-block"></span>
        </div>
</div>
</section>
</div>