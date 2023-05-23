<div class="content-wrapper">
<section class="content">
  </br>
 <div class="form-group">
     <div class="card card-secondary  card-outline">
        <div class="card-body">
          <div class="form-group">
          <label class="control-label label col-md-4">Kelas</label>
            <div class="col-md-12">
                <form action="<?php echo base_url('page_admin/Nilai/cari') ?>" method="post" id="form" class="form-horizontal">
                  <div class="form-group">
                        <select name="id_kelas" class="form-control">
                                 <option value="">--Pilih Satu--</option>
                                  <?php
                                    foreach ($kelasData as $data) {
                                                echo "<option value='$data[id_kelas]'>$data[kelas]</option>";
                                    }
                                 ?>
                        </select>
                    </div>
                   <!--  <div class="form-group">
                        <select name="id_mapel" class="form-control">
                                 <option value="">--Pilih Satu--</option>
                                  <?php
                                    foreach ($mapelData as $data) {
                                                echo "<option value='$data[id_mapel]'>$data[mata_pelajaran]</option>";
                                    }
                                 ?>
                        </select>
                      </div> -->
                    </br>
                <button class="btn btn-primary">Cari</button>
            </form>
            <span class="help-block"></span>
        </div>
</div>
</section>
</div>