<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
    if (isset($DataGuru)) {
        foreach ($DataGuru as $data) {
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
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url()?>assets/images/guru/<?php echo $data->photo?>" alt="User profile picture">
            <?php else: ?>
             <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/images/img/default-profile-image.png')?>" alt="User profile picture">

            <?php endif; ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $data->nama ?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama</b> <a class="float-right"><?php echo $data->nama ?></a>
                  </li> 
                  <li class="list-group-item">
                    <b>NIP</b> <a class="float-right"><?php echo $data->nip ?></a>
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
                  <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Detail User</a></li> -->
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
                          <input type="email" class="form-control" id="nama" name="name" value="<?php echo $data->nama ?>" readonly="">
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
                        <label for="inputSkills" class="col-sm-2 control-label">Status</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->status ?>" readonly="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Nomor Telpon</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $data->no_tlp ?>" readonly="">
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Ubah Data</button>
                        </div>
                      </div> -->
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="nip"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NIP</label>
                            <div class="col-md-9">
                                <input name="nip" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">
                                <input name="tempat_lahir" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input name="tgl_lahir" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <input name="status" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Telepon</label>
                            <div class="col-md-9">
                                <input name="no_tlp" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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

function edit_guru(nip) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('guru/ajax_edit')?>/" + nip,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="nip"]').val(data.nip);
            $('[name="nama"]').val(data.nama);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="alamat"]').val(data.alamat);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tgl_lahir"]').datepicker('update',data.tgl_lahir);
            $('[name="status"]').val(data.status);
            $('[name="no_tlp"]').val(data.no_tlp);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Guru'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function saveEmployee() {
    $('#btnSaveEmployee').text('saving...'); //change button text
    $('#btnSaveEmployee').attr('disabled',true); //set button disable
    var url;

    url = "<?php echo site_url('elm/Profile/ajax_update_employee')?>";

    // ajax adding data to database
    var formData = new FormData($('#form_guru')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status)  {
                $('#modal_form_guru').modal('hide');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSaveEmployee').text('Save'); //change button text
            $('#btnSaveEmployee').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSaveEmployee').text('Save'); //change button text
            $('#btnSaveEmployee').attr('disabled',false); //set button enable
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