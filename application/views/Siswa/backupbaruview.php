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


        <br />
        <button class="btn btn-success" onclick="add_siswa()"><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <div class="card">
            <div class="card-body">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>No Telfon</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</div>
</div>

</section>
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>



<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('siswa/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
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
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_siswa()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Siswa'); // Set Title to Bootstrap modal title

    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload Photo'); // label photo upload
}

function edit_siswa(nis)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('siswa/ajax_edit')?>/" +nis,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="nis"]').val(data.nis);
            $('[name="nisn"]').val(data.nisn);
            $('[name="nama_siswa"]').val(data.nama_siswa);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tgl_lahir"]').datepicker('update',data.tgl_lahir);
            $('[name="jenis_kelamain"]').val(data.jenis_kelamain);
            $('[name="agama"]').val(data.agama);
            $('[name="nama_ayah"]').val(data.nama_ayah);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="nama_ibu"]').val(data.nama_ibu);
            $('[name="no_tlp"]').val(data.no_tlp);
            $('[name="alamat"]').val(data.alamat);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Siswa'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'assets/images/'+data.photo+'" class="img-responsive">'); // show photo
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

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('siswa/ajax_add')?>";
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
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}


function delete_siswa(nis)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('siswa/ajax_delete')?>/"+nis,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Siswa</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                  <input type="hidden" value="" name="nis"/> 
                    <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">NIS</label>
                                  <div class="col-md-9">
                                    <input name="nis" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                              </div>
                             <div class="form-group">
                                <label class="control-label col-md-3">NISN</label>
                                  <div class="col-md-9">
                                    <input name="nisn" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                             </div>
                             <div class="form-group">
                                <label class="control-label col-md-3">Nama Siswa</label>
                                  <div class="col-md-9">
                                    <input name="nama_siswa" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                             </div>
                             <div class="form-group">
                                <label class="control-label col-md-3">Tempat Lahir</label>
                                  <div class="col-md-9">
                                    <input name="tempat_lahir" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                             </div>
                             <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Lahir</label>
                                  <div class="col-md-9">
                                    <input name="tgl_lahir" type="text" class="form-control datepicker">
                                    <span class="help-block"></span>
                                  </div>
                             </div>
                                <div class="form-group">
                                <label class="control-label col-md-3">Jenis Kelamin</label>
                                   <div class="col-md-9">
                                    <select neme="jenis_kelamin" class="form-control">
                                          <option>-pilih-</option>
                                          <option value="L">Laki - Laki </option>
                                          <option value="P">Perempuan</option>
                                    </select>
                                    <span class="help-block"></span>
                                   </div>
                              </div>
                                <div class="form-group">
                                <label class="control-label col-md-3">Agama</label>
                                  <div class="col-md-9">
                                    <select name="agama" class="form-control">
                                      <option>-pilih-</option>
                                      <option value="islam">Islam</option>
                                      <option value="Kristen">Kristen</option>
                                      <option value="Hindu">Hindu</option>
                                      <option value="Budha">Budha</option>
                                    </select>
                                    <span class="help-block"></span>
                                  </div>
                              </div>
                                <div class="form-group">
                                <label class="control-label col-md-3">Kelas</label>
                                  <div class="col-md-9">
                                    <select name="id_kelas" class="form-control">
                                      <option>-pilih-</option>
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
                                    <label class="control-label col-md-3">Nama Ayah</label>
                                  <div class="col-md-9">
                                    <input name="nama_ayah" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                             </div>
                              <div class="form-group">
                                    <label class="control-label col-md-3">Pekerjaan</label>
                                  <div class="col-md-9">
                                    <input name="pekerjaan" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                             </div>
                              <div class="form-group">
                                    <label class="control-label col-md-3">Nama Ibu</label>
                                    <div class="col-md-9">
                                    <input name="nama_ibu" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                             </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3">No Telepon</label>
                                  <div class="col-md-9">
                                  <input name="no_tlp" class="form-control">
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
                               <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                             <div class="form-group">
                                <label class="control-label col-md-3" id="label-photo">Upload Photo</label>
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
<!-- End Bootstrap modal -->
