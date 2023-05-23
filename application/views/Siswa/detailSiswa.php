<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
    if (isset($siswaData)) {
        foreach ($siswaData as $data) {
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
                    <b>NISN</b> <a class="float-right"><?php echo $data->nisn ?></a>
                  </li>
                </ul>

                <!-- <a href="javascript:void(0)" onclick="edit_password_employee()" class="btn btn-primary btn-block"><i class="fa fa-pencil"> Ubah Password</i></a> -->
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
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Nama</label>

                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="nama" name="name" value="<?php echo $data->nama_siswa ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Jenis Kelamin</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="jkle" name="jkel" value="<?php echo $data->jenis_kelamin ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" id="alamat" name="alamat" readonly=""><?php echo $data->alamat ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Tempat Lahir</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="tlahir" name="tlahir" value="<?php echo $data->tempat_lahir ?>" readonly="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Tanggal Lahir</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo $data->tgl_lahir ?>" readonly="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Agama </label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->agama ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Nama Ayah </label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->nama_ayah ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Pekerjaan </label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->pekerjaan ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Nama Ibu </label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->nama_ibu ?>" readonly="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Nomor Telpon</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $data->no_tlp ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                       <!--  <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" href="<?php echo base_url('Page_admin_siswa') ?>" class="btn btn-success">Kembali</button>
                        </div> -->
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


  <!-- Bootstrap modal Password Employee -->
<div class="modal fade" id="modal_form_password_guru" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Ubah Password</h3>
                <button type="button" class="btn btn-danger close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_password_guru" class="form-horizontal">
                    <input type="hidden" value="" name="id_kelas"/> 
                    <div class="form-body">
                      <div class="form-group">
                            <label class="control-label col-md-5">Password Lama</label>
                            <div class="col-md-9">
                                <input name="kelas" class="form-control"></input>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Password Baru</label>
                            <div class="col-md-9">
                                <input name="jml_siswa" class="form-control"></input>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Ulangi Password Baru</label>
                            <div class="col-md-9">
                                <input name="nip" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave_password_employee" onclick="check_same_password_employee()" class="btn btn-primary">Change</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->



<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {
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

function edit(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('siswa/ajax_edit/')?>" + id,
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

function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('siswa/ajax_add')?>";
    } else if (save_method == 'delete') {
        url = "<?php echo site_url('siswa/ajax_delete')?>";
    } else {
        url = "<?php echo site_url('siswa/ajax_update')?>";
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


  function edit_password_employee(id) {
    save_method = 'update';
    $('#form_password_guru')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    $('#modal_form_password_guru').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Ubah Password'); // Set title to Bootstrap modal title
}


function check_same_password_employee() {
    var new_password = $('#new_password_employee').val();
    var confirm_new_password = $('#confirm_new_password_employee').val();
    if (new_password == confirm_new_password) {
        check_old_password_employee();
    } else {
        alert("Maaf Password Baru Anda Tidak Sama !");
        return false;
    }
    return false;
}

function check_old_password_employee() {
    var old_password = $('#old_password_employee').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('elm/Profile/ajax_check_password_guru')?>',
        data: { old_password: old_password },
        dataType: 'json',
        success:function(data){
          if (data < 1) {
              alert("Maaf Password Lama Anda Salah !");
              return false;
          }else{
              save_password_employee();
          }
        }
    });
    return false;
}

function save_password_employee() {
    $('#btnSave_password_employee').text('saving...'); //change button text
    $('#btnSave_password_employee').attr('disabled',true); //set button disable
    var url;

    url = "<?php echo site_url('elm/Profile/ajax_update_password_employee')?>";

    // ajax adding data to database

    var formData = new FormData($('#form_password_guru')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status)  {
                $('#modal_form_password_guru').modal('hide');
                // location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave_password_employee').text('Save'); //change button text
            $('#btnSave_password_employee').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave_password_employee').text('Save'); //change button text
            $('#btnSave_password_employee').attr('disabled',false); //set button enable

        }
    });
}

</script>