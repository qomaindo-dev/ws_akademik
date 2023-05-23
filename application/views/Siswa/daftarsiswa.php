<div class="content-wrapper">
<section class="content">
  </br>
 <div class="form-group">
     <div class="card card-secondary card-outline">
        <div class="card-body">
    <label class="control-label label col-md-4">Kelas</label>
        <div class="col-md-12">
            <form action="<?php echo base_url('Siswa/cari') ?>" method="post" id="form" class="form-horizontal">
                    <select name="kelas" class="form-control">
                             <option value="">--Pilih Satu--</option>
                              <?php
                                foreach ($kelasData as $data) {
                                            echo "<option value='$data[id_kelas]'>$data[kelas]</option>";
                                }
                             ?>
                    </select>
                </br>
        <button class="btn btn-primary">Cari</button>
        </form>
        <span class="help-block"></span>
    </div>
</div>
</section>
</div>