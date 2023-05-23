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

        <div class="card card-secondary card-outline">
            <div class="card-body">
        <br />
        <button class="btn btn-success" onclick="add()"><i class="fa fa-plus"></i> Tambah Siswa</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
        <br />
        <br />
        <div class="card">
            <div class="card-body">
        <table id="tb_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr align="center">
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>No Telfon</th>
                    <th width="30%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</div>

</section>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Form Siswa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="employee_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label label col-md-4">NIS</label>
                            <div class="col-md-10">
                                <input name="nis" placeholder="Nis" class="form-control" type="text" maxlength="255" autofocus>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">NISN</label>
                            <div class="col-md-10">
                                <input name="nisn" placeholder="Nisn" class="form-control" type="text" maxlength="255" autofocus>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Nama Siswa</label>
                            <div class="col-md-10">
                                <input name="nama_siswa" placeholder="Nama" class="form-control" type="text" maxlength="255" autofocus>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Tempat Lahir</label>
                            <div class="col-md-10">
                                <input name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" type="text" maxlength="255" autofocus>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input name="tgl_lahir" placeholder="Tahun-Bulan-Tanggal" readonly="true" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Jenis Kelamin</label>
                            <div class="col-md-10">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">--Pilih Satu--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Agama</label>
                            <div class="col-md-10">
                                <select name="agama" class="form-control">
                                    <option value="">--Pilih Satu--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Kelas</label>
                            <div class="col-md-10">
                                <select name="id_kelas" class="form-control">
                                    <option value="">--Pilih Satu--</option>
                                    <?php
                                        foreach ($kelasData as $data) {
                                            echo "<option value='$data[id_kelas]'>$data[kelas]</option>";
                                        }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label label col-md-4">Tahun Ajaran</label>
                          <div class="col-md-10">
                            <input name="tahun_ajaran" placeholder="tahun-tahun" class="form-control" type="text" maxlength="255">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label label col-md-4">Nama Ayah</label>
                          <div class="col-md-10">
                            <input name="nama_ayah" placeholder="Nama Ayah" class="form-control" type="text" maxlength="255">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label label col-md-4">Pekerjaan</label>
                          <div class="col-md-10">
                            <input name="pekerjaan" placeholder="pekerjaan ayah" class="form-control" type="email" maxlength="255">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label label col-md-4">Nama Ibu</label>
                          <div class="col-md-10">
                            <input name="nama_ibu" placeholder="nama ibu" class="form-control" type="text" maxlength="255">
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Nomor telfon</label>
                            <div class="col-md-10">
                                <input name="no_tlp" placeholder="08xxxxxxxx" class="form-control" type="number" maxlength="15">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4">Alamat</label>
                            <div class="col-md-10">
                                <textarea name="alamat" placeholder="Jln. suka maju-mundur" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label label col-md-4">Photo</label>
                            <div class="col-md-10">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label label col-md-4" id="label-photo">Upload Photo </label>
                            <div class="col-md-10">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.1.4.min.js') ?>"></script>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>

<!-- page script -->

<!-- <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script> -->

<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {
    //datatables
    table = $('#tb_data').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('page_admin/siswa/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("number").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
});

function add() {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Siswa'); // Set Title to Bootstrap modal title

    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload Photo'); // label photo upload
}

function edit(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('page_admin/siswa/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="nis"]').val(data.nis);
            $('[name="nisn"]').val(data.nisn);
            $('[name="nama_siswa"]').val(data.nama_siswa);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tgl_lahir"]').datepicker('update',data.tgl_lahir);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="agama"]').val(data.agama);
            $('[name="id_kelas"]').val(data.id_kelas);
            $('[name="nama_ayah"]').val(data.nama_ayah);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="nama_ibu"]').val(data.nama_ibu);
            $('[name="no_tlp"]').val(data.no_tlp);
            $('[name="alamat"]').val(data.alamat);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Siswa'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo) {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'assets/images/siswa/'+data.photo+'" class="img-responsive" width="150px">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo
            } else {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function reload_table() {
    table.ajax.reload(null,false); //reload datatable ajax
}

function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('page_admin/siswa/ajax_add')?>";
    } else if (save_method == 'delete') {
        url = "<?php echo site_url('page_admin/siswa/ajax_delete')?>";
    } else {
        url = "<?php echo site_url('page_admin/siswa/ajax_update')?>";
    }

    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status) {
                $('#modal_form').modal('hide');
                reload_table();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        }
    });
}

function deleted(id) {
  if(confirm('Are you sure delete this data?')) {
    save_method == 'delete'
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('page_admin/siswa/ajax_delete/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            //if success reload ajax table
            $('#modal_form').modal('hide');
            reload_table();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
  }
}

</script>
