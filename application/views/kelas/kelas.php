  <div class="container">  
    <div class="col-lg-10">
        
          <h3  style="font-family: Georgia" class="text-center">Halaman Input Data Kelas</h3>
          <hr>
   
  <div class="alert alert-success" style="display: none;"></div>
  <button id="btntambah" class="btn btn-success"> Tambah Data</button>

  <table class="table table-bordered table-responsive" style="margin-top: 20px;">
    <thead>
      <tr>
        <td>No</td>
        <td>Kelas</td>
        <td>Sub Kelas</td>
        <td>Jumlah Kelas</td>
        <td>Wali Kelas</td>
        <td>Aksi</td>
      </tr>
    </thead>
      <tbody id="showdata">
        
      </tbody>
  </table>

   </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form id="myForm" action="" method="post" class="form-horizontal">
          <input type="hidden" name="txtId" value="0">
          <div class="form-group">
                <label for="kelas" class="label-control col-md-4">Kelas</label>
                <div class="col-md-6">
                    <select class="form-control" name="kelas" type="text">
                      <option value="">--Pilih--</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                </select>
                </div>
          </div>

              <div class="form-group">
                    <label for="sub" class="label-control-label col-md-4">Sub Kelas</label>
                            <div class="col-md-6">
                                <select name="subkelas" class="form-control">
                                    <option value="">--Pilih--</option>
                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                                <option>D</option>
                                                <option>E</option>
                                </select>
                            </div>
              </div>

              <div class="form-group">
                <label for="jumlah" class="label-control col-md-4">Jumlah Siswa</label>
                 <div class="col-md-6">
                    <input class="form-control" name="txtjmlsiswa" type="text">
                 </div>
              </div>

              <div class="form-group">
                  <label for="nip" class="label-control col-md-4">Wali Kelas</label>
                    <div class="col-md-6">
                     <input class="form-control" name="txtnip" type="text">
                   </div>
              </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnSave" class="btn btn-primary">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Konfirmasi Hapus</h4>
      </div>
      <div class="modal-body">
          Apakah yakin akan dihapus ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Hapus</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 
 <script>
  $(function(){
    showAllKelas();

      $('#btntambah').click(function(){
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Tambah Data Kelas');
      $('#myForm').attr('action','<?php echo base_url() ?>kelas/addkelas');
    });


    $('#btnSave').click(function(){
      var url = $('#myForm').attr('action');
      var data = $('#myForm').serialize();
      //validate form
      var kelas = $('select[name=kelas]');
      var subkelas = $('select[name=subkelas]');
      var jumlahsiswa = $('input[name=txtjmlsiswa]');
      var nip = $('input[name=txtnip]');
      var result = '';
      if( kelas.val()==''){
         kelas.parent().parent().addClass('has-error');
      }else{
         kelas.parent().parent().removeClass('has-error');
        result +='1';
      }
      if(subkelas.val()==''){
        subkelas.parent().parent().addClass('has-error');
      }else{
        subkelas.parent().parent().removeClass('has-error');
        result +='2';
      }
      if( jumlahsiswa.val()==''){
         jumlahsiswa.parent().parent().addClass('has-error');
      }else{
         jumlahsiswa.parent().parent().removeClass('has-error');
        result +='3';
      }
      if(nip.val()==''){
        nip.parent().parent().addClass('has-error');
      }else{
        nip.parent().parent().removeClass('has-error');
        result +='4';
      }

      if(result=='12'){
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#myModal').modal('hide');
              $('#myForm')[0].reset();
              if(response.type=='add'){
                var type = 'added'
              }else if(response.type=='update'){
                var type ="updated"
              }
              $('.alert-success').html('Data Kelas Berhasil '+type+' ').fadeIn().delay(4000).fadeOut('slow');
              showAllKelas();
            }else{
              alert('Error');
            }
          },
          error: function(){
            alert('Could not add data');
          }
        });
      }
    });

    //edit
      $('#showdata').on('click', '.item-edit', function(){
      var id_kelas = $(this).attr('data');
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Kelas');
      $('#myForm').attr('action', '<?php echo base_url() ?>kelas/updateKelas');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>kelas/editKelas',
        data: {id_kelas: id_kelas},
        async: false,
        dataType: 'json',
        success: function(data){
          $('select[name=kelas').val(data.kelas);
          $('select[name=subkelas]').val(data.sub_kelas);
          $('input[name=txtjmlsiswa]').val(data.txtjmlsiswa);
          $('input[name=txtnip]').val(data.nip);
          $('input[name=txtId]').val(data.id_jenis);
        },
        error: function(){
          alert('tidak dapat edit data');
        }
      });
    });


    //delete
    $('#showdata').on('click', '.item-delete', function(){
      var id_kelas = $(this).attr('data');
      $('#deleteModal').modal('show');
      //prevent previous handler - unbind()
      $('#btnDelete').unbind().click(function(){
        $.ajax({
          type: 'ajax',
          method: 'get',
          async: false,
          url: '<?php echo base_url() ?>kelas/deleteKelas',
          data:{id_kelas:id_kelas},
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#deleteModal').modal('hide');
              $('.alert-success').html('Berhasil Di Hapus').fadeIn().delay(4000).fadeOut('slow');
              showAllKelas();
           }else{
              alert('Error');
            }
          },
          error: function(){
            alert('Error deleting');
          }
        });
      });
    });

    //function
    function showAllKelas(){
      $.ajax({
          type: 'ajax',
          url : '<?php echo base_url() ?>kelas/showAllKelas',
          async : false,
          dataType :'json',
          success: function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
            html +='<tr>'+
                  '<td>'+data[i].id_kelas+'</td>'+
                  '<td>'+data[i].kelas+'</td>'+
                  '<td>'+data[i].sub_kelas+'</td>'+
                  '<td>'+data[i].jml_siswa+'</td>'+
                  '<td>'+data[i].nip+'</td>'+
                  '<td>'+
                    '<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].id_kelas+'">Edit</a>'+ 
                    '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id_kelas+'">Delete</a>'+
                  '</td>'+
                  '</tr>';

            }
            $('#showdata').html(html);
          },
          error: function(){
            alert('Could not get Data from Database');
          }
        });
    }
  });
 </script>

