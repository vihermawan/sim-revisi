@extends('layouts.main')

@section('menu')
	{!! $menus !!}
@endsection

@section('content')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Rawat Jalan</h5>
	</div>

    <div class="card-header header-elements-inline">
        <button type="button" class="btn bg-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#add-modal"><b><i class="icon-reading"></i></b> Tambah Data</button>
    </div>

	<table class="table datatable-basic" id="rawatJalan-tables"> 
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pasien</th>
				<th>Poli</th>
				<th>Petugas</th>
				<th>Pemeriksaan</th>
                <th>Resep</th>
                <th>Tanggal Pemeriksaan</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
	</table>
</div>

<!--Modal add modal -->
<div id="add-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Rawat Inap</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="addForm" name="addForm">
                        <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pasien :</label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="idPasien" class="form-control id_pasien" />
                                    <input type="text" name="pasien" class="form-control pasien" id="pasien" />
                                    <div class="pasienList"></div>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal Pemeriksaan:</label>
                                <div class="col-lg-9">
                                    <input type="date" name="tanggal_masuk" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Poli:</label>
                                <div class="col-lg-9">
                                <select name="id_poli" class="form-control">
                                      @foreach($poli as $dataPoli)
                                        <option value="{{$dataPoli->id}}">{{$dataPoli->nama_poli}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Petugas</label>
                              <div class="col-lg-6">
                                  <select name="id_petugas" class="form-control">
                                      @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nama_user}}</option>
                                      @endforeach
                                      
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Pemeriksaan</label>
                              <div class="col-lg-6">
                                  <select name="id_tindakan" class="form-control">
                                      @foreach($tindakan as $data)
                                        <option value="{{$data->id}}">{{$data->nama_tindakan}}</option>
                                      @endforeach
                                      
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Resep</label>
                              <div class="col-lg-6">
                                  <select name="id_resep" class="form-control">
                                      @foreach($reseps as $data)
                                        <option value="{{$data->id}}">{{$data->nama_resep}}</option>
                                      @endforeach
                                      
                                  </select>
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success add-data">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal add modal-->


    

@foreach($rawatjalan as $data)
<!--Modal edit ruangan -->
<div id="edit-modal{{$data->id_rawat_jalan}}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Form Rawat Inap</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="col-xl-12">
                    <!-- Form -->
                    <div class="card-body">
                        <form id="editForm" name="editForm">
                        <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Pasien:</label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="id_pasien" class="form-control id_pasien" />
                                    <input type="text" name="pasien" class="form-control pasien" id="pasien" value="{{$data->nama_pasien}}" />
                                    <div class="pasienList"></div>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal Pemeriksaan:</label>
                                <div class="col-lg-9">
                                    <span class="form-control">{{$data->tanggal_masuk}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Poli:</label>
                                <div class="col-lg-9">
                                <select name="id_poli" class="form-control">
                                      @foreach($poli as $dataPoli)
                                        <option value="{{$dataPoli->id}}">{{$dataPoli->nama_poli}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Petugas</label>
                              <div class="col-lg-6">
                                  <select name="id_petugas" class="form-control">
                                      @foreach($users as $user)
                                        <option value="{{$user->id}}" {{ $user->id === $data->id_petugas? 'selected' : ''}}>{{$user->nama_user}}</option>
                                      @endforeach
                                      
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Pemeriksaan</label>
                              <div class="col-lg-6">
                                  <select name="id_tindakan" class="form-control">
                                      @foreach($pemeriksaan as $data)
                                        <option value="{{$data->id}}">{{$data->tindakan->nama_tindakan}}</option>
                                      @endforeach
                                      
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label">Resep</label>
                              <div class="col-lg-6">
                                  <select name="id_resep" class="form-control">
                                      @foreach($reseps as $data)
                                        <option value="{{$data->id}}">{{$data->nama_resep}}</option>
                                      @endforeach
                                      
                                  </select>
                                </div>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-success edit-data">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--End Modal edit ruangan-->

<!--Modal delete -->
<div id="delete-modal" class="modal fade" tabindex="-2">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h6 class="modal-title">Delete Data</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <div class="modal-body">
                <div class="col-xl-12">
                    <div class="card-body">
                        <p>Anda yakin ingin menghapus data ini?</p>
                    </div>
                </div>
            </div>
    
             <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                <button type="button" class="btn bg-danger delete-data">Delete</button>
            </div>
        </div>
    </div>
</div>
 <!--End Modal delete-->
@endsection

@push('scripts')
<script>

//add ruangan

$(document).ready(function(){
    $(document).on('click', '.add-data', function(e){
        e.preventDefault();

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('rawatJalan.addData') }}",
            method: "post",
            data: {formData: JSON.parse(JSON.stringify($('#addForm').serializeArray())) },
            success: function(data){
                console.log(data);
               Swal.fire({
                  type: 'success',
                  title: 'Ruang berhasil di ditambah!',
                  text: 'Ruangan  anda telah berhasil ditambahkan!',
               });
               $("#addForm")[0].reset();
               $('#add-modal').modal('hide');
               $('#rawatJalan-tables').DataTable().ajax.reload();
            }
         });
        
      });

$(document).ready(function(){  
      $('.pasien').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                     url:"{{ route('rawatJalan.pasienSearch') }}",  
                     method:"GET",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                         console.log(data);
                          $('.pasienList').fadeIn();  
                          $('.pasienList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('.pasien').val($(this).text());  
           var id = $(this).attr("id");
           console.log('idd', id);
           $('.id_pasien').val(id);  
           $('.pasienList').fadeOut();  
      });  
 });  

$(document).on('click', '.delete-modal', function(){
       var id = $(this).attr("id");
       $('.delete-data').attr("id", id);
    });

    $(document).on('click', '.delete-data', function(){
        var id = $(this).attr("id"); 
        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
           },
           url: "{{ route('rawatJalan.delete') }}",
           method: "GET",
           data: {id: id},
           success: function(){          
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil dihapus!',
                    text: 'Pembayaran yang anda pilih telah dihapus!',
                });
                $('#delete-modal').modal('hide');
                $('#rawatJalan-tables').DataTable().ajax.reload();
           }
        });
       
    });
    //GET ALL DATA
    $(function(){
            $('#rawatJalan-tables').DataTable({
            order: [[ 2, "asc" ]],
               prossessing: true,
               serverside: true,
               "bDestroy": true,
               "columnDefs": [
                    { className: "text-center", "targets": [ 4 ] }
                ],
               ajax: '{!! route('rawatJalan.dataJSON') !!}',
               columns: [
                  { name: 'id', data: 'DT_RowIndex' },
                  {
                     name: 'nama_pasien',
                     data: 'nama_pasien'
                  },
                  {
                     name: 'poli',
                     data: 'poli',
                  },
                  {
                     name: 'petugas',
                     data: 'petugas',
                  },
                  {
                     name: 'pemeriksaan',
                     data: 'pemeriksaan',
                  },
                  {
                     name: 'resep',
                     data: 'resep',
                  },
                  {
                     name: 'tanggal_pemeriksaan',
                     data: 'tanggal_pemeriksaan',
                  },
                  {
                     name: 'action',
                     data: 'action',
                  },

               ]
            });
         });


    //edit ruangan
    $(document).on('click', '.edit-modal', function(){
         var id = $(this).attr("id");
         var id_pemeriksaan = $(this).attr("data-idpemeriksaan");
         $('.edit-data').attr("id", id);
         $('.edit-data').attr("data-idpemeriksaan", id_pemeriksaan);
    });

    $(document).on('click', '.edit-data', function(e){
        e.preventDefault();
         var id = $(this).attr("id");
         var id_pemeriksaan = $(this).attr("data-idpemeriksaan");
        
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: "{{ route('rawatJalan.editData') }}",
            method: "post",
            data: {id: id,id_pemeriksaan:id_pemeriksaan, formData: JSON.parse(JSON.stringify($('#editForm').serializeArray())) },
            success: function(data){
                console.log(data);
               Swal.fire({
                  type: 'success',
                  title: 'Ruang berhasil di ubah!',
                  text: 'Ruangan yang anda pilih telah diubah!',
               });
               $('#edit-modal'+id).modal('hide');
               $('#rawatJalan-tables').DataTable().ajax.reload();
            }
         });
        
      });

});
</script>
@endpush